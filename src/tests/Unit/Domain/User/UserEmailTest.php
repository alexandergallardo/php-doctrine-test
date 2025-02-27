<?php

namespace Tests\Unit\Domain\Model\User;

use App\Domain\Model\User\UserEmail;
use PHPUnit\Framework\TestCase;

class UserEmailTest extends TestCase
{
    public function testCreateValidUserEmail(): void
    {
        $userEmail = new UserEmail('alexander.gallardo.torres.26@gmail.com');
        $this->assertEquals('alexander.gallardo.torres.26@gmail.com', $userEmail->__toString());
    }

    public function testCreateInvalidUserEmail(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new UserEmail('invalid-email');
    }
}
