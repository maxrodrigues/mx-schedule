<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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

		$validator = Validator::make($request->all(), $rules);

		if ($validator->stopOnFirstFailure()->fails())
		{
			return new JsonResponse(['message' => $validator->errors()], Response::HTTP_BAD_REQUEST);
		}

		try
		{
            $company = Company::create([
				'name' => $request->company_name,
				'slug' => Str::slug($request->company_name),
            ]);

			$attr = [
				'name'     => $request->name,
				'email'    => $request->email,
				'password' => Hash::make($request->password),
			];

            $company->user()->create($attr);

			return new JsonResponse(['message' => 'User registered successfully.'], Response::HTTP_CREATED);
		}
		catch(Exception $e)
		{
			return new JsonResponse(['message' => $e->getMessage()], Response::HTTP_BAD_GATEWAY);
		}
	}
}
