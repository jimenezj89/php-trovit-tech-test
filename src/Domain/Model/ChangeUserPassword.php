<?php


namespace TechTest\Domain\Model;


final class ChangeUserPassword
{
    private $signIn;
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->signIn = new SignIn($userRepository);
        $this->userRepository = $userRepository;
    }

    public function execute($userID, $oldPassword, $newPassword)
    {
        $user = $this->signIn->execute($userID, $oldPassword);
        $user->password = $newPassword;
        $this->userRepository->save($user);

        return true;
    }
}