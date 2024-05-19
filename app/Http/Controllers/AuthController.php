<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequests;
use App\Http\Requests\UserRegistrasiRequest;
use App\Http\Resources\UserRecource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(UserLoginRequests $request)
    {
        $data = $request->validated();
        $user = User::where('email', $data['email'])->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'status' => 400,
                'message' => 'Email atau password tidak cocok'], 400);
        }
        $user['token'] = $user->createToken('user login')->plainTextToken;

        return response([
            'status' => 200,
            'message' => 'Login Berhasil',
            'data' => new UserRecource($user)], 200);
    }

    public function registrasi(UserRegistrasiRequest $request)
    {
        $data = $request->validated();

        // Memeriksa apakah email valid
        $data_email = explode('@', $data['email']);
        if ($data_email[1] != 'gmail.com') {
            return response([
                 'status' => 400,
                 'message' => 'Email tidak valid',
            ], 400);
        }

        // Menetapkan nilai usertype secara langsung
        $data['usertype'] = 'Administrator';
        $data['status_user'] = 'Enable';

        // Membuat model User dengan data yang telah dimodifikasi
        $user = User::create([
            'usertype' => $data['usertype'],
            'status_user' => $data['status_user'],
            'email' => $data['email'],
            'name' => $data['name'],
            'password' => bcrypt($data['password']),
        ]);

        // Mengembalikan respons
        return response([
            'status' => 201,
            'message' => 'Registrasi Berhasil',
            'data' => new UserRecource($user),
        ], 201);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Logout berhasil',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $User)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $User)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $User)
    {
    }

    private function gabungNamaLengkap($firstname, $lastname)
    {
        return $firstname.' '.$lastname;
    }
}