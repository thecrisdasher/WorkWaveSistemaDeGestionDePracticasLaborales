<?php

namespace App\Rules;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Http;

class ValidateEmailUniajc implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $response = Http::withHeaders([
            'Authorization' => 'eyJhbGciOiJIUzUxMiJ9.eyJhY2MiOjUwNTQwLCJzdWIiOiJmYWNpZnVlbnRlcyIsImNyZWF0ZWQiOjE1ODg2OTI0Nzg5NDgsImlhdCI6MTU4ODY5MjQ3OH0.eAZGmYNLs4F6Vut2a9eec1MMiAD6wFfHNp6tG0m-YnBRn9N1FwiKb39-I3j80a3pypRd-W1pspFxIUVL6mRPIQ'
        ])->withUrlParameters([
            'endpoint' => 'http://smartdev.uniajc.edu.co:8888/rsu_datosuniajc-1.0-SNAPSHOT-DEV/correoinstitucional',
            'email' => $value
        ])->get('{+endpoint}/{email}');


        if($response->ok()){
            return $response->json('codigo') == 200;
        } else{
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El :attribute no es institucional';
    }
}
