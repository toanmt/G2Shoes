<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function index(){
        $images = Image::all();
        return View('Admin.images.index')->with(['images'=>$images]);
    }
}
