<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Brand;
use App\Modelo;
use App\Car;
use App\Feature;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        /*
        $brand = new Brand();
        $brand->name = "Ferrari";
        $brand->save();

        $modelo = new Modelo();
        $modelo->name = "Testarosa";
        $modelo->brand_id = $brand->id;
        $modelo->save();

        $car = new Car();
        $car->year = "2016-10-06";
        $car->color = "ROJAAA";
        $car->kms = 150000;
        $car->price = 1500000;
        $car->modelo_id = $modelo->id;
        $car->save();
*/
        $cars = Car::with("modelo")->get();

        return view('cars')->with('cars',$cars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $car = new Car;
        $brands = Brand::all();
        $modelos = Modelo::all();
        $features = Feature::all();

        return view('car')->with('car', $car)->with('brands', $brands)->with('modelos', json_encode($modelos , true))->with('features', $features);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       // dd($request->modelo_id);
        $this->validate($request, [
        'year' => 'required',
        'color' => 'required',
        'kms' => 'required',
        'price' => 'required',
        'modelo_id' => 'required',
        ]);

        $car = new Car();
        $car->year = $request->year;
        $car->color = $request->color;
        $car->kms = $request->kms;
        $car->price = $request->price;
        $car->modelo_id = $request->modelo_id;
        $car->save();

        return redirect("car/".$car->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $car = Car::find($id);

        return view('cars')->with('cars',$car);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
