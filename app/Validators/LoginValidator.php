<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class LoginValidator extends AbstractValidator
{
    protected string $message = 'Поле :field должно содержать латиницу';

    public function rule(): bool
    {
        return preg_match("/^([a-zA-Z]+)$/u", $this->value);
    }
}
