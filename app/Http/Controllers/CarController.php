<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Owner;
use App\Models\Image;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images=Image::all();
        $owners=Owner::all();
        $cars= Car::all();
        return view("cars.index",['cars'=>$cars, 'owners'=>$owners, 'images'=>$images]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $image=Image::all();
        $car=Car::all();
        $owners=Owner::all();
        return view('cars.create', ['car'=>$car,'owners'=>$owners, 'images'=>$image]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'reg_no'=>['required','min:6','max:6'],
            'brand'=>['required','min:3','max:16'],
            'model'=>['required','min:3','max:16']
           ]);
        $car=new Car();
        $car->reg_no=$request->reg_no;
        $car->brand=$request->brand;
        $car->model=$request->model;
        $car->owner_id=$request->owner_id;
        $car->save();
        $insertedId=$car->id;
        $image= new Image();

        $img=$request->file('image');
        $filname=$car->id.'.'.$img->extension();
        $image->image=$filname;
        $image->car_id=$insertedId;
        $image->storeAs('cars',$filname);
        $image->save();
        return redirect()->route('cars.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        $images=Image::all();
        $owners=Owner::all();
        return view('cars.show', ['car'=>$car, 'owners'=>$owners, 'images'=>$images]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        $images=Image::all();
        $owners=Owner::all();
        return view('cars.update', ['car'=>$car, 'owners'=>$owners, 'images'=>$images]);
    }

    /**
     * Update the specified resource in st.orage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $car->reg_no = $request->reg_no;
        $car->brand = $request->brand;
        $car->model = $request->model;
        $car->owner_id = $request->owner_id;

        $car->save();
        return redirect()->route('cars.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index');
    }

    public function display($name,Request $request){
        $file=storage_path('app/cars/'.$name);
        return response()->file( $file );
    }

}
