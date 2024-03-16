<?php

declare(strict_types=1);

use App\Domain\Movie\MovieRepository;
use App\Domain\User\UserRepository;
use App\Infrastructure\Persistence\Movie\InMemoryMovieRepository;
use App\Infrastructure\Persistence\User\InMemoryUserRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Here we map our UserRepository and MovieRepository interface to its in memory implementation
    $containerBuilder->addDefinitions([
        UserRepository::class => \DI\autowire(InMemoryUserRepository::class),
        MovieRepository::class => \DI\autowire(InMemoryMovieRepository::class),
    ]);
};
