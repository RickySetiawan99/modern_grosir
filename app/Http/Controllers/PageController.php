<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function terms()
    {
        return view('pages.terms');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        return redirect()->route('contact')->with('success', 'Pesan Anda telah berhasil dikirim. Tim ModernGrosir akan menghubungi Anda dalam 1x24 jam.');
    }
}
