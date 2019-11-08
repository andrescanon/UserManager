@component('template::components.card', ['title' => __('users.cards.profile.title')])


    <div class="contact-box center-version">

        <a href="#">

            <img alt="image" class="rounded-circle" src="{{ asset('img/a2.jpg') }}">


            <h3 class="m-b-xs"><strong>{{ $user->profile->name }}</strong></h3>

            <div class="font-bold">{{ $user->profile->position }}</div>
            <address class="m-t-md">
                <strong>{{ $user->profile->company }}</strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                <abbr title="Phone">P:</abbr> {{ $user->profile->phone }}
            </address>

        </a>
        <div class="contact-box-footer">
            <div class="m-t-xs btn-group">
                <a href="" class="btn btn-xs btn-white"><i class="fa fa-phone"></i> Call </a>
                <a href="" class="btn btn-xs btn-white"><i class="fa fa-envelope"></i> Email</a>
                <a href="" class="btn btn-xs btn-white"><i class="fa fa-user-plus"></i> Follow</a>
            </div>
        </div>

    </div>



    <div>
        <p class="text-center">
            <cite title="" data-original-title="">
                <h2><strong>{{ $user->name }}</strong> {!! $user->present()->role  !!} </h2>
            </cite>
        </p>
    </div>

{{--    @include('template::users.fields.avatar')--}}

    <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat.
    </p>
    <div class="user-button">
        <div class="row">
            <div class="col-md-6">
                @include('template::users.buttons.back')
            </div>
            <div class="col-md-6">
                @component('template::users.buttons.edit', ['class' => 'btn btn-primary btn-rounded btn-block', 'user' => $user])
                        {{ __('users.buttons.edit') }}
                @endcomponent
            </div>
        </div>
    </div>

@endcomponent
