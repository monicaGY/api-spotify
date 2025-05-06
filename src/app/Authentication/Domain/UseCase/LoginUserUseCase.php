<?php

namespace Authentication\Domain\UseCase;

use Authentication\Domain\Contract\AuthenticationRepository;

class LoginUserUseCase
{
    public function __construct(
        private readonly AuthenticationRepository $repository
    ){    }
    public function execute($mail, $password)
    {
        return $this->repository->login($mail, $password);
    }

}
