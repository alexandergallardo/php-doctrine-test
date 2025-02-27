<?php

namespace Tests\Unit\Domain\Model\User;

use App\Domain\Model\User\UserId;
use PHPUnit\Framework\TestCase;

class UserIdTest extends TestCase
{
    public function testCreateUserId(): void
    {
        $userId = new UserId();
        $this->assertNotNull($userId->__toString());
    }
}
