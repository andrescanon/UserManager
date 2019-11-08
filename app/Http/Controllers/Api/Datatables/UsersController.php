<?php

namespace App\Http\Controllers\Api\Datatables;

use App\Http\Controllers\Controller;
use App\Tables\UsersTable;
use CloudCreativity\LaravelJsonApi\Http\Requests\FetchRelated;
use CloudCreativity\LaravelJsonApi\Http\Requests\FetchResources;
use CloudCreativity\LaravelJsonApi\Http\Requests\UpdateRelationship;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{

    public function index(UsersTable $datatable)
    {
        return $datatable->ajax();
    }


}