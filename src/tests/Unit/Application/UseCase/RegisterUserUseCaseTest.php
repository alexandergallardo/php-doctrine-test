<?php

namespace Tests\Unit\Application\UseCase;

use App\Application\UseCase\RegisterUserUseCase;
use App\Application\UseCase\RegisterUserRequest;
use App\Application\UseCase\UserResponseDTO;
use App\Domain\Model\User\User;
use App\Domain\Model\User\UserEmail;
use App\Domain\Model\User\UserId;
use App\Domain\Model\User\UserName;
use App\Domain\Model\User\UserPassword;
use App\Domain\Repository\UserRepositoryInterface;
use App\Shared\Exception\UserAlreadyExistsException;
use PHPUnit\Framework\TestCase;

class RegisterUserUseCaseTest extends TestCase
{
    public function testRegisterUser(): void
    {
        $userRepository = $this->createMock(UserRepositoryInterface::class);
        $userRepository->method('findByEmail')->willReturn(null);
        $userRepository->expects($this->once())->method('save');

        $useCase = new RegisterUserUseCase($userRepository);
        $request = new RegisterUserRequest('Alexander Gallardo', 'alexander.gallardo.torres.26@gmail.com', 'P@ssword123');
        $response = $useCase->execute($request);

        $this->assertInstanceOf(UserResponseDTO::class, $response);
        $this->assertNotNull($response->getId());
        $this->assertEquals('Alexander Gallardo', $response->getName());
        $this->assertEquals('alexander.gallardo.torres.26@gmail.com', $response->getEmail());
    }

    public function testRegisterUserWithExistingEmail(): void
    {
        $this->expectException(UserAlreadyExistsException::class);

        $existingUser = new User(
            new UserId(),
            new UserName('Alexander Gallardo'),
            new UserEmail('alexander.gallardo.torres.26@gmail.com'),
            new UserPassword('P@ssword123')
        );

        $userRepository = $this->createMock(UserRepositoryInterface::class);
        $userRepository->method('findByEmail')->willReturn($existingUser);

        $useCase = new RegisterUserUseCase($userRepository);
        $request = new RegisterUserRequest('Alexander Gallardo', 'alexander.gallardo.torres.26@gmail.com', 'P@ssword123');
        $useCase->execute($request);
    }
}
