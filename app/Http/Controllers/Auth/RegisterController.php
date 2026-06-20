<?php

namespace App\Http\Controllers\Auth;

use App\DTOs\RegisterDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Service\RegisterService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function __construct(private RegisterService $registerService)
    {}

    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request) {
        $dto = new RegisterDTO(
            name: $request->validated('name'),
            email: $request->validated('email'),
            password: $request->validated('password'),
        );

        $user = $this->registerService->execute($dto);

        Auth::login($user); // Login tự động

        return redirect('/');
    }
}
