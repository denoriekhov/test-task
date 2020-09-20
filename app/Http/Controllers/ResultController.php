<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index (Request $request) {
        $query = $request->get('query');

        $parsed = parse_url($query);

        $scheme = $parsed['scheme'] ?? null;
        $host = $parsed['host'] ?? null;
        $path = $parsed['path'] ?? null;

        $qb = Result::query();

        if($scheme) {
            $qb->where('url', 'like', "$scheme://%");
        }
        if($host) {
            $qb->where(function ($q) use ($host) {
                $q
                    ->orWhere('url', 'like', "%//$host%")
                    ->orWhere('url', 'like', "%//www.$host%");
            });
        }
        if($path) {
            $path = explode('/', $path);
            $path = array_filter($path);
            $path = implode('/', $path);
            $qb->where(function ($q) use ($path) {
                $q
                    ->orWhere('url', 'like', "%/$path/%")
                    ->orWhere('url', 'like', "%www.$path/%");
            });
        }

        return response()->json($qb->get());
    }
}
