<?php

namespace App\Service\Auth;

use App\DTOs\LoginDTO;
use Illuminate\Support\Facades\Auth;

class LoginService {
    public function execute(LoginDTO $dto): bool
    {
        return Auth::attempt([
            'email' => $dto->email,
            'password' => $dto->password,
        ], $dto->remember);
    }
}
