<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller{
    public function index(){
        
    }
    public function add_category(){
        $data['page_title'] = 'Category | Crate Category';
        $data['categories'] = true;
        $data['create_category'] = true;
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
}
