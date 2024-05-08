<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AmiiboController extends Controller
{
    const BASE_URL = 'https://www.amiiboapi.com/api/amiibo/';
    public function index(Request $request)
    {
        $client = new Client();

        $queryParams = [];
        if ($request->has('type')) {
            $queryParams['type'] = $request->input('type');
        }
        if ($request->has('gameseries')) {
            $queryParams['gameseries'] = $request->input('gameseries');
        }
        if ($request->has('amiiboSeries')) {
            $queryParams['amiiboSeries'] = $request->input('amiiboSeries');
        }
        if ($request->has('character')) {
            $queryParams['character'] = $request->input('character');
        }

        $response = $client->request('GET', self::BASE_URL, [
            'query' => $queryParams,
        ]);

        $amiibos = json_decode($response->getBody(), true);

        return response()->json($amiibos);
    }
}
