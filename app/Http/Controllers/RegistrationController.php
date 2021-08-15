<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\Models\User;

class RegistrationController extends Controller
{
    public function register(RegistrationRequest $request) {
        User::create($request->getAttributes())->markEmailAsVerified();

        return $this->respondWithMessage('User successfully created');
    }
}
