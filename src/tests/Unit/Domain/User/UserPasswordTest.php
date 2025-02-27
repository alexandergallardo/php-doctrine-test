<?php

namespace Tests\Unit\Domain\Model\User;

use App\Domain\Model\User\UserPassword;
use PHPUnit\Framework\TestCase;

class UserPasswordTest extends TestCase
{
    public function testCreateValidUserPassword(): void
    {
        $userPassword = new UserPassword('P@ssword123');
        $this->assertNotNull($userPassword->__toString());
    }

    public function testCreateInvalidUserPassword(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new UserPassword('weak');
    }
}
