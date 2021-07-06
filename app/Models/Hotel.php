<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Hotel extends Model
{
    use HasFactory;

    protected $table = 'hotels';

    // Get the duplicated hotel and the corresponding quantity for each hotel
    public function getAmountDupplicate(){
        return Hotel::select(DB::raw('COUNT(id) as count'),'parent_id')
        ->groupBy('parent_id')
        ->having('count', '>', 1)
        ->get(); 
    }

    
    // Get a representative of duplicated hotels      
    public function getAllDupplicate($parent_id){
        return Hotel::where('id',$parent_id)->first();
    }

    // get a list of all Duplicate hotels by parent_id    
    public function getAllHotelMap($parent_id){
        return Hotel::where('parent_id', $parent_id)->get();
    }
}
