<?php

namespace App\Http\Controllers;

use App\Website;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
          $this->middleware('auth:admin');
    }
    public function index()
    {
      return redirect()->route(admin.dashboard);
    }
    public function dashboard()
    {
      return view('admin.dashboard.index');
    }
    public function homepage()
    {
        return view('admin.websites.home');
    }
}
