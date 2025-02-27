<?php

namespace Tests\Unit\Domain\Model\User;

use App\Domain\Model\User\UserName;
use PHPUnit\Framework\TestCase;

class UserNameTest extends TestCase
{
    public function testCreateValidUserName(): void
    {
        $userName = new UserName('Alexander Gallardo');
        $this->assertEquals('Alexander Gallardo', $userName->__toString());
    }

    public function testCreateInvalidUserName(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new UserName('aa');
    }
}
