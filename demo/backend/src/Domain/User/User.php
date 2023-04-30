<?php

declare(strict_types=1);

namespace App\Domain\User;

use App\Domain\ModelInterface;

readonly class User implements ModelInterface
{
    public function __construct(private ?int $id, private string $name)
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
