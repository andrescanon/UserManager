<?php

namespace App\Http\Controllers\Api\Datatables;

use App\Http\Controllers\Controller;
use App\Tables\AddressesTable;
use App\User;

class AddressesController extends Controller
{

    public function index(User $entity, AddressesTable $datatable)
    {
        return $datatable->setData($entity->addresses()->get())->ajax();
    }

    //datatables controller with table manager

}