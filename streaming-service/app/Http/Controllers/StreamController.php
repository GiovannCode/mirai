<?php

namespace App\Http\Controllers;

class StreamController extends Controller
{
    public function stream($movie, $file)
    {
        $fullPath = storage_path("app/hls/$movie/$file");

        if (!file_exists($fullPath)) {
            return response()->json([
                "error" => "Archivo no encontrado",
                "path" => $fullPath
            ], 404);
        }

        $mimeType = match (pathinfo($file, PATHINFO_EXTENSION)) {
            'm3u8' => 'application/vnd.apple.mpegurl',
            'ts' => 'video/MP2T',
            default => 'application/octet-stream',
        };

        return response()->file($fullPath, [
            'Content-Type' => $mimeType
        ]);
    }
}