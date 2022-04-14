<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\City;
use \App\Models\State;
use App\Http\Requests\CityStoreRequest;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cities = City::all();
        if($request->has('search')){
            $cities = City::where('city_name', 'like', '%'.$request->search.'%')->paginate(10);
           }
        return view('cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(City $city)
    {
        $states = State::all();
        return view('cities.create',compact('city','states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityStoreRequest $request)
    {
        City::create($request->validated());
        return redirect()->route('cities.index')->with('message', 'City created successfully');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $states = State::all();
        return view('cities.edit', compact('city','states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $city->update([
            'state_id' => $request->state_id,
            'city_name' =>$request->city_name,
        ]);
        return redirect()->route('cities.index')->with('message', 'City updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('cities.index')->with('message','City has been deleted successfully');
    }
}
