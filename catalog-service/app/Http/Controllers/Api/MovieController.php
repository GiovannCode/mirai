<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $perPage = (int) $request->integer('per_page', 10);
        $perPage = max(1, min($perPage, 50));

        $query = Movie::query()
            ->where('status', 'aprobado')
            ->when(
                $request->filled('genre'),
                fn ($q) => $q->whereRaw('LOWER(genre) = LOWER(?)', [$request->string('genre')->toString()])
            )
            ->latest('id');

        return response()->json($query->paginate($perPage));
    }

    public function show(int $id): JsonResponse
    {
        $movie = Movie::query()
            ->where('status', 'aprobado')
            ->findOrFail($id);

        return response()->json($movie);
    }
}
