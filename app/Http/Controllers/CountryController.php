<?php

namespace App\Http\Controllers;

use App\Models\Countries;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $countries = Cache::remember('countries', 1, function () {
            return Countries::select('name')->get();
        });
        $countries = Countries::select('name')->get();
        return response()->json($countries);
    }
}
