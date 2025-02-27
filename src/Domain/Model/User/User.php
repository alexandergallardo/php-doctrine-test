<?php

namespace App\Domain\Model\User;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "users")]
#[ORM\Index(name: "email_idx", columns: ["email"])]
class User
{
    #[ORM\Id]
    #[ORM\Column(type: "string")]
    private UserId $id;

    #[ORM\Column(type: "string")]
    private UserName $name;

    #[ORM\Column(type: "string", unique: true, length: 191)]
    private UserEmail $email;

    #[ORM\Column(type: "string")]
    private UserPassword $password;

    #[ORM\Column(type: "datetime_immutable")]
    private \DateTimeImmutable $createdAt;

    public function __construct(UserId $id, UserName $name, UserEmail $email, UserPassword $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): UserId
    {
        return $this->id;
    }

    public function getName(): UserName
    {
        return $this->name;
    }

    public function getEmail(): UserEmail
    {
        return $this->email;
    }

    public function getPassword(): UserPassword
    {
        return $this->password;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setId(UserId $id): void
    {
        $this->id = $id;
    }

    public function setName(UserName $name): void
    {
        $this->name = $name;
    }

    public function setEmail(UserEmail $email): void
    {
        $this->email = $email;
    }

    public function setPassword(UserPassword $password): void
    {
        $this->password = $password;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}
