<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Attributes\Attribute;
use App\Models\Category\Category;
use App\Models\Category\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
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
