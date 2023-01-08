<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityController extends Controller
{
    public function index()
    {
        return view('pages.kota.index');
    }

    public function data()
    {
        if (request()->ajax()) {

            $data = DB::table('city')
                ->select('city.id as id_city', 'city.name as city_name', 'provinces.name as province_name')
                ->join('provinces', 'provinces.id', '=', 'city.province_id')
                ->orderBy('city.name', 'ASC')
                ->get();

            $array = array();

            foreach ($data as $key => $value) {
                $array[] = $value;
            }

            return datatables()->of($array)
                ->make('true');
        }
    }
}
