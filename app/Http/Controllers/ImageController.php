<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        //show all images
    }
    public function store()
    {
        request()->validate([
            'image' => ['required', 'image']
        ]);


        if (!request()->file('image')->store('public/images')) {
            return response()->json([
                'error' => "can't upload image"
            ]);
        }

        return Image::create([
            'path' => request()->file('image')->hashName()
        ]);
    }
}
