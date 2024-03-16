<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Movie;

use App\Domain\Movie\MovieRepository;
use App\Domain\Movie\Movie;
use App\Domain\Movie\MovieNotFoundException;

class InMemoryMovieRepository implements MovieRepository
{
    /**
     * @var Movie[]
     */
    private array $movies;

    /**
     * @param Movie[]|null $movies
     */
    public function __construct(array $movies = null)
    {
        $this->movies = $movies ?? [
            1 => new Movie(
                1,
                'The Titanic',
                ['DiCaprio', 'Kate Winslet'],
                '18-01-1998',
                'James Cameron',
                7.8, // IMDb rating
                8.2  // Rotten Tomato rating
            ),
            2 => new Movie(
                2,
                'The Titanic2',
                ['DiCaprio2', 'Kate Winslet2'],
                '18-01-1988',
                'James Camero2n',
                7.0, // IMDb rating
                8.3  // Rotten Tomato rating
            ),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return array_values($this->movies);
    }

    /**
     * {@inheritdoc}
     */
    public function findMovieOfId(int $id): Movie
    {
        if (!isset($this->movies[$id])) {
            throw new MovieNotFoundException();
        }

        return $this->movies[$id];
    }

    /**
     * @param $data
     * @return \App\Domain\Movie\Movie
     */
    public function create($data): Movie
    {
        // Generate a unique ID for the new movie
        $id = count($this->movies) + 1;

        // Create a new movie instance
        $movie = new Movie(
            $id,
            $data['name'],
            $data['casts'] ?? [],
            $data['release_date'],
            $data['director'],
            $data['ratings']['imdb'] ?? 0.0,
            $data['ratings']['rotten_tomato'] ?? 0.0
        );

        $this->movies[$id] = $movie;
        return $movie;
    }
}
