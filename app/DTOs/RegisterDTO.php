<?php

namespace App\DTOs;

class RegisterDTO {
    public function __construct
    (
        public readonly string $name, // readonly: chỉ set 1 lần, không sửa sau
        public readonly string $email,
        public readonly string $password,
    ) {}
}
