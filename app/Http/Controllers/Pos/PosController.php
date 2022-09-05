<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PosController extends Controller
{
    public function index(){
        $data['page_title'] = 'POS';
        return view('pos/index',$data);
    }
}
