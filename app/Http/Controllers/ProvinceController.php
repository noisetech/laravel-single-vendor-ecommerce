<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function index()
    {
        return view('pages.provinsi.index');
    }

    public function data()
    {
        if (request()->ajax()) {

            $data = Province::orderBy('name', 'ASC')->get();

            return datatables()->of($data)
                ->make('true');
        }
    }
}
