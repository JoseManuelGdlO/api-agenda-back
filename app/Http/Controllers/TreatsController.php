<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController as BaseController;

use App\Models\Treats;


class TreatsController extends BaseController
{


    public function getAll()
    {
        $treats = Treats::all();
  
        if (is_null($treats)) {
            return $this->sendError('not exist treats.');
        }
   
        return $this->sendResponse($treats, 'Product retrieved successfully.');
    }
}
