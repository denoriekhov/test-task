<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index (Request $request) {
        $query = $request->get('query');

        $data = Result::where('url', 'like', "%$query%")->get();
        return response()->json($data);
    }
}
