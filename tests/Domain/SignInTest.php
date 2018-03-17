<?php

use PHPUnit\Framework\TestCase;
Use \TechTest\Domain\Model\SignIn;
Use \TechTest\Infrastructure\Persistence\InMemoryUserRepository;

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
        $this->userRepository->save('testUser', 'testPassword');

        $this->signIn->execute('testUser', 'password');
    }
}