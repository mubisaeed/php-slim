<?php

declare(strict_types=1);

namespace App\Application\Actions\Movie;

use Psr\Http\Message\ResponseInterface as Response;

class ViewMovieAction extends MovieAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $movieId = (int) $this->resolveArg('id');
        $movie = $this->movieRepository->findMovieOfId($movieId);

        $this->logger->info("Movie of id `${movieId}` was viewed.");

        return $this->respondWithData($movie);
    }
}
