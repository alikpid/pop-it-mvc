<?php

namespace Validators;

use Src\Validator\AbstractValidator;

class ImageValidator extends AbstractValidator
{
    protected string $message = 'Неверный формат изображения поля :field или изображение отсутствует';

    public function rule(): bool
    {
        // Check if the value is a valid file upload
        if (!is_uploaded_file($this->value['tmp_name'])) {
            return false;
        }

        // Check if the file is a valid image
        $image_info = getimagesize($this->value['tmp_name']);
        return $image_info !== false;
    }
}
