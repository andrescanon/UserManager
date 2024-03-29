<div class="navbar-wrapper">
    <nav class="navbar navbar-default navbar-fixed-top navbar-expand-md" role="navigation">
        <div class="container">

            @guest

                <a class="navbar-brand" href="{{ route('login') }}">{{ __('Login') }}</a>

            @else
                <a class="navbar-brand" href="{{ route('admin.users.index') }}">{{ __('Administration') }}</a>

            @endguest

            <div class="navbar-header page-scroll">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="nav-link page-scroll" href="#page-top">Home</a></li>
                    <li><a class="nav-link page-scroll" href="#features">Features</a></li>
                    <li><a class="nav-link page-scroll" href="#team">Team</a></li>
                    <li><a class="nav-link page-scroll" href="#testimonials">Testimonials</a></li>
                    <li><a class="nav-link page-scroll" href="#pricing">Pricing</a></li>
                    <li><a class="nav-link page-scroll" href="#contact">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>