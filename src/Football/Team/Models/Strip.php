<?php
declare(strict_types=1);

namespace App\Football\Team\Models;

use App\Football\Team\Models\Interfaces\Strip as StripInterface;

final class Strip implements StripInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function toString(): string
    {
        return $this->name;
    }
}
