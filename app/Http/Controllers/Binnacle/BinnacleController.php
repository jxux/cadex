<?php

namespace App\Http\Controllers\Binnacle;

use App\CoreJxux\Requests\Inputs\Common\CategoryInput;
use App\CoreJxux\Requests\Inputs\Common\PersonInput;
use App\CoreJxux\Requests\Inputs\Common\ServiceInput;
use App\CoreJxux\Requests\Inputs\Common\Timeinput;
use App\CoreJxux\Requests\Inputs\Common\UserInput;
use App\Http\Controllers\Controller;
use App\Http\Requests\BinnacleRequest;
use App\Http\Resources\BinnacleCollection;
use App\Http\Resources\BinnacleResource;
use App\Models\System\Binnacle;
use App\Models\System\Binnacles_category;
use App\Models\System\Binnacles_service;
use App\Models\System\Person;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class BinnacleController extends Controller{

    public function columns(){
        return [
            'description' => 'Descripción',
            'client_id' => 'Cliente',
            'category_id' => 'Cuentas',
            'service_id' => 'Centro de costos',
        ];
    }

    public function index(){
        return view('binnacles.index');
    }

    public function records(Request $request){
        if ($request->value) {
            $records = Binnacle::where('user_id', auth()->id())
                                ->Where($request->column, 'like', "%{$request->value}%")
                                ->orderBy('date','desc')
                                ->orderBy('end_time','desc');
        }else{
            $records = Binnacle::where('user_id', auth()->id())
                                ->orderBy('date','desc')
                                ->orderBy('end_time','desc');
        }

        return new BinnacleCollection($records->paginate(20));
    }

    public function tables(){
        $clients = $this->table('clients');
        $accounts = $this->table('accounts');
        $costs = $this->table('costs');
        return compact('clients', 'accounts', 'costs');
    }

    public function table($table){
        switch ($table) {
            case 'clients':
                $clients = Person::orderBy('internal_code', 'desc')->get()->transform(function($row) {
                    return [
                        'id' => $row->id,
                        'internal_code' => $row->internal_code,
                        'description' =>$row->internal_code.' - '.$row->number.' - '.$row->name,
                        'name' => $row->name,
                        'number' => $row->number,
                    ];
                });
                return $clients;
                break;

            case 'accounts':
                $categorys = Binnacles_category::get()->transform(function($row){
                    return [
                        'id' => $row->id,
                        'code' => $row->code,
                        'name' => $row->name,
                        'description' =>$row->code.' - '.$row->name,
                    ];
                });
               return $categorys;
                break;

            case 'costs':
                $services = Binnacles_service::get()->transform(function($row){
                    return [
                        'id' => $row->id,
                        'code' => $row->code,
                        'category' => $row->category_id,
                        // 'name' => $row->name,
                        'description' =>$row->code.' - '.$row->name,
                    ];
                });
                return $services;
                break;

            default:

                return [];
                break;
        }
    }

    public function store(BinnacleRequest $request){
        self::convert($request);
        $id = $request->input('id');
        $event = Binnacle::firstOrNew(['id' => $id]);
        $event->fill($request->all());
        $event->save();

        return [
            'success' => true,
            'type' => 'Parte Diario',
            'message' => ($id)?'Evento editado con éxito':'Evento registrado con éxito',
            // 'id' => $event->id
        ];
    }

    public static function time($start_time, $end_time){
        $time = Carbon::parse($start_time)->diffInMinutes($end_time);
        $hour = intdiv($time, 60).':'. ($time % 60);
        return $hour;
    }

    public static function convert($inputs){
        $user_id = auth()->id();
        $values = [
            'user_id' => auth()->id(),
            'client' => PersonInput::set($inputs['client_id']),
            'category' => CategoryInput::set($inputs['category_id']),
            'service' => ServiceInput::set($inputs['service_id']),
            'user' => UserInput::set($user_id),
            'hour' => self::time($inputs['start_time'], $inputs['end_time']),
        ];

        $inputs->merge($values);
        return $inputs->all();
    }

    public function record($id){
        $record = new BinnacleResource(Binnacle::findOrFail($id));
        return $record;
    }

    public function destroy($id){
        try {
            $event = Binnacle::findOrFail($id);
            $event->delete();

            return [
                'success' => true,
                'type' => 'Parte Diario',
                'message' => 'Evento eliminado con éxito'
            ];
        } catch (Exception $e){
            return ($e->getCode() == '23000') ? ['success' => false,'message' => 'El evento esta siendo usado por otros registros, no puede eliminar'] : ['success' => false,'message' => 'Error inesperado, no se pudo eliminar el evento'];
        }
    }
}
