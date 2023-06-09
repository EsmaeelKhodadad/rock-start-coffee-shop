<?php

namespace App\DTO;

class OrderUpdateDTO extends BaseDTO
{
    /**
     * @var null|string
     */
    private $status;
    /**
     * @var null|int
     */
    private $userId;

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     * @return $this
     */
    public function setStatus(?string $status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getUserId(): ?int
    {
        return $this->userId;
    }

    /**
     * @param int|null $userId
     * @return $this
     */
    public function setUserId(?int $userId): self
    {
        $this->userId = $userId;
        return $this;
    }
}
