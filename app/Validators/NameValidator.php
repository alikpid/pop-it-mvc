<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class NameValidator extends AbstractValidator
{
    protected string $message = 'Поле :field должно содержать кириллицу';

    public function rule(): bool
    {
        return preg_match("/^([а-яА-ЯЁё]+)$/u", $this->value);
    }
}