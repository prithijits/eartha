<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class HomeController extends Controller
{

    public function result(Request $request)
    {

        $from_date =$request->input('from_date');
        $to_date =$request->input('to_date');

        $datas = file_get_contents('https://api.nasa.gov/neo/rest/v1/feed?start_date='.$from_date.'&end_date='.$to_date.'&api_key=ykMe4SvFzYqTGf1o8uEvtTZaBCQf5aa2UtwtmZ7H');

        $values = json_decode($datas, true);

        foreach ($values['near_earth_objects'] as $key => $value) {
            $neo_data_by_date[$key] = $value;
            foreach ($neo_data_by_date[$key] as $data_by_date) {
                $neo_by_array[] = $data_by_date;
            }
        }

        foreach ($neo_by_array as $neo) {
            $E[] = $neo;

            foreach ($neo['estimated_diameter'] as $estemetd_diameterkey => $value) {
               
                if ($estemetd_diameterkey == 'kilometers') {
                    $neo_diameter_km[] = $value;
                }
            }
            foreach ($neo['close_approach_data'] as $specification) {
                foreach ($specification['relative_velocity'] as $relative_velocitykey => $value) {
                    if ($relative_velocitykey == 'kilometers_per_hour') {
                        $neo_velocity_kmph[] = $value;
                    }
                }
                foreach ($specification['miss_distance'] as $miss_distancekey => $value) {
                    if ($miss_distancekey == 'kilometers') {
                        $neo_distance_km[] = $value;
                    }
                }
            }
        }

        $neo_data_by_date_arrkeys = array_keys($neo_data_by_date);

        foreach ($neo_data_by_date_arrkeys as $key => $value) {
            $neo_count_by_date[$value] = count($neo_data_by_date[$value]);
        }

        arsort($neo_velocity_kmph);
       
        $fastestAseroid = $neo_velocity_kmph[0];
        $fastestAseroidkey = array_key_first($neo_velocity_kmph);
        $fastestAseroidId = $neo_by_array[$fastestAseroidkey]['id'];

        asort($neo_distance_km);
        $closestAseroid = $neo_distance_km[0];
        $closestAseroidkey = array_key_first($neo_velocity_kmph);
        $closestAseroidId = $neo_by_array[$closestAseroidkey]['id'];
 
        $neo_count_by_date_arry_keys = array_keys($neo_count_by_date);
        sort($neo_count_by_date_arry_keys);

        $neo_count_by_date_arry_values = array_values($neo_count_by_date);
       
       return view('result', compact('fastestAseroidId', 'fastestAseroid', 'closestAseroidId', 'closestAseroid', 'neo_count_by_date_arry_keys', 'neo_count_by_date_arry_values'));
    }
}
