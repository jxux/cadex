<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use App\Http\Resources\AccountResource;
use App\Http\Resources\AccountCollection;
use App\Models\System\Binnacles_category;
use Exception;
use Illuminate\Http\Request;

class AccountsController extends Controller{
    
    public function columns(){
        return [
            'name' => 'Nombre',
            'code' => 'Codigo',
        ];
    }

    public function index(){
        return view('config.accounts');
    }

    public function records(Request $request){
        if ($request->value) {
            $records = Binnacles_category::where($request->column, 'like', "%{$request->value}%")
                                ->orderBy('code', 'desc');
        }else{
            $records = Binnacles_category::orderBy('code');
        }
        return new AccountCollection($records->paginate(20));
    }

    public function record($id){
        $record = new AccountResource(Binnacles_category::findOrFail($id));
        return $record;
    }

    public function store(Request $request){
        $id = $request->input('id');
        $category = Binnacles_category::firstOrNew(['id' => $id]);
        $category->fill($request->all());
        $category->save();
        return [
            'success' => true,
            'type' => 'Cuenta',
            'message' => ($id)?'Cuenta actualizada con éxito':'Cuenta registrada con éxito'
        ];
    }

    public function destroy($id){
        try {
            $account = Binnacles_category::findOrFail($id);
            $account->delete();
            return [
                'success' => true,
                'type' => 'Cuenta',
                'message' => 'Cuenta eliminada con éxito'
            ];
        } catch (Exception $e) {
            return ($e->getCode() == '23000') ? ['success' => false,'message' => 'La Cuenta esta siendo usado por otros registros, no puede eliminar'] : ['success' => false,'message' => 'Error inesperado, no se pudo eliminar la cuenta'];
        }
    }
}