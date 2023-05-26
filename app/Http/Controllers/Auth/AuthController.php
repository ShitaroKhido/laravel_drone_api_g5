<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUsersRequest;
use App\Http\Requests\StoreUsersRequest;
use App\Models\User;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use HttpResponses;

    public function register(StoreUsersRequest $request)
    {
        try {
            $request->validated($request->all());
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);
            return $this->success([
                'user' => $user,
                'token' => $user->createToken('API Token of ' . $user->name)->plainTextToken
            ], 'Registered Successfully!');
        } catch (\Throwable $th) {
            return $this->error([], 'Error', 500);
        }
    }

    public function login(LoginUsersRequest $request)
    {
        $request->validated($request->all());
        if (!Auth::attempt($request->only('email', 'password'))) {
            return $this->error('', 'Credential is not matched!', 401);
        }

        $user = User::where('email', $request->email)->first();
        return $this->success([
            'user' => Auth::getUser(),
            'token' => $user->createToken('Login Token')->plainTextToken
        ]);
    }

    public function logout()
    {
        request()->user()->currentAccessToken()->delete();
        return $this->success([
            'Message' => 'You have been logout!'
        ]);
    }
}
