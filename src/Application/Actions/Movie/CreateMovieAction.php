<?php

declare(strict_types=1);

namespace App\Application\Actions\Movie;

use App\Domain\Movie\Movie;
use Exception;
use Psr\Http\Message\ResponseInterface as Response;

class CreateMovieAction extends MovieAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $data = $this->getFormData();

        // Validate the incoming data
        $validationErrors = $this->validateData($data);
        if (!empty($validationErrors)) {
            return $this->respondWithData(['errors' => $validationErrors], 400);
        }

        // Create the movie
        try {
            $movie = $this->createMovie($data);
            return $this->respondWithData($movie, 201);
        } catch (Exception $e) {
            return $this->respondWithData(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Validate the incoming data.
     *
     * @param array $data
     * @return array
     */
    private function validateData(array $data): array
    {
        $errors = [];

        if (empty($data['name'])) {
            $errors['name'] = 'Name is required';
        }
        if (empty($data['release_date'])) {
            $errors['release_date'] = 'Release date is required';
        }
        if (empty($data['director'])) {
            $errors['director'] = 'Director is required';
        }

        return $errors;
    }

    /**
     * Create a movie using the provided data.
     *
     * @param array $data
     * @return Movie
     */
    private function createMovie(array $data): Movie
    {
        return $this->movieRepository->create($data);
    }
}
