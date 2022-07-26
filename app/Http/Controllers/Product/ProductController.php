<?php

namespace App\Http\Controllers\Product;

use App\Helper\Service;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\EditProductAttributeRequest;
use App\Http\Requests\Product\EditProductRequest;
use App\Http\Requests\Product\ProductRequest;
use App\Models\Attributes\Attribute;
use App\Models\Category\Category;
use App\Models\Category\Subcategory;
use App\Models\Product\Product;
use App\Models\Product\ProductAttribute;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\Paginator;
use App\Helper\Activity\SaveActivity;

class ProductController extends Controller
{
    use Service, SaveActivity;
    public function index(){

    }
    //create product 
    public function create_product(){
        $data['products'] = true;
        $data['create_product'] = true;
        $data['categories'] = Category::where('status',0)->where('is_deleted',0)->get();
        $data['all_attribute'] = Attribute::where('status',0)->where('is_deleted',0)->get();
        $data['vendor_users'] = User::where('role_id',5)->get();
        return view('product/create',$data);
    }
    //store product 
    public function store(ProductRequest $request){
        $product = new Product();
        $product->title = $request->input('title');
        $product->category_id = $request->input('category');
        $product->subcategory_id = $request->input('subcategory');
        $product->short_description = $request->input('short_description');
        $product->description = $request->input('description');
        $product->vendor_id = $request->input('vendor_id');
        $product->status = 0;
        $product->is_deleted = 0;
        //create url
        $url_modify = Service::slug_create($request->input('title'));
        $checkSlug = Product::where('url', 'LIKE', '%' . $url_modify . '%')->count();
        if ($checkSlug > 0) {
            $new_number = $checkSlug + 1;
            $new_slug = $url_modify . '-' . $new_number;
            $product->url = $new_slug;
        } else {
            $product->url = $url_modify;
        }
        //main image upload
        $image = $request->file('main_image');
        if($request->hasFile('main_image')){
            
            $ext = $image->getClientOriginalExtension();
            $filename = $image->getClientOriginalName();
            $filename = Service::slug_create($filename).rand(11,99).'.'.$ext;
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(450,600);
            $image_resize->save(public_path('main/image/' .$filename));
            $product->image = $filename;
        }
        //more images
        $more_images = $request->file('more_images');
        $more_zoom_images = $request->file('more_zoom_images');
        $image_array = array();
        $filename1 = '';
        $filename2 = '';
        if($request->hasFile('more_images')){
            foreach($more_images as $key=>$more_image){
                $ext1 = $more_image->getClientOriginalExtension();
                $filename1 = $more_image->getClientOriginalName();
                $filename1 = Service::slug_create($filename1).rand(111,999).'.'.$ext1;
                $image_resize1 = Image::make($more_image->getRealPath());
                $image_resize1->resize(450,600);
                $image_resize1->save(public_path('main/more_images/' .$filename1));

                //zoom image upload
                if($request->hasFile('more_zoom_images')){
                    $ext2 = $more_zoom_images[$key]->getClientOriginalExtension();
                    $filename2 = $more_zoom_images[$key]->getClientOriginalName();
                    $filename2 = Service::slug_create($filename2).rand(111,9999).'.'.$ext2;
                    $image_resize2 = Image::make($more_zoom_images[$key]->getRealPath());
                    $image_resize2->resize(650,820);
                    $image_resize2->save(public_path('main/more_zoom_images/' .$filename1));
                }
                $image_array[] = array(
                    'id'=>rand(11,99),
                    'more_image'=>$filename1,
                    'zoom_image'=>$filename1
                );
            }
            
        }
        $product->more_images = json_encode($image_array);
        $product->product_code = 'SKU'.'-'.rand(1000,9999);
        $product->create_by = Auth::user()->id;
        $product->save();

        //attribute create
        $attribute_size_s_m_l = $request->input('attribute_size_s_m_l');
        $attribute_size_xl_xs = $request->input('attribute_size_xl_xs');
        $attribute_size_30_32 = $request->input('attribute_size_30_32');
        $attribute_color = $request->input('attribute_color');
        $attribute_design = $request->input('attribute_design');
        $attribute_weight = $request->input('attribute_weight');
        $quantity = $request->input('quantity');
        $vendor_price = $request->input('vendor_price');
        $stock_price = $request->input('stock_price');
        $selling_price = $request->input('selling_price');
        $total_quantity = 0;
        if(!empty($quantity)){
            foreach($quantity as $key=>$quantityRow){
                $productAttribute = new ProductAttribute();
                if(!empty($attribute_size_s_m_l[$key])){
                    $productAttribute->attribute_size = $attribute_size_s_m_l[$key];
                }elseif(!empty($attribute_size_xl_xs[$key])){
                    $productAttribute->attribute_size = $attribute_size_xl_xs[$key];
                }elseif(!empty($attribute_size_30_32[$key])){
                    $productAttribute->attribute_size = $attribute_size_30_32[$key];
                }
                $productAttribute->attribute_color = $attribute_color[$key];
                $productAttribute->attribute_design = $attribute_design[$key];
                $productAttribute->attribute_weight = $attribute_weight[$key];
                $productAttribute->quantity = $quantityRow;
                $productAttribute->product_id = $product->id;
                $productAttribute->vendor_price = $vendor_price[$key];
                $productAttribute->stock_price = $stock_price[$key];
                $productAttribute->selling_price = $selling_price[$key];
                $productAttribute->status = 0;
                $productAttribute->is_deleted = 0;
                $total_quantity += $quantityRow;
                $productAttribute->save();
            }
        }
        //update product stock 
        $update = Product::where('id',$product->id)->update(['total_stock'=>$total_quantity]);
        Session::flash('success','Product Data Saved Successfully!');
        Session::flash('product_id',$product->id);
        return redirect('products');

    }
    //product status change 
    public function product_status_change(Request $request){
        $product_id = $request->input('product_id');
        $product = Product::find($product_id);
        if(empty($product)){
            $data['result'] = array(
                'key'=>101,
                'val'=>'Product Data Not Found!'
            );
            return response()->json($data,200);
        }
        $update = Product::where('id',$product->id)->update(['status'=>$request->input('status')]);
        $data['result'] = array(
            'key'=>200,
            'val'=>'Product Updated!'
        );
        return response()->json($data,200);
    }
    //get subcategory
    public function get_subcategory($id=NULL){
        $getCategory = Category::find($id);
        if(empty($getCategory)){
            $data['result'] = array(
                'key'=>101,
                'val'=>'Category Data Not Found!'
            );
            return response()->json($data,200);
        }
        $getSubCategories = Subcategory::where('category_id',$getCategory->id)->get();
        $select = "";
        $select .= '<select id="" name="subcategory" class="default-select form-control wide mb-3">';
        $select .= '<option>--Select Subcategory--</option>';
        foreach($getSubCategories as $row){
            $select .= '<option value="'.$row->id.'">'.$row->title.'</option>';
        }
        $select .= '</select>'; 
        $data['result'] = array(
            'key'=>200,
            'val'=>$select
        );
        return response()->json($data,200);
    }
    //change main image 
    public function change_main_image_post(Request $request){
        $product = Product::find($request->input('product_id'));
        if(empty($product)){
            Session::flash('error','Product Data Not Found!');
            return redirect('products');
        }
        $image = $request->file('main_image');
        if($request->hasFile('main_image')){
            if(file_exists(public_path('main/image/'.$product->image))){
                unlink(public_path('main/image/'.$product->image));
            }
            $ext = $image->getClientOriginalExtension();
            $filename = $image->getClientOriginalName();
            $filename = Service::slug_create($filename).rand(11,99).'.'.$ext;
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(450,600);
            $image_resize->save(public_path('main/image/' .$filename));
            $product->image = $filename;
            $product->save();
            Session::flash('success','Image Changed Successfully!');
            Session::flash('product_id',$product->id);
            if(!empty(Session::get('current_url'))){
                return redirect(Session::get('current_url'));
            }else{
                return redirect('products');
            }
        }
    }
    //all product 
    public function products(){
        $data['products'] = true;
        $data['all_product'] = true;
        $data['all_product'] = Product::where('status',0)->where('is_deleted',0)->orderBy('id','desc')->paginate(10);
        $data['current'] = URL::full();
        Session::put('current_url',$data['current']);
        return view('product/all',$data);
    }
    //edit page 
    public function edit($id=NULL){
        $data['products'] = true;
        $data['all_product'] = true;
        $data['get_product'] = Product::find($id);
        $data['vendors'] = User::where('role_id',5)->get();
        $data['categories'] = Category::where(['status'=>0,'is_deleted'=>0])->get();
        $data['subcategories'] = Subcategory::where('category_id',$data['get_product']->category_id)->get();
        if(empty($data['get_product'])){
            Session::flash('error','Product Data Not Found!');
            return redirect('products');
        }
        return view('product/edit',$data);
    }
    //edit product post 
    public function edit_product_post(EditProductRequest $request){
        $product = Product::find($request->input('product_id'));
        if(empty($product)){
            Session::flash('error','Product Data Not Found!');
            return redirect('products');
        }
        $product->title = $request->input('title');
        $product->short_description = $request->input('short_description');
        $product->vendor_id = $request->input('vendor_id');
        $product->category_id = $request->input('category');
        $product->subcategory_id = $request->input('subcategory');
        $product->description = $request->input('description');
        $product->save();
        Session::flash('success','Product Data Updated Successfully!');
        Session::flash('product_id',$product->id);
        if(!empty(Session::get('current_url'))){
            return redirect(Session::get('current_url'));
        }else{
            return redirect('products');
        }
    }
    //delete product 
    public function delete_product($id=NULL){
        $productValue = Product::find($id);
        if(empty($productValue)){
            Session::flash('error','Product Data Not Found!');
            return redirect()->back();
        }
        $delete = Product::where('id',$productValue->id)->update(['is_deleted'=>1]);
        Session::flash('success','Product Data Deleted Successfully!');
        if(!empty(Session::get('current_url'))){
            return redirect(Session::get('current_url'));
        }else{
            return redirect('products');
        }
    }
    //get product attributes 
    public function product_attributes($id=NULL){
        $data['products'] = true;
        $data['all_product'] = true;
        $data['product_attributes'] = ProductAttribute::where('product_id',$id)->get();
        if(!$data['products']){
            Session::flash('error','Product Data Not Found!');
            return redirect('products');
        }
        return view('product/attributes',$data);
    }
    //get product attribute for edit
    public function get_product_attribute_for_edit($id=NULL){
        $getAttribute = ProductAttribute::find($id);
        if(!$getAttribute){
            $data['result'] = array(
                'key'=>101,
                'val'=>'Product Attribute not found'
            );
            return response()->json($data,200);
        }
        $all_attribute = Attribute::where('status',0)->where('is_deleted',0)->get();
        $select = '';
        $select .= '<div class="mb-3 col-auto my-1 align-items-center">';
        $select .= '<h4>Edit Product Attribute</h4>';
        $select .= '</div>';
        $select .= '<input type="hidden" name="product_attribute_id" id="product_attribute_id" value="'.$getAttribute->id.'">';
        foreach($all_attribute as $key=>$attributes){
            if($attributes->name=="size(s/m/l)"){
                $select .= '<div class="mb-3">';
                    $select .= '<div class="align-items-center">';
                        $select .= '<div class="col-auto my-1">';
                        $select .= '<h5 class="me-sm-2">'.$attributes->name.'</h5>';
                            $select .= '<select name="attribute_size_s_m_l" class="me-sm-2 default-select form-control wide" id="inlineFormCustomSelect">';
                            $select .= '<option></option>';
                            foreach($attributes->attribute_value as $attr_value){
                                if($attr_value->name==$getAttribute->attribute_size){
                                    $select .= '<option selected value="'.$attr_value->name.'">'.$attr_value->name.'</option>';
                                }else{
                                    $select .= '<option value="'.$attr_value->name.'">'.$attr_value->name.'</option>';
                                }
                            }
                            $select .= '</select>';
                        $select .= '</div>';
                    $select .= '</div';
                $select .= '</div>';
                $select .= '<br>';
            }elseif($attributes->name=="size(xl/xs)"){
                $select .= '<div class="mb-3">';
                    $select .= '<div class="align-items-center">';
                        $select .= '<div class="col-auto my-1">';
                        $select .= '<h5 class="me-sm-2">'.$attributes->name.'</h5>';
                            $select .= '<select name="attribute_size_xl_xs" class="me-sm-2 default-select form-control wide" id="inlineFormCustomSelect">';
                            $select .= '<option></option>';
                            foreach($attributes->attribute_value as $attr_value){
                                if($attr_value->name==$getAttribute->attribute_size){
                                    $select .= '<option selected value="'.$attr_value->name.'">'.$attr_value->name.'</option>';
                                }else{
                                    $select .= '<option value="'.$attr_value->name.'">'.$attr_value->name.'</option>';
                                }
                            }
                            $select .= '</select>';
                        $select .= '</div>';
                    $select .= '</div';
                $select .= '</div>';
                $select .= '<br>';
            }elseif($attributes->name=="size(30/32/34)"){
                $select .= '<div class="mb-3">';
                    $select .= '<div class="align-items-center">';
                        $select .= '<div class="col-auto my-1">';
                        $select .= '<h5 class="me-sm-2">'.$attributes->name.'</h5>';
                            $select .= '<select name="attribute_size_30_32" class="me-sm-2 default-select form-control wide" id="inlineFormCustomSelect">';
                            $select .= '<option></option>';
                            foreach($attributes->attribute_value as $attr_value){
                                if($attr_value->name==$getAttribute->attribute_size){
                                    $select .= '<option selected value="'.$attr_value->name.'">'.$attr_value->name.'</option>';
                                }else{
                                    $select .= '<option value="'.$attr_value->name.'">'.$attr_value->name.'</option>';
                                }
                            }
                            $select .= '</select>';
                        $select .= '</div>';
                    $select .= '</div';
                $select .= '</div>';
                $select .= '<br>';
            }elseif($attributes->name=="color"){
                $select .= '<div class="mb-3">';
                    $select .= '<div class="align-items-center">';
                        $select .= '<div class="col-auto my-1">';
                        $select .= '<h5 class="me-sm-2">'.$attributes->name.'</h5>';
                            $select .= '<select name="attribute_color" class="me-sm-2 default-select form-control wide" id="inlineFormCustomSelect">';
                            $select .= '<option></option>';
                            foreach($attributes->attribute_value as $attr_value){
                                if($attr_value->name==$getAttribute->attribute_color){
                                    $select .= '<option selected value="'.$attr_value->name.'">'.$attr_value->name.'</option>';
                                }else{
                                    $select .= '<option value="'.$attr_value->name.'">'.$attr_value->name.'</option>';
                                }
                            }
                            $select .= '</select>';
                        $select .= '</div>';
                    $select .= '</div';
                $select .= '</div>';
                $select .= '<br>';
            }elseif($attributes->name=="design"){
                $select .= '<div class="mb-3">';
                    $select .= '<div class="align-items-center">';
                        $select .= '<div class="col-auto my-1">';
                        $select .= '<h5 class="me-sm-2">'.$attributes->name.'</h5>';
                            $select .= '<select name="attribute_design" class="me-sm-2 default-select form-control wide" id="inlineFormCustomSelect">';
                            $select .= '<option></option>';
                            foreach($attributes->attribute_value as $attr_value){
                                if($attr_value->name==$getAttribute->attribute_design){
                                    $select .= '<option selected value="'.$attr_value->name.'">'.$attr_value->name.'</option>';
                                }else{
                                    $select .= '<option value="'.$attr_value->name.'">'.$attr_value->name.'</option>';
                                }
                            }
                            $select .= '</select>';
                        $select .= '</div>';
                    $select .= '</div';
                $select .= '</div>';
                $select .= '<br>';
            }elseif($attributes->name=="weight"){
                $select .= '<div class="mb-3">';
                    $select .= '<div class="align-items-center">';
                        $select .= '<div class="col-auto my-1">';
                        $select .= '<h5 class="me-sm-2">'.$attributes->name.'</h5>';
                            $select .= '<select name="attribute_weight" class="me-sm-2 default-select form-control wide" id="inlineFormCustomSelect">';
                            $select .= '<option></option>';
                            foreach($attributes->attribute_value as $attr_value){
                                if($attr_value->name==$getAttribute->attribute_weight){
                                    $select .= '<option selected value="'.$attr_value->name.'">'.$attr_value->name.'</option>';
                                }else{
                                    $select .= '<option value="'.$attr_value->name.'">'.$attr_value->name.'</option>';
                                }
                            }
                            $select .= '</select>';
                        $select .= '</div>';
                    $select .= '</div';
                $select .= '</div>';
                $select .= '<br>';
            }
        }
        $select .= '<div class="mb-3">';
            $select .= '<div class="align-items-center">';
                $select .= '<div class="col-auto my-1">';
                    $select .= '<h5 class="me-sm-2">Quantity</h5>';
                    $select .= '<input type="text" name="quantity" value="'.$getAttribute->quantity.'" class="form-control input-default ">';
                $select .= '</div>';
            $select .= '</div>';
        $select .= '</div>';
        $select .= '<br>';

        $select .= '<div class="mb-3">';
            $select .= '<div class="align-items-center">';
                $select .= '<div class="col-auto my-1">';
                    $select .= '<h5 class="me-sm-2">Vendor Price</h5>';
                    $select .= '<input type="text" name="vendor_price" value="'.$getAttribute->vendor_price.'" class="form-control input-default ">';
                $select .= '</div>';
            $select .= '</div>';
        $select .= '</div>';
        $select .= '<br>';

        $select .= '<div class="mb-3">';
            $select .= '<div class="align-items-center">';
                $select .= '<div class="col-auto my-1">';
                    $select .= '<h5 class="me-sm-2">Stock Price</h5>';
                    $select .= '<input type="text" name="stock_price" value="'.$getAttribute->stock_price.'" class="form-control input-default ">';
                $select .= '</div>';
            $select .= '</div>';
        $select .= '</div>';
        $select .= '<br>';

        $select .= '<div class="mb-3">';
            $select .= '<div class="align-items-center">';
                $select .= '<div class="col-auto my-1">';
                    $select .= '<h5 class="me-sm-2">Discount</h5>';
                    $select .= '<input id="discount" type="text" name="discount" value="'.$getAttribute->discount.'" class="form-control input-default ">';
                $select .= '</div>';
            $select .= '</div>';
        $select .= '</div>';
        $select .= '<br>';

        $select .= '<div class="mb-3">';
            $select .= '<div class="align-items-center">';
                $select .= '<div class="col-auto my-1">';
                    $select .= '<h5 class="me-sm-2">Selling Price</h5>';
                    $select .= '<input id="selling_price" type="text" name="selling_price" value="'.$getAttribute->selling_price.'" class="form-control input-default ">';
                $select .= '</div>';
            $select .= '</div>';
        $select .= '</div>';
        $select .= '<br>';
        $select .= '<button type="submit" class="btn btn-primary">Update</button>&nbsp';
        $select .= '<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>';

        $data['result'] = array(
            'key'=>200,
            'val'=>$select
        );
        return response()->json($data,200);

    }
    //edit product attribute post 
    public function edit_product_attribute_post(EditProductAttributeRequest $request){
        $productAttribute = ProductAttribute::find($request->input('product_attribute_id'));
        if(!$productAttribute){
            Session::flash('error','Product Attribute Data Not Found');
            return redirect('products');
        }
        if(!empty($request->input('attribute_size_s_m_l'))){
            $productAttribute->attribute_size = $request->input('attribute_size_s_m_l');
        }elseif(!empty($request->input('attribute_size_xl_xs'))){
            $productAttribute->attribute_size = $request->input('attribute_size_xl_xs');
        }elseif(!empty($request->input('attribute_size_30_32'))){
            $productAttribute->attribute_size = $request->input('attribute_size_30_32');
        }
        $productAttribute->attribute_color = $request->input('attribute_color');
        $productAttribute->attribute_design = $request->input('attribute_design');
        $productAttribute->attribute_weight = $request->input('attribute_weight');
        $productAttribute->quantity = $request->input('quantity');
        $productAttribute->product_id = $productAttribute->product_id;
        $productAttribute->vendor_price = $request->input('vendor_price');
        $productAttribute->stock_price = $request->input('stock_price');
        $productAttribute->discount = $request->input('discount');
        $productAttribute->selling_price = $request->input('selling_price');
        $productAttribute->status = 0;
        $productAttribute->is_deleted = 0;
        $productAttribute->save();
        //quantity update 
        $getProductList = ProductAttribute::where('product_id',$productAttribute->product_id)->where('is_deleted',0)->get();
        if($getProductList){
            $total_quantity = 0;
            foreach($getProductList as $row){
                $total_quantity += $row->quantity;
            }
            //product stock update 
            $update = Product::where('id',$productAttribute->product_id)->update(['total_stock'=>$total_quantity]);
            //save activity
            $saveActivity = SaveActivity::saveProductAttributeActivity($productAttribute);
            Session::flash('success','Product Attribute Data Updated Successfully!');
            return redirect('product-attributes/'.$productAttribute->product_id);
        }

    }
}

