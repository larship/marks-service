<?php

namespace App\Controller;

use Symfony\Component\Validator\Validator\ValidatorInterface;
use Exception;

trait ValidatableControllerTrait
{
    protected ValidatorInterface $validator;

    public function validate(object $request): void
    {
        $errors = $this->validator->validate($request);
        if ($errors->count() > 0) {
            $errorMessage = '';
            foreach ($errors as $violation) {
                $errorMessage .= "{$violation->getPropertyPath()}: {$violation->getMessage()}" . PHP_EOL;
            }

            throw new Exception($errorMessage);
        }
    }
}
