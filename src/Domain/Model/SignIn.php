<?php

namespace TechTest\Domain\Model;


final class signIn
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

        if (!$this->isPasswordCorrect($user, $password)) {
            throw new \Exception("Username and password mismatch!");
        }

        return $user;
    }

    private function isPasswordCorrect(User $user, string $password)
    {
        return $user->password === $password;
    }

}