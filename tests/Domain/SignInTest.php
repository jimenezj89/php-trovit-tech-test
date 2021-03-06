<?php

namespace TechTest\Tests\Domain;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
Use TechTest\Domain\Model\SignIn;
use TechTest\Domain\Model\User;
Use TechTest\Infrastructure\Persistence\InMemoryUserRepository;


class SignInTest extends TestCase
{
    private $signIn;
    private $userRepository;

    protected function setUp()
    {
        $this->userRepository = new InMemoryUserRepository();
        $this->signIn = new SignIn($this->userRepository);
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function shouldTellIfUserNotExists()
    {
        $this->signIn->execute('nonexistent-username', 'password');
    }

    /**
     * @test
     * @expectedException Exception
     */
    public function shouldTellIfPasswordDoesNotMatch()
    {
        $user = new User('testUser', 'testPassword');

        $this->userRepository->save($user);

        $this->signIn->execute('testUser', 'password');
    }

    /**
     * @test
     */
    public function shouldTellIfPasswordDoesMatch()
    {
        $user = new User('testUser', 'testPassword');

        $this->userRepository->save($user);

        $this->assertInstanceOf(
            'TechTest\Domain\Model\User',
            $this->signIn->execute('testUser', 'testPassword')
        );
    }
}