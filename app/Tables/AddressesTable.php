<?php

namespace App\Tables;

use App\Address;
use App\Http\Resources\Datatables\AddressesDatatable;
use Illuminate\Support\Collection;
use Yajra\DataTables\Services\DataTable;
use DataTables;

class AddressesTable extends DataTable
{

    protected $data;

    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    public function ajax()
    {
        return Datatables::of($this->query())->make(true);
    }

    public function html()
    {
        return $this->builder()->columns($this->columns());
    }

    public function query()
    {
        return AddressesDatatable::collection($this->data);
    }

    public function columns()
    {
        return [
            ['data' => 'id', 'name'=> 'id', 'visible' => false, 'title' => 'id', 'searchable' => false, 'orderable' => true],
            ['data' => 'first_name', 'name'=> 'first_name', 'visible' => true, 'title' => 'first_name', 'searchable' => true, 'orderable' => false],
            ['data' => 'last_name', 'name'=> 'last_name', 'visible' => true, 'title' => 'last_name', 'searchable' => true, 'orderable' => false],
            ['data' => 'company', 'name'=> 'company', 'visible' => true, 'title' => 'company', 'searchable' => true, 'orderable' => true],
            ['data' => 'country_code', 'name'=> 'country_code', 'visible' => true, 'title' => 'country_code', 'searchable' => true, 'orderable' => false],
            ['data' => 'city', 'name'=> 'city', 'visible' => true, 'title' => 'city', 'searchable' => true, 'orderable' => false],
            ['data' => 'postcode', 'name'=> 'postcode', 'visible' => true, 'title' => 'postcode', 'searchable' => true, 'orderable' => false],
            ['data' => 'label', 'name'=> 'label', 'visible' => false, 'title' => 'label', 'searchable' => true, 'orderable' => true],
            ['data' => 'is_primary', 'name'=> 'is_primary', 'visible' => false, 'title' => 'is_primary', 'searchable' => false, 'orderable' => true],
            ['data' => 'is_billing', 'name'=> 'is_billing', 'visible' => false, 'title' => 'is_billing', 'searchable' => false, 'orderable' => true],
            ['data' => 'is_shipping', 'name'=> 'is_shipping', 'visible' => false, 'title' => 'is_shipping', 'searchable' => false, 'orderable' => true],
            ['data' => 'updated_at', 'name'=> 'updated_at', 'visible' => false,  'title' => 'updated_at', 'searchable' => false, 'orderable' => true],
            ['data' => 'created_at', 'name'=> 'created_at', 'visible' => false, 'title' => 'created_at', 'searchable' => false, 'orderable' => true],
        ];
    }

}

