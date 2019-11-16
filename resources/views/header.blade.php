@php
    use Illuminate\Support\Facades\Request;
@endphp
<header class="masthead mb-auto">
    <div class="inner">
        <h3 class="masthead-brand">Random Lovecraft</h3>
        <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="#">Home</a>
            <a class="nav-link {{ Request::is('api/info') ? 'active' : '' }}" href="#">API</a>
            <a class="nav-link" href="#">About</a>
        </nav>
    </div>
</header>
