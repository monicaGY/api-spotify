<?php

namespace Authentication\Application\Handler;

use Authentication\Application\Transform\TransformerAuth;
use Authentication\Domain\UseCase\LoginUserUseCase;
use Illuminate\Http\JsonResponse;

class LoginUserHandler
{
    public function __construct(
        private readonly LoginUserUseCase $loginUser,
        private readonly TransformerAuth  $transform,
    ){    }

    public function handle($user): JsonResponse
    {
        return $this->transform->transform($this->loginUser->execute($user['email'], $user['password']));
    }


}
