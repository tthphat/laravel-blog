<?php

namespace App\Service;

use App\DTOs\RegisterDTO;
use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterService {
    public function execute(RegisterDTO $dto): User {
        return User::create([
            'name' => $dto->name,
            'email' => $dto->email,
            'password' => Hash::make($dto->password),
            'role' => UserRole::USER
        ]);
    }
}
