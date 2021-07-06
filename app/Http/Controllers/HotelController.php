<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Support\Facades\DB;

class HotelController extends Controller
{
    //
    private $hotelObj;
    public function __construct()
    {
        $this->hotelObj = new Hotel();
    }
    public function getHotel()
    {
        $hotels = $this->hotelObj->getAmountDupplicate();
        $hotel_arr = [];
        $hotel_count = [];
        foreach ($hotels as $hotelsMap) {
            $hotel = $this->hotelObj->getAllDupplicate($hotelsMap->parent_id);
            $hotel_arr[] = $hotel;
            $hotel_count[] = $hotelsMap->count;
        }
        return view('hotel.show', compact(['hotel_arr', 'hotel_count']));
    }

    public function mapHotel($parent_id)
    {
        $hotels = $this->hotelObj->getAllHotelMap($parent_id);
        return view('hotel.map', compact('hotels'));
    }
}
