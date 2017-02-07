<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
    	return view('admin.tag.index');
    }

    public function create()
    {
    	return view('admin.tag.create');
    }
}
