<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
	public function index(Request $request)
	{
		$validator = Validator::make($request->fields, [
			'email'     => 'required',
			'password'  => 'required',
		]);

		if ($validator->stopOnFirstFailure()->fails())
		{
			return new JsonResponse(['message' => $validator->errors()], 400);
		}

		$data = $request->fields;

		$user = User::where('email', $data['email'])->first();

		if (!Hash::check($data['password'], $user->password))
		{
			return new JsonResponse(['message' => 'erro'], 400);
		}

		$token = $user->createToken('authToken')->plainTextToken;

		return new JsonResponse([
			'token'      => $token,
			'token_type' => 'Bearer',
		]);
	}
}
