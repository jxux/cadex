<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\System\Catalogs\Country;
use App\Models\System\Catalogs\Department;
use App\Models\System\Catalogs\District;
use App\Models\System\Catalogs\IdentityDocumentType;
use App\Models\System\Catalogs\Province;
use App\Models\System\Configuration;
use App\Models\System\PersonType;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller{

    public function __construct(){
        // $this->middleware('can:admin.users.index')->only('index');
        $this->middleware('can:admin.users.edit')->only('edit', 'update');
    }

    public function columns(){
        return [
            'name' => 'Nombre',
            'number' => 'Número',
            'document_type' => 'Tipo de documento'
        ];
    }

    public function index(){
        return view('config.users');
    }

    public function records(Request $request){
        if ($request->value) {
            $records = User::where($request->column, 'like', "%{$request->value}%")
                            ->orderBy('id');
        }else{
            $records = User::orderBy('id');
        }
        return new UserCollection($records->paginate(20));
    }

    public function edit(User $user){
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user){
        $user->roles()->sync($request->roles);
    }

    public function tables(){
        $countries = Country::whereActive()->orderByDescription()->get();
        $departments = Department::whereActive()->orderByDescription()->get();
        $provinces = Province::whereActive()->orderByDescription()->get();
        $districts = District::whereActive()->orderByDescription()->get();
        $identity_document_types = IdentityDocumentType::whereActive()->get();
        $person_types = PersonType::get();
        $configuration = Configuration::first();
        $api_service_token = $configuration->token_apiruc == 'false' ? config('configuration.api_service_token') : $configuration->token_apiruc;
        $roles = Role::get();

        return compact('countries', 'departments', 'provinces', 'districts', 'identity_document_types', 'person_types','api_service_token', 'roles');
    }

    public function record($id){
        $record = new UserResource(User::findOrFail($id));
        return $record;
        // $roles = Role::all();
        // return compact('record','roles');
    }

    public function store(Request $request, User $user){

        $id = $request->input('id');
        $person = User::firstOrNew(['id' => $id]);
        $person->fill($request->all());
        $person->save();

        $user->roles()->sync($request->roles);

        return [
            'success' => true,
            'type' => 'Usuario',
            'message' => ($id)?'Usuario editado con éxito':'Usuario registrado con éxito',
            // 'id' => $person->id
        ];
    }
}
