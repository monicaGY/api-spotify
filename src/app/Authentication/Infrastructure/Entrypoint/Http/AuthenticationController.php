<?php

namespace Authentication\Infrastructure\Entrypoint\Http;

use Authentication\Application\Handler\LoginUserHandler;
use Authentication\Application\Handler\RegisterUserHandler;
use Authentication\Application\Transform\TransformerAuth;
use Authentication\Application\Transform\TransformerRegister;
use Authentication\Domain\UseCase\LoginUserUseCase;
use Authentication\Domain\UseCase\RegisterUserUseCase;
use Authentication\Infrastructure\Entrypoint\Http\Validator\LoginRequest;
use Authentication\Infrastructure\Entrypoint\Http\Validator\RegisterRequest;
use Authentication\Infrastructure\Persistence\Mysql\MysqlAuthenticationRepository;
use Illuminate\Http\JsonResponse;

class AuthenticationController
{
    /**
     * Login
     * @unauthenticated
     */
    public function login(LoginRequest $request): JsonResponse
    {
        return (new LoginUserHandler(
            new LoginUserUseCase(
                new MysqlAuthenticationRepository()
            ),
            new TransformerAuth()
        ))->handle($request->validated());

    }
    /**
     * Register
     * @unauthenticated
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        return (new RegisterUserHandler(
            new RegisterUserUseCase(
                new MysqlAuthenticationRepository()
            ),
            new TransformerAuth()
        ))->handle($request->validated());

    }


}
