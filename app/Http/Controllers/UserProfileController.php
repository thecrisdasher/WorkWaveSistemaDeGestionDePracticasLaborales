<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // Asegúrate de importar la clase Str

class UserProfileController extends Controller
{
    public function show()
    {
        return view('pages.user-profile');
    }
    public function update(Request $request)
    {
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

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = $file->getClientOriginalName(); // Usa el nombre original del archivo
            $filePath = $file->storeAs('profile_photos', $fileName, 'public');

            auth()->user()->update(['photo' => $filePath]);
        }

        // Luego actualizar los demás campos del perfil del usuario
        auth()->user()->update([
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

        // Envía una respuesta JSON para manejarla en el frontend
        return response()->json(['message' => 'Postulación exitosa'], 200);
    }


}
