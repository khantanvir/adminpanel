<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller{
    public function index(){
        $data['page_title'] = 'Admin | Dashboard';
        return view('home/index');
    }
    public function all_role(){
        $data['page_title'] = 'Admin | All Role';
        $data['users'] = true;
        $data['all_role'] = true;
        return view('Role/all',$data);
    }
    //user list 
    public function all_user(){
        $data['page_title'] = 'Admin | All User';
        $data['users'] = true;
        $data['all_user'] = true;
        return view('users/allUser',$data);
    }
    //admin user list 
    public function all_admin_user(){
        $data['page_title'] = 'Admin | All Admin User';
        $data['users'] = true;
        $data['all_admin_user'] = true;
        return view('users/allAdminUser',$data);
    }
}
