<?php

namespace TechTest\Domain\Model;


interface UserRepository
{
    public function find(string $userID);

    public function save(User $user);
}