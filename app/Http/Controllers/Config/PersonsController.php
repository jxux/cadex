<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use App\Http\Requests\PersonRequest;
use App\Http\Resources\PersonCollection;
use App\Http\Resources\PersonResource;
use App\Models\System\Catalogs\Country;
use App\Models\System\Catalogs\Department;
use App\Models\System\Catalogs\District;
use App\Models\System\Catalogs\IdentityDocumentType;
use App\Models\System\Catalogs\Province;
use App\Models\System\Configuration;
use App\Models\System\Person;
use App\Models\System\PersonType;
use Exception;
use Illuminate\Http\Request;

class PersonsController extends Controller{

    public function columns(){
        return [
            'name' => 'Nombre',
            'number' => 'Número',
            'document_type' => 'Tipo de documento'
        ];
    }

    public function index(){
        return view('config.persons');
    }

    public function records(Request $request){
        if ($request->value) {
            $records = Person::where($request->column, 'like', "%{$request->value}%")
                            ->orderBy('internal_code');
        }else{
            $records = Person::orderBy('internal_code');
        }
        return new PersonCollection($records->paginate(20));
    }

    public function tables(){
        $countries = Country::whereActive()->orderByDescription()->get();
        $departments = Department::whereActive()->orderByDescription()->get();
        $provinces = Province::whereActive()->orderByDescription()->get();
        $districts = District::whereActive()->orderByDescription()->get();
        $identity_document_types = IdentityDocumentType::whereActive()->get();
        $person_types = PersonType::get();
        $locations = $this->getLocationCascade();
        $configuration = Configuration::first();
        $api_service_token = $configuration->token_apiruc == 'false' ? config('configuration.api_service_token') : $configuration->token_apiruc;

        return compact('countries', 'departments', 'provinces', 'districts', 'identity_document_types', 'locations','person_types','api_service_token');
    }

    public function record($id){
        $record = new PersonResource(Person::findOrFail($id));
        return $record;
    }

    public function store(Request $request){
        // if($request->state){
        //     if($request->state != "ACTIVO"){
        //         return [
        //             'success' => false,
        //             'message' =>'El estado del contribuyente no es activo, no puede registrarlo',
        //         ];
        //     }
        // }

        $id = $request->input('id');
        $person = Person::firstOrNew(['id' => $id]);
        $person->fill($request->all());
        $person->save();

        // $person->addresses()->delete();
        // $addresses = $request->input('addresses');
        // foreach ($addresses as $row){
        //     $person->addresses()->updateOrCreate( ['id' => $row['id']], $row);
        // }

        return [
            'success' => true,
            'type' => 'Cliente',
            'message' => ($id)?'Cliente editado con éxito':'Cliente registrado con éxito',
            // 'id' => $person->id
        ];
    }

    public function destroy($id){
        try {
            $person = Person::findOrFail($id);
            $person->delete();

            return [
                'success' => true,
                'type' => 'Cliente',
                'message' => 'Eliminado con éxito'
            ];

        } catch (Exception $e) {
            return ($e->getCode() == '23000') ? ['success' => false,'message' => "El esta siendo usado por otros registros, no puede eliminar"] : ['success' => false, 'message' => "Error inesperado, no se pudo eliminar el cliente"];

        }
    }

    public function getLocationCascade(){
        $locations = [];
        $departments = Department::where('active', true)->get();
        foreach ($departments as $department){
            $children_provinces = [];
            foreach ($department->provinces as $province){
                $children_districts = [];
                foreach ($province->districts as $district){
                    $children_districts[] = [
                        'value' => $district->id,
                        'label' => $district->description
                    ];
                }
                $children_provinces[] = [
                    'value' => $province->id,
                    'label' => $province->description,
                    'children' => $children_districts
                ];
            }
            $locations[] = [
                'value' => $department->id,
                'label' => $department->description,
                'children' => $children_provinces
            ];
        }
        return $locations;
    }

    public function enabled($type, $id){
        $person = Person::findOrFail($id);
        $person->enabled = $type;
        $person->save();
        $type_message = ($type) ? 'habilitado':'inhabilitado';
        return [
            'success' => true,
            'message' => "Cliente {$type_message} con éxito"
        ];
    }
}
