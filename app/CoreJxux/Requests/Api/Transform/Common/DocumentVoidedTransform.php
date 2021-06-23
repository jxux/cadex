<?php

namespace App\CoreJxux\Requests\Api\Transform\Common;

use App\CoreJxux\Requests\Api\Transform\Functions;

class DocumentVoidedTransform
{
    public static function transform($inputs)
    {
        if(key_exists('documentos', $inputs)) {
            $documents = [];
            foreach ($inputs['documentos'] as $row)
            {
                $documents[] = [
                    'external_id' => Functions::valueKeyInArray($row, 'external_id'),
                    'description' => Functions::valueKeyInArray($row, 'motivo_anulacion'),
                ];
            }
            return $documents;
        }
        return [];
    }
}