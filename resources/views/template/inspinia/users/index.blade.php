@extends('template::layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-3">
            @include('template::users.cards.filter')
        </div>
        <div class="col-lg-9">
            @include('template::users.cards.table')
        </div>
    </div>

{{--    @include('admin.users.modals.invite')--}}


@endsection



