<?php

namespace App\DTO;

use Carbon\Carbon;

class UserViewDTO
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $userType;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $email;
    /**
     * @var null|Carbon
     */
    private $emailVerifiedAt;
    /**
     * @var null|Carbon
     */
    private $createdAt;
    /**
     * @var null|Carbon
     */
    private $updatedAt;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getUserType(): string
    {
        return $this->userType;
    }

    /**
     * @param string $userType
     * @return $this
     */
    public function setUserType(string $userType): self
    {
        $this->userType = $userType;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return $this
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return Carbon|null
     */
    public function getEmailVerifiedAt(): ?Carbon
    {
        return $this->emailVerifiedAt;
    }

    /**
     * @param Carbon|null $emailVerifiedAt
     * @return $this
     */
    public function setEmailVerifiedAt(?Carbon $emailVerifiedAt): self
    {
        $this->emailVerifiedAt = $emailVerifiedAt;
        return $this;
    }

    /**
     * @return Carbon|null
     */
    public function getCreatedAt(): ?Carbon
    {
        return $this->createdAt;
    }

    /**
     * @param Carbon|null $createdAt
     * @return $this
     */
    public function setCreatedAt(?Carbon $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return Carbon|null
     */
    public function getUpdatedAt(): ?Carbon
    {
        return $this->updatedAt;
    }

    /**
     * @param Carbon|null $updatedAt
     * @return $this
     */
    public function setUpdatedAt(?Carbon $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

}
