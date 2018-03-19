<?php

namespace TechTest\Application\Service;


use TechTest\Domain\Model\User;
use TechTest\Domain\Model\UserRepository;

final class signUp
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function execute($userID, $password)
    {
        return $this->userRepository->save(User::create($userID, $password));
    }

}