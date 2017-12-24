<?php

namespace MisaSdk\Common\Controller;

use MisaSdk\Common\Exception\BadRequest;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class Controller
{
    /**
     * @return array
     */
    public function getParsedBody()
    {
        if ('application/json' != $this->getRequest()->headers->get('Content-Type')) {
            throw new BadRequestHttpException('El tipo de entrada de datos debe ser en formato json');
        }

        return $this->getRequest()->request->all();
    }

    public function getRequest()
    {
        return $this->get('request_stack')->getCurrentRequest();
    }

    protected function validateEmptyValue($value, $label = '')
    {
        if (empty($value)) {
            throw new BadRequest("el campo {$label} no puede estar vacío");
        }
        return true;
    }

    protected function validateNotEmptyOnceValue(array $list)
    {
        $numNotEmpty = 0;

        foreach ($list as $value) {
            if (! empty($value)) {
                $numNotEmpty++;
            }
        }

        if ($numNotEmpty === 0) {
            throw new BadRequest("enviar al menos un campo no vacio");
        }

        return true;
    }
}
