<?php

declare(strict_types=1);

namespace App\Application\Actions\Movie;

use App\Application\Actions\Action;
use App\Domain\Movie\MovieRepository;
use Psr\Log\LoggerInterface;

abstract class MovieAction extends Action
{
    protected MovieRepository $movieRepository;

    public function __construct(LoggerInterface $logger, MovieRepository $movieRepository)
    {
        parent::__construct($logger);
        $this->movieRepository = $movieRepository;
    }
}
