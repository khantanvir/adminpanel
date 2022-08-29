<?php

namespace App\Http\Controllers\Product;

use App\Helper\Service;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Models\Attributes\Attribute;
use App\Models\Category\Category;
use App\Models\Category\Subcategory;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    use Service;
    public function index(){

    }
    //create product 
    public function create_product(){
        $data['products'] = true;
        $data['create_product'] = true;
        $data['categories'] = Category::where('status',0)->where('is_deleted',0)->get();
        $data['all_attribute'] = Attribute::where('status',0)->where('is_deleted',0)->get();
        return view('product/create',$data);
    }
    //store product 
    public function store(ProductRequest $request){
        $product = new Product();
        $product->title = $request->input('title');
        $product->short_description = $request->input('short_description');
        $product->description = $request->input('description');
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
            $filename = rand(1000,100000).'.'.$ext;
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(450,600);
            $image_resize->save(public_path('main/image/' .$filename));
            $product->image = $filename;
        }
        //more images
        

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
        $select .= '<select id="" name="subcategory_id" class="default-select form-control wide mb-3">';
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
    //all product 
    public function products(){
        $data['products'] = true;
        $data['all_product'] = true;
        return view('product/all',$data);
    }
}
