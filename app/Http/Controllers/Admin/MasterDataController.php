<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterDataController extends Controller
{
    public function products()
    {
        return view('main.index');
    }

    public function categories()
    {
        return view('main.index');
    }

    public function units()
    {
        return view('main.index');
    }

    public function suppliers()
    {
        return view('main.index');
    }}
