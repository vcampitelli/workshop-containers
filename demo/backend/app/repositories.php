<?php

declare(strict_types=1);

use App\Domain\User\UserRepository;
use App\Infrastructure\Persistence\Pdo\PdoWrapper;
use App\Infrastructure\Persistence\User\PdoUserRepository;
use DI\ContainerBuilder;
use Psr\Container\ContainerInterface;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our UserRepository interface to its in memory implementation
    $containerBuilder->addDefinitions([
        UserRepository::class => function (ContainerInterface $container) {
            return new PdoUserRepository(
                $container->get(PdoWrapper::class),
                'users',
            );
        },
    ]);
};
