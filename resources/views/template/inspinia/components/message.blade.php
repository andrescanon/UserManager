
@if(session()->has('flash_notification'))
    <div class="row">
        <div class="col">

             @include('flash::message')

        </div>
    </div>
@endif

