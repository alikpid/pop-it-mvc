<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class DateValidator extends AbstractValidator
{
    protected string $message = 'Field :field must be a valid date in the format yyyy-mm-dd';

    public function rule(): bool
    {
        // Check if the value is in the format yyyy-mm-dd
        if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $this->value)) {
            return false;
        }

        // Check if the date is valid
        $date = \DateTime::createFromFormat('Y-m-d', $this->value);
        return $date && $date->format('Y-m-d') === $this->value;
    }
}


