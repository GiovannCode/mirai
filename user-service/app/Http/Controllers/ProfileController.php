<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'auth_user_id' => 'required|integer|unique:profiles,auth_user_id',
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|unique:profiles,email',
            'bio' => 'nullable|string',
        ]);

        $profile = Profile::create($validated);

        return response()->json([
            'message' => 'Perfil creado correctamente',
            'data' => $profile
        ], 201);
    }

    public function show($auth_user_id)
    {
        $profile = Profile::where('auth_user_id', $auth_user_id)->first();

        if (!$profile) {
            return response()->json([
                'message' => 'Perfil no encontrado'
            ], 404);
        }

        return response()->json($profile);
    }

    public function update(Request $request, $auth_user_id)
    {
        $profile = Profile::where('auth_user_id', $auth_user_id)->first();

        if (!$profile) {
            return response()->json([
                'message' => 'Perfil no encontrado'
            ], 404);
        }

        $validated = $request->validate([
            'full_name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:profiles,email,' . $profile->id,
            'bio' => 'nullable|string',
        ]);

        $profile->update($validated);

        return response()->json([
            'message' => 'Perfil actualizado correctamente',
            'data' => $profile
        ]);
    }

    public function destroy($auth_user_id)
    {
        $profile = Profile::where('auth_user_id', $auth_user_id)->first();

        if (!$profile) {
            return response()->json([
                'message' => 'Perfil no encontrado'
            ], 404);
        }

        $profile->delete();

        return response()->json([
            'message' => 'Cuenta eliminada correctamente'
        ]);
    }
}