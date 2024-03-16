<?php

declare(strict_types=1);

namespace App\Domain\Movie;

use JsonSerializable;

class Movie implements JsonSerializable
{
    private ?int $id;
    private string $name;
    private array $casts;
    private string $release_date;
    private string $director;
    private float $imdbRating;
    private float $rottenTomatoRating;

    public function __construct(
        ?int $id,
        string $name,
        array $casts,
        string $release_date,
        string $director,
        float $imdbRating,
        float $rottenTomatoRating
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->casts = $casts;
        $this->release_date = $release_date;
        $this->director = $director;
        $this->imdbRating = $imdbRating;
        $this->rottenTomatoRating = $rottenTomatoRating;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCasts(): array
    {
        return $this->casts;
    }

    public function getReleaseDate(): string
    {
        return $this->release_date;
    }

    public function getDirector(): string
    {
        return $this->director;
    }

    public function getImdbRating(): float
    {
        return $this->imdbRating;
    }

    public function getRottenTomatoRating(): float
    {
        return $this->rottenTomatoRating;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'casts' => $this->casts,
            'release_date' => $this->release_date,
            'director' => $this->director,
            'ratings' => [
                'imdb' => $this->imdbRating,
                'rotten_tomato' => $this->rottenTomatoRating
            ]
        ];
    }
}
