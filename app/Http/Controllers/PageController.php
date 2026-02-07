<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function show($base, $view)
    {

        $page = $base.'/'.$view;
        if (view()->exists($page)) {

            return view($page);
        } else {

            abort(404);
        }
    }
}
