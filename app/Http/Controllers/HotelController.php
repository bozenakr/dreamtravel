<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Country;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Validator;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::all();
        return view('back.hotels.index', [
            'hotels' => $hotels
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all()->sortBy('country');
        return view('back.hotels.create', [
            'countries' => $countries
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hotel = new Hotel;

        $hotel->country_id = $request->country_id;
        $hotel->title = $request->hotel_title;
        $hotel->days = $request->hotel_days;
        $hotel->price = $request->hotel_price;
        $hotel->desc = $request->hotel_desc;

        $hotel->save();

        return redirect()->route('hotels-index')->with('ok', 'Hotel succesfully added');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show(Hotel $hotel)
    {
        return view('back.hotels.show', [
            'hotel' => $hotel
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
        // $countries = Country::all();
        return view('back.hotels.edit', [
            'hotel' => $hotel,
            'countries' => $countries
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hotel $hotel)
    {
                        
        $hotel->country_id = $request->country_id;
        $hotel->title = $request->hotel_title;
        $hotel->days = $request->hotel_days;
        $hotel->price = $request->hotel_price;
        $hotel->desc = $request->hotel_desc;

        $hotel->save();
        
        return redirect()->route('hotels-index')->with('ok', 'Account succesfully edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hotel $hotel)
    {
        $customer->delete(); 
        return redirect()->route('customers-index')->with('ok', 'Hotel successfully deleted');
    }
}