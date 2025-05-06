<?php

namespace Authentication\Infrastructure\Persistence\Mysql;

use App\Models\User;
use Authentication\Domain\Contract\AuthenticationRepository;
use Illuminate\Support\Facades\Auth;

class MysqlAuthenticationRepository implements AuthenticationRepository
{
    public function login($mail, $password): ?string
    {
        if(Auth::attempt(['email' => $mail, 'password' => $password])){
            return (Auth::user())->createToken('auth_token')->plainTextToken;
        }
        return null;
    }

    public function register($name, $mail, $password): string
    {
        $user = User::create([
            'name' => $name,
            'email' => $mail,
            'password' => bcrypt($password)
        ]);

        return $user->createToken('auth_token')->plainTextToken;
    }
}
