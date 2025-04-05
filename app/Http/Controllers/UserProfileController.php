<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserProfileController extends Controller
{
    public function show()
    {
        return view('pages.user-profile');
    }

    public function update(Request $request)
    {
        // Validación de los datos del formulario
        $attributes = $request->validate([
            'username' => ['required', 'max:255', 'min:2'],
            'firstname' => ['max:100'],
            'lastname' => ['max:100'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore(auth()->user()->id)],
            'address' => ['max:100'],
            'city' => ['max:100'],
            'country' => ['max:100'],
            'postal' => ['max:100'],
            'about' => ['max:255'],
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = auth()->user();

        // Si hay una foto, se actualiza
        if ($request->hasFile('photo')) {
            // Elimina la imagen anterior si existe
            if ($user->photo && Storage::disk('public')->exists($user->photo)) {
                Storage::disk('public')->delete($user->photo);
            }

            // Guarda la nueva imagen con un nombre único
            $file = $request->file('photo');
            $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension(); // Genera un nombre único
            $filePath = $file->storeAs('profile_photos', $fileName, 'public');
            $user->photo = $filePath; // Actualiza la ruta en la base de datos
        }

        // Actualizamos el resto de los datos del perfil del usuario
        $user->update([
            'username' => $request->get('username'),
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
            'city' => $request->get('city'),
            'country' => $request->get('country'),
            'postal' => $request->get('postal'),
            'about' => $request->get('about'),
        ]);

        // Respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Se actualizó el perfil correctamente.',
            'photo_url' => $user->photo ? Storage::url($user->photo) : null, // Pasamos la URL de la foto actualizada
        ], 200);
    }
}
