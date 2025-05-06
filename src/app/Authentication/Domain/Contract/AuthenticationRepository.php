<?php

namespace Authentication\Domain\Contract;

interface AuthenticationRepository
{
    public function login($mail, $password);
    public function register($name, $mail, $password);

}
