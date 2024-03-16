<?php

declare(strict_types=1);

namespace App\Domain\Movie;

use App\Domain\Movie\Movie;
use App\Domain\Movie\MovieNotFoundException;

interface MovieRepository
{
    /**
     * @return Movie[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return Movie
     * @throws MovieNotFoundException
     */
    public function findMovieOfId(int $id): Movie;

    /**
     * @param $data
     * @return Movie
     */
    public function create($data): Movie;
}
