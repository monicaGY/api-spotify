<?php

namespace Authentication\Application\Handler;

use Authentication\Application\Transform\TransformerRegister;
use Authentication\Domain\UseCase\RegisterUserUseCase;
use Illuminate\Http\JsonResponse;

class RegisterUserHandler
{
    public function __construct(
        private readonly RegisterUserUseCase $registerUser,
        private readonly TransformerRegister $transformer,
    ){    }

    public function handle($user): JsonResponse
    {
        return $this->transformer->transform($this->registerUser->execute($user['name'], $user['email'], $user['password']));
    }
}
