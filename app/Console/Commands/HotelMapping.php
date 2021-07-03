<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Hotel;

class HotelMapping extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hotel:mapping';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Mapping hotel with name duplicate';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $hotels_asc = Hotel::orderByRaw('CHAR_LENGTH(name)')->get();
        $hotels = Hotel::all();
        foreach ($hotels_asc as $hotel_asc) {
            if ($hotel_asc->parent_id == 0) {
                $hotel_asc->parent_id = $hotel_asc->id;
                $hotel_asc->save();
            }
            if ($hotel_asc->name != null) {
                foreach ($hotels as $hotel) {
                    if ($hotel->name != null) {
                        $arr1 = explode(" ", $hotel_asc->name);
                        $arr2 = explode(" ", $hotel->name);
                        if (count($arr1) <= count($arr2)) {
                            $dup = 0;
                            foreach ($arr1 as $letter) {
                                foreach ($arr2 as $letter_dup) {
                                    if (strtolower($letter) == strtolower($letter_dup)) {
                                        $dup++;
                                        continue;
                                    }
                                }
                            }
                            if ($dup / count($arr1) == 1 && $dup / count($arr2) > 0.6) {
                                $hotel->parent_id = $hotel_asc->parent_id;
                                $hotel->save();
                            }
                        }
                    }
                    $dup = 0;
                }
            }
        }
    }
}
