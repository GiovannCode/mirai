<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StreamController extends Controller
{
    public function stream(Request $request)
    {
        $url = $request->query('url');

        if (!$url) {
            return response()->json([
                "error" => "URL no proporcionada"
            ], 400);
        }

        // Detectar tipo
        if (str_contains($url, '.m3u8')) {
            // HLS
            return redirect()->away($url);
        }

        if (str_contains($url, '.mp4')) {
            // Video normal
            return redirect()->away($url);
        }

        return response()->json([
            "error" => "Formato no soportado"
        ], 400);
    }
}