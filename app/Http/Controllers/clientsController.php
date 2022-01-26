<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController as BaseController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Client;
use App\Models\History;

class clientsController extends BaseController
{
     /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function registerCient(Request $request)
    {
        $content = $request;

        $response = $content;

        
        $validator = Validator::make($response->all(), [
            'address' => 'required',
            'age' => 'required',
            'email' => 'required',
            'id_doctor' => 'required',
            'last_name' => 'required',
            'second_last_name' => 'required',
            'name' => 'required',
            'patient' => 'required',
            'phonenumber' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $input = $response->all();
        $user = Client::create($input);
        $success['id'] =  $user->id;
        $success['name'] =  $user->name;
   
        return $this->sendResponse($success, 'Client register successfully.');
    }

    public function registerEvent(Request $request)
    {
        $content = $request;

        $response = $content;

        echo $response -> description;
        
        $validator = Validator::make($response->all(), [
            'date' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }

        if(!is_null($response->hisotry)) {
            $input = $response->hisotry;
            $hisotry = History::create($input);
            $response->event->history_id = $hisotry->id;
        }

        $input = $response->event;
        $event = Client::create($input);
        $success['id'] =  $event->id;
        $success['name'] =  $event->date;
   
        return $this->sendResponse($success, 'Event register successfully.');
    }

}
