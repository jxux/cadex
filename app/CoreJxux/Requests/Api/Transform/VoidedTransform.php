<?php

namespace App\CoreJxux\Requests\Api\Transform;

use App\CoreJxux\Requests\Api\Transform\Common\DocumentVoidedTransform;

class VoidedTransform
{
    public static function transform($inputs)
    {
        return [
            'date_of_reference' => $inputs['fecha_de_emision_de_documentos'],
            'documents' => DocumentVoidedTransform::transform($inputs),
        ];
    }
}