<div class="py-3 bg-dark border-bottom">
    <div class="container d-flex">
        <ul class="nav me-auto">
            <a href="{{ route('home') }}" class="nav-link px-2 active text-white">Home</a>
            @auth()
                @if (Auth::user()->status === 'active')
                    <a href="{{ route('pets') }}" class="nav-link px-2 text-white">Pets</a>
                    <a href="{{ route('publication.create') }}" class="nav-link px-2 text-white">Create</a>
                @endif
                @if (Auth::user()->role === 'admin')
                    <a href="{{ route('requests') }}" class="nav-link px-2 text-white">Requests</a>
                    <a href="{{ route('users') }}" class="nav-link px-2 text-white">Users</a>
                    <a href="{{ route('publications') }}" class="nav-link px-2 text-white">Publications</a>
                @endif
            @endauth
        </ul>
        <ul class="nav me-2">
            @guest()
                <a href="{{ route('signin') }}" class="nav-link px-2 text-white me-2">Sign in</a>
                <a href="{{ route('signup') }}" class="nav-link px-2 text-white me-2">Sign up</a>
            @endguest
            @auth()
                <a href="{{ route('profile') }}" class="nav-link px-2 text-white me-2">Profile</a>
                <a href="{{ route('signout') }}" class="nav-link px-2 text-white me-2">Sign out</a>
            @endauth
        </ul>
    </div>
</div>

