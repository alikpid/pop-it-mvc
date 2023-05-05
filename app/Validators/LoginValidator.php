<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class LoginValidator extends AbstractValidator
{
    protected string $message = 'Поле :field должно содержать латиницу и/или цифры';

    public function rule(): bool
    {
        return preg_match("/^([a-zA-Z0-9]*)$/u", $this->value);
    }
}
