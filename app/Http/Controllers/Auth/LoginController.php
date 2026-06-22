<?php

namespace App\Http\Controllers\Auth;

use App\DTOs\LoginDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use App\Service\Auth\LoginService;

class LoginController extends Controller
{
    public function __construct(private LoginService $loginService)
    {}

    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $dto = new LoginDTO(
            email: $request->validated('email'),
            password: $request->validated('password'),
            remember: $request->validated('remember'),
        );

        $success = $this->loginService->execute($dto);

        if($success) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => "Email hoặc mật khẩu không đúng",
        ])->onlyInput('email');
    }
}
