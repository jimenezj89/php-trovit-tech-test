<?php

namespace TechTest\Tests\Domain;

use PHPUnit\Framework\TestCase;
use TechTest\Domain\Model\SignIn;
use TechTest\Domain\Model\User;
use TechTest\Domain\Model\ChangeUserPassword;
use TechTest\Infrastructure\Persistence\InMemoryUserRepository;

class ChangeUserPasswordTest extends TestCase
{
    private $userRepository;
    private $signIn;
    private $changeUserPassword;

    protected function setUp()
    {
        $this->userRepository = new InMemoryUserRepository();
        $this->signIn = new SignIn($this->userRepository);
        $this->changeUserPassword = new changeUserPassword($this->userRepository);
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

    /**
     * @test
     */
    public function tellIfPasswordWasChanged()
    {
        $user = new User('testUser', 'testPassword');

        $this->userRepository->save($user);

        $this->changeUserPassword->execute('testUser', 'testPassword', 'testNewPassword');

        $this->assertEquals('testNewPassword', $this->userRepository->find('testUser')->password);
    }
}