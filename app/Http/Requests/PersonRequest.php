<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PersonRequest extends FormRequest{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(){
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(){

        $id = $this->input('id');

        return [
            'number' => [
                'required',
                Rule::unique('tenant.persons')->where(function ($query) use($id, $type) {
                    return $query->where('type', $type)
                                 ->where('id', '<>' ,$id);
                })
            ],
            'name' => [
                'required',
                Rule::unique('tenant.persons')->where(function ($query) use($id, $type) {
                    return $query->where('type', $type)
                                 ->where('id', '<>' ,$id);
                })
            ],
            'identity_document_type_id' => [
                'required',
            ],
            'country_id' => [
                'required',
            ],
            // 'person_type_id' => [
            //     'required_if:type,"customers"',
            // ],
            'department_id' => [
                'required_if:identity_document_type_id,"066"',
            ],
            'province_id' => [
                'required_if:identity_document_type_id,"066"',
            ],
            'district_id' => [
                'required_if:identity_document_type_id,"066"',
            ],
            'address' => [
                'required_if:identity_document_type_id,"066"',
            ],
            'email' => [
                'nullable',
                'email',
            ],
            'internal_code' => 'max:100'
        ];
    }
}
