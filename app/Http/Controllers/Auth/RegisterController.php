<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
	public function index(Request $request)
	{
		$rules = [
			'name'                    => ['required', 'max:256'],
			'email'                   => ['required', 'email', 'unique:users'],
			'password'                => ['required', 'confirmed', Password::min(6)->letters()->mixedCase()->numbers()->uncompromised()],
			'password_confirmation'   => ['required'],
			'company_name'            => ['required'],
		];

		$validator = Validator::make($request->fields, $rules);

		if ($validator->stopOnFirstFailure()->fails())
		{
			return new JsonResponse(['message' => $validator->errors()], 400);
		}

		try
		{
			$attr = [
				'name'     => $request->fields['name'],
				'email'    => $request->fields['email'],
				'password' => Hash::make($request->fields['password']),
			];

			$user = User::create($attr);

			$user->company()->create([
				'name' => $request->fields['company_name'],
				'slug' => Str::slug($request->fields['company_name']),
			]);

			return new JsonResponse(['message' => 'User registered successfully.'], 201);
		}
		catch(Exception $e)
		{
			return new JsonResponse(['message' => $e->getMessage()], 400);
		}
	}
}
