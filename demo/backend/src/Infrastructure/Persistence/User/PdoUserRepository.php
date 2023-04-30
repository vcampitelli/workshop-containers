<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\User;

use App\Domain\ModelInterface;
use App\Domain\User\User;
use App\Domain\User\UserRepository;
use App\Infrastructure\Persistence\Pdo\AbstractPdoRepository;
use stdClass;

class PdoUserRepository extends AbstractPdoRepository implements UserRepository
{
    protected function buildModelFromPdoObject(stdClass $row): ModelInterface
    {
        return new User(
            $row->id,
            $row->name,
        );
    }
}
