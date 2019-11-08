<?php

namespace App\Tables;

use App\Filters\UserQueryFilter;
use App\Http\Resources\Datatables\UsersDatatable;
use App\User;;
use Yajra\DataTables\Services\DataTable;
use DataTables;

class UsersTable extends DataTable
{

    public function ajax()
    {
        return Datatables::of($this->query())
                ->rawColumns(['role', 'actions'])->make(true);
    }

    public function html()
    {
        return $this->builder()->columns($this->columns());
    }

    public function query()
    {
        return UsersDatatable::collection(
            User::filter(new UserQueryFilter)->with(['role'])->get()
        );
    }

    public function columns()
    {
        return [
                ['data' => 'id', 'name'=> 'id', 'visible' => false, 'title' => 'id', 'searchable' => false, 'orderable' => true],
                ['data' => 'name', 'name'=> 'name',  'title' => 'name', 'searchable' => true, 'orderable' => true],
                ['data' => 'email', 'name'=> 'email',  'title' => 'email', 'searchable' => true, 'orderable' => true],
                ['data' => 'role', 'name'=> 'role',  'title' => 'role', 'searchable' => true, 'orderable' => true],
                ['data' => 'created_at', 'name'=> 'created_at',  'title' => 'created_at', 'searchable' => false, 'orderable' => true],
                ['data' => 'updated_at', 'name'=> 'updated_at',  'title' => 'updated_at', 'searchable' => false, 'orderable' => true],
                ['data' => 'actions', 'name'=> 'actions',  'title' => 'actions', 'searchable' => false, 'orderable' => false, 'exportable' => false,
                'printable' => false],
        ];
    }

}

