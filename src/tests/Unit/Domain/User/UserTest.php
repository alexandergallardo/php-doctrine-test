<?php

namespace Tests\Unit\Domain\Model\User;

use App\Domain\Model\User\User;
use App\Domain\Model\User\UserId;
use App\Domain\Model\User\UserName;
use App\Domain\Model\User\UserEmail;
use App\Domain\Model\User\UserPassword;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testCreateUser(): void
    {
        $user = new User(
            new UserId(),
            new UserName('Alexander Gallardo'),
            new UserEmail('alexander.gallardo.torres.26@gmail.com'),
            new UserPassword('P@ssword123')
        );

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals('Alexander Gallardo', $user->getName()->__toString());
        $this->assertEquals('alexander.gallardo.torres.26@gmail.com', $user->getEmail()->__toString());
    }
}
