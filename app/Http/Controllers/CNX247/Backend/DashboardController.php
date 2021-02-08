<?php

namespace App\Http\Controllers\CNX247\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tenant;
use Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
    * Index page
    */
    public function index(){
        $tenants = Tenant::orderBy('id', 'DESC')->get();
        return view('backend.admin.index',['tenants'=>$tenants]);
    }
}
