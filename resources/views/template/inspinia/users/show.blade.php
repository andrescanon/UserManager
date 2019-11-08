@extends('template::layouts.admin')

@section('content')

    <div class="row">

        <div class="col-4">
            @include('template::users.cards.profile')
        </div>

        <div class="col-8">
            <div class="col">
                @include('template::addresses.cards.table', ['entity' => $user])
            </div>
        </div>

    </div>

@endsection




