
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-2">
    <a class="navbar-brand" href="#">Admin Panel</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link @if(request()->routeIs('admin.dashboard')) active @endif"
                   href="{{route('admin.dashboard')}}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('user.index')}}">Website</a>
            </li>
            <li class="nav-item">
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    @method('POST')
                    <button class="btn btn-danger">Logout</button>
                </form>
            </li>
        </ul>
    </div>
</nav>
