<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use App\Http\Resources\CostCollection;
use App\Http\Resources\CostResource;
use App\Models\System\Binnacles_service;
use Exception;
use Illuminate\Http\Request;

class CostsController extends Controller{

    public function columns(){
        return [
            'name' => 'Nombre',
            'code' => 'Codigo',
        ];
    }
    public function index(){
        return view('config.costs');
    }

    public function records(Request $request){
        if ($request->value) {
            $records = Binnacles_service::where($request->column, 'like', "%{$request->value}%")
                                ->orderBy('code', 'desc');
        }else{
            $records = Binnacles_service::orderBy('code');
        }
        return new CostCollection($records->paginate(20));
    }

    public function record($id){
        $record = new CostResource(Binnacles_service::findOrFail($id));
        return $record;
    }

    public function store(Request $request){
        $id = $request->input('id');
        $category = Binnacles_service::firstOrNew(['id' => $id]);
        $category->fill($request->all());
        $category->save();
        return [
            'success' => true,
            'type' => 'Centro de costo',
            'message' => ($id)?'Centro de costo actualizado con éxito':'Centro de costo registrado con éxito'
        ];
    }

    public function destroy($id){
        try {
            $account = Binnacles_service::findOrFail($id);
            $account->delete();
            return [
                'success' => true,
                'type' => 'Centro de costo',
                'message' => 'Centro de costo eliminado con éxito'
            ];
        } catch (Exception $e) {
            return ($e->getCode() == '23000') ? ['success' => false,'message' => 'el Centro de costo esta siendo usado por otros registros, no puede eliminar'] : ['success' => false,'message' => 'Error inesperado, no se pudo eliminar el Centro de costo'];
        }
    }
}
