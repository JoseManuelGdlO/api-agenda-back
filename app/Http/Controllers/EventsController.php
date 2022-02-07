<?php

namespace App\Http\Controllers;
 
use App\Http\Controllers\BaseController as BaseController;
use App\Models\Events;
use App\Models\Client;
use App\Models\history;
use App\Models\Treats;
use Illuminate\Http\Request;

class EventsController extends BaseController
{
    public function getAllEvents(){

        $events = Events::all();

        $succes = [];
        foreach ($events as $key => $value) {
            $fechaIncio= $key->date;
            list($ano, $mes, $dia) = explode("-", $fechaIncio);
            $result["ano"]=$ano;
            $result["mes"]=$mes;
            $result["dia"]=$dia;

            $succes['evento'][]=$result;
        }
       
        return $this->sendResponse($succes, 'getEvents successfully');

    }

    public function getDayEvents($date){

        $events = Events::where('date', '=', $date);

        $succes = [];
        foreach ($events as $key => $value) {
            $fechaIncio = $key->date;
            $id_client = $key->client_id;
            $history_id = $key->history_id;

            $result["client"] = Client::where('id', '=', $id_client);
            $history = history::where('id', '=', $history_id);
            $result["treats"] = Treats::where('id', '=', $history->id_description);

            list($ano, $mes, $dia) = explode("-", $fechaIncio);
            $result["ano"]=$ano;
            $result["mes"]=$mes;
            $result["dia"]=$dia;

            $succes['evento'][]=$result;
        }
       
        return $this->sendResponse($succes, 'getEvents successfully');

    }

    


}
