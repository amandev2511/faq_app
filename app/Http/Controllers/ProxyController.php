<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProxyController extends Controller
{
    public function forwardRequest(Request $request)
    {
        dd(1);
        try {
            $response = Http::get($request->query('url'));

            return $response->json(); // Return the JSON response
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }
}
