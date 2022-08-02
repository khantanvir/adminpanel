<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Category\CategoryRequest;
use App\Models\Category\Category;
use App\Helper\Service;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller{
    use Service;
    public function index(){
        
    }
    public function add_category($url=NULL){
        if(empty($url)){
            Session::flash('warning','Catagory Url Not Found');
            return redirect('all-category');
        }
        $data['page_title'] = 'Category | Crate Category';
        $data['categories'] = true;
        $data['create_category'] = true;
        $data['category'] = Category::where('url',$url)->first();
        return view('category/createCategory',$data);
    }
    //all category list
    public function all_category(){
        $data['page_title'] = 'Category | All Category';
        $data['categories'] = true;
        $data['all_category'] = true;
        return view('category/allCategory',$data);
    }
    //add subcategory
    public function add_subcategory(){
        $data['page_title'] = 'Category | Crate Subcategory';
        $data['categories'] = true;
        $data['create_subcategory'] = true;
        return view('category/createSubcategory',$data);
    }
    //all subcategory
    public function all_subcategory(){
        $data['page_title'] = 'Category | All Subcategory';
        $data['categories'] = true;
        $data['all_subcategory'] = true;
        return view('category/allSubcategory',$data);
    }
    //category store 
    public function category_store(CategoryRequest $request){
            $catagory_id = $request->input('catagory_id');
            if(!empty($catagory_id)){
                $catagory = Category::find($catagory_id);
            }else{
                $catagory = new Category();
            }
            
            $catagory->title = $request->input('title');
            $catagory->description = $request->input('description');
            $catagory->is_deleted = 0;
            //url modify
            $url_modify = Service::slug_create($request->input('title'));
            $checkSlug = Category::where('url', 'LIKE', '%' . $url_modify . '%')->count();
            if ($checkSlug > 0) {
                $new_number = $checkSlug + 1;
                $new_slug = $url_modify . '-' . $new_number;
                $catagory->url = $new_slug;
            } else {
                $catagory->url = $url_modify;
            }

            $catagory->save();
            Session::flash('success','Catagory data saved successfully');
            return redirect('all-category');
    }
}
