@php
    use Illuminate\Support\Facades\Request;
@endphp
<header class="masthead mb-auto">
    <div class="inner">
        <h3 class="masthead-brand">Random Lovecraft</h3>
        <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
            <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="/about">About</a>
            <a class="nav-link {{ Request::is('api/info') ? 'active' : '' }}" href="/api/info">API</a>
        </nav>

        <span class="clearfix"></span>
    </div>
</header>
