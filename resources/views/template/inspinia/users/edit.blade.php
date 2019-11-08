@extends('template::layouts.admin')

@section('content')

    <div class="row">
        <div class="col-4">
            @component('template::components.card', ['title' => __('users.cards.filter.title')])

                @include('template::users.forms.edit')

            @endcomponent
        </div>

        <div class="col-8">
            <div class="col">
                @include('template::addresses.cards.table', ['entity' => $user])
            </div>
        </div>

    </div>

@endsection


