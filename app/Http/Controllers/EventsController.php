<?php

namespace App\Http\Controllers;
 
use App\Http\Controllers\BaseController as BaseController;
use App\Models\Events;

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

        $events = Events::find($date);

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


}
