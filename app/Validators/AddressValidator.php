<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class AddressValidator extends AbstractValidator
{
    protected string $message = 'Поле :field должно содержать кириллицу';

    public function rule(): bool
    {
        return preg_match("/^(?=.*[а-яА-ЯёЁ])[а-яА-ЯёЁ0-9]*$/u", $this->value);
    }
}