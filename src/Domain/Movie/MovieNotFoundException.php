<?php

declare(strict_types=1);

namespace App\Domain\Movie;

use App\Domain\DomainException\DomainRecordNotFoundException;

class MovieNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'The movie you requested does not exist.';
}
