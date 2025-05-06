<?php

namespace Authentication\Domain\UseCase;

use Authentication\Domain\Contract\AuthenticationRepository;

class RegisterUserUseCase
{
    public function __construct(
        private readonly AuthenticationRepository $repository
    ){    }
    public function execute($name, $mail, $password){
        return $this->repository->register($name, $mail, $password);
    }
}
