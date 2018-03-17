<?php

namespace TechTest\Infrastructure\Persistence;

use TechTest\Domain\Model\User;
use TechTest\Domain\Model\UserRepository;

class InMemoryUserRepository implements UserRepository
{
    private $userList = [];

    public function find(string $userID): mixed
    {
        if (isset($this->userList[$userID])) {
            return $this->userList[$userID];
        }

        return false;
    }

    public function save(User $user)
    {
        $this->userList[$user->id] = $user;
    }
}