<?php

namespace App\Controller;

use Symfony\Component\Validator\Validator\ValidatorInterface;
use Exception;

/**
 * Базовый контроллер для валидации запросов
 *
 * @author Anton Kovalenko <CaribbeanLegend@mail.ru>
 */
class ValidatableController
{
    /**
     * @var ValidatorInterface $validator
     */
    protected $validator;

    /**
     * Метод выполняет валидацию аргументов запроса и бросает исключение в случае ошибки
     *
     * @param object $request Объект запроса
     *
     * @throws Exception
     */
    public function validate(object $request)
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
