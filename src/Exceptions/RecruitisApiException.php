<?php

namespace Davebrend\RecruitisApiProject\Exceptions;

class RecruitisApiException extends \Exception
{
    public function __construct(?string $errorMessage = null, ?int $code = null)
    {
        parent::__construct($errorMessage ?? 'Server error occurred', $code ?? 500);
    }
}