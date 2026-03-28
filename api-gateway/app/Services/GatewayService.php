<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GatewayService
{
    protected $services = [
        'auth' => 'http://localhost:8001',
        'users' => 'http://localhost:8002/api',
        'catalog' => 'http://localhost:8003/api/catalog',
        'upload' => 'http://localhost:8006',
        'playback' => 'http://localhost:8004',
        'streaming' => 'http://localhost:8005',
    ];

    public function forward($service, $path)
    {
        if (!isset($this->services[$service])) {
            return response()->json([
                'error' => 'Servicio no encontrado',
                'service' => $service
            ], 404);
        }

        $url = rtrim($this->services[$service], '/') . '/' . ltrim($path, '/');

        try {
            $response = Http::withHeaders(request()->headers->all())
                ->send(request()->method(), $url, [
                    'query' => request()->query(),
                    'body' => request()->getContent()
                ]);

            return response($response->body(), $response->status())
                ->withHeaders([
                    'Content-Type' => $response->header('Content-Type', 'application/json')
                ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Microservicio no disponible',
                'service' => $service,
                'url' => $url,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}