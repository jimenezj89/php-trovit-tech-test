<?php

namespace TechTest\Application\Service;


use TechTest\Domain\Model\User;
use TechTest\Domain\Model\UserRepository;

final class signIn
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;

    }

    public function execute($userID, $password)
    {
        $newUser = new User($userID, $password);

        return $this->userRepository->save($newUser);
    }

}