<?php

namespace TechTest\Domain\Model;


final class User
{
    public $id;
    public $password;

    public function __construct(string $id, string $password)
    {
        $this->id = $id;
        $this->password = $password;
    }

    public static function create(string $id, string $password)
    {
        return new static($id, $password);
    }
}