<header class="s-header">

    <div class="header-logo">
        <a class="site-logo" href="{{ url('/') }}">
            <img src="{{asset('assets/user/images/logo.svg')}}" alt="Homepage">
        </a>
    </div>

    <nav class="header-nav-wrap">
        <ul class="header-main-nav">
            <li class="{{ request()->is('/') ? 'current' : '' }}"><a
                    class="{{ request()->is('/') ? 'smoothscroll' : '' }}" href="{{ url('/') }}#intro"
                    title="intro">Intro</a></li>
            <li><a class="{{ request()->is('/') ? 'smoothscroll' : '' }}" href="{{ url('/') }}#about"
                    title="about">About</a></li>
            <li><a class="{{ request()->is('/') ? 'smoothscroll' : '' }}" href="{{ url('/') }}#services"
                    title="services">Services</a></li>
            <li><a class="{{ request()->is('/') ? 'smoothscroll' : '' }}" href="{{ url('/') }}#works"
                    title="works">Works</a></li>
            <li class="{{ request()->is('contact') ? 'current' : '' }}"><a href="{{ route('user.contact') }}"
                    title="contact us">Contact</a></li>
        </ul>

        <ul class="header-social">
            <li><a href="#0"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
            <li><a href="#0"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="#0"><i class="fab fa-dribbble" aria-hidden="true"></i></a></li>
            <li><a href="#0"><i class="fab fa-behance" aria-hidden="true"></i></a></li>
        </ul>
    </nav>

    <a class="header-menu-toggle" href="#"><span>Menu</span></a>

</header>