<?php

namespace Tests\Integration\Domain\Repository;

use App\Domain\Model\User\User;
use App\Domain\Model\User\UserId;
use App\Domain\Model\User\UserName;
use App\Domain\Model\User\UserEmail;
use App\Domain\Model\User\UserPassword;
use App\Domain\Repository\DoctrineUserRepository;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;

class DoctrineUserRepositoryTest extends TestCase
{
    private EntityManagerInterface $entityManager;
    private DoctrineUserRepository $userRepository;

    protected function setUp(): void
    {
        require './doctrine-config.php';
        $this->entityManager = $entityManager;
        $this->userRepository = new DoctrineUserRepository($this->entityManager);

        // Clear the table before each test
        $connection = $this->entityManager->getConnection();
        $connection->executeQuery('DELETE FROM users');
    }

    public function testSaveUser(): void
    {
        $user = new User(
            new UserId(),
            new UserName('Alexander Gallardo'),
            new UserEmail('alexander.gallardo.torres.26@gmail.com'),
            new UserPassword('P@ssword123')
        );

        $this->userRepository->save($user);
        $foundUser = $this->userRepository->findById($user->getId());

        $this->assertInstanceOf(User::class, $foundUser);
        $this->assertEquals('Alexander Gallardo', $foundUser->getName()->__toString());
    }

    public function testFindUserById(): void
    {
        $user = new User(
            new UserId(),
            new UserName('Alexander Gallardo'),
            new UserEmail('alexander.gallardo.torres.26@gmail.com'),
            new UserPassword('P@ssword123')
        );

        $this->userRepository->save($user);
        $foundUser = $this->userRepository->findById($user->getId());

        $this->assertInstanceOf(User::class, $foundUser);
        $this->assertEquals('Alexander Gallardo', $foundUser->getName()->__toString());
    }

    public function testFindUserByEmail(): void
    {
        $user = new User(
            new UserId(),
            new UserName('Alexander Gallardo'),
            new UserEmail('alexander.gallardo.torres.26@gmail.com'),
            new UserPassword('P@ssword123')
        );

        $this->userRepository->save($user);
        $foundUser = $this->userRepository->findByEmail(new UserEmail('alexander.gallardo.torres.26@gmail.com'));

        $this->assertInstanceOf(User::class, $foundUser);
        $this->assertEquals('Alexander Gallardo', $foundUser->getName()->__toString());
    }

    public function testDeleteUser(): void
    {
        $user = new User(
            new UserId(),
            new UserName('Alexander Gallardo'),
            new UserEmail('alexander.gallardo.torres.26@gmail.com'),
            new UserPassword('P@ssword123')
        );

        $this->userRepository->save($user);
        $this->userRepository->delete($user->getId());
        $foundUser = $this->userRepository->findById($user->getId());

        $this->assertNull($foundUser);
    }
}
