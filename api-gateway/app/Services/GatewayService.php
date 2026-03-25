<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GatewayService
{
    protected $services = [
        'auth' => 'http://localhost:8001',
        'users' => 'http://localhost:8002',
        // Catalog-service expone estas rutas en /api/catalog/*
        'catalog' => 'http://localhost:8003/api/catalog',
        'playback' => 'http://localhost:8004',
        'streaming' => 'http://localhost:8005',
    ];

    public function forward($service, $path)
    {
        // Verificar que el servicio exista
        if (!isset($this->services[$service])) {
            return response()->json([
                'error' => 'Servicio no encontrado',
                'service' => $service
            ], 404);
        }

        // Construir la URL destino
        $url = $this->services[$service] . '/' . $path;

        try {
            // Hacer la petición al microservicio
            $response = Http::withHeaders(request()->headers->all())
                ->send(request()->method(), $url, [
                    'query' => request()->query(),
                    'body' => request()->getContent()
                ]);

            // Regresar respuesta al frontend
            return response($response->body(), $response->status());

        } catch (\Exception $e) {
            // Manejo de error cuando el microservicio no está disponible
            return response()->json([
                'error' => 'Microservicio no disponible',
                'service' => $service,
                'url' => $url,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}