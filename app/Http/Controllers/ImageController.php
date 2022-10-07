<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Car;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function create()
    {
        $image=Image::all();
        return view('images.create', ['image'=>$image]);
    }

    public function store(Request $request)
    {
        $image = new Image();

        $img=$request->file('image');

        $filename=$request->car_id.'_'.rand().'.'.$img->extension();

        $image->img=$filename;
        $image->car_id=$request->car_id;

        $img->storeAs('cars',$filename);
        $image->save();

        return redirect()->back();
    }

    public function destroy(Image $image, Request $request)
    {
        $image->delete();
        return redirect()->back();
    }

}
