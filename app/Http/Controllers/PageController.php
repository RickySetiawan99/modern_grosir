<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($base, $view)
    {
        // Check if the view exists
        $page = $base.'/'.$view;
        if (view()->exists($page)) {
            // Return the view if it exists
            return view($page);
        } else {
            // Return a 404 response if the view does not exist
            abort(404);
        }
    }
}
