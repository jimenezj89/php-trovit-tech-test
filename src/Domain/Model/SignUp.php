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
        $user = $this->userRepository->find($userID);

        if (is_null($user)) {
            throw new \InvalidArgumentException(sprintf("The user %s does not exist!", $userID));
        }

        if (!$this->isPasswordCorrect($userID, $password)) {
            throw new \Exception("Username and password mismatch!");
        }

        return $user;
    }

    private function isPasswordCorrect(User $user, string $password)
    {
        return $user->password === $password;
    }

}