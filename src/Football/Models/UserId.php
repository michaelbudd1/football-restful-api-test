<?php
declare(strict_types=1);

namespace App\Football\Models;

use App\Football\Interfaces\UserId as UserIdInterface;

final class UserId implements UserIdInterface
{
    /**
     * @var int
     */
    private $userId;

    /**
     * @param int $userId
     */
    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }

    /**
     * {@inheritdoc}
     */
    public function toInt(): int
    {
        return $this->userId;
    }
}
