
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-2">
    <a class="navbar-brand" href="#">Prototype</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item @if(request()->routeIs('user.index')) active @endif">
                <a class="nav-link" href="{{route('user.index')}}">Home <span class="sr-only"></span></a>
            </li>
            <li class="nav-item @if(request()->routeIs('user.dashboard')) active @endif">
                <a class="nav-link" href="{{route('user.dashboard')}}">Dashboard</a>
            </li>
            <li class="nav-item @if(request()->routeIs('user.dashboard_status')) active @endif">
                <a class="nav-link" href="{{route('user.dashboard_status')}}">Status</a>
            </li>

            <li class="nav-item @if(request()->routeIs('user.kyc_dashboard')) active @endif">
                <a class="nav-link" href="{{route('user.kyc_dashboard')}}">KYC</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.dashboard')}}">Admin Panel</a>
            </li>
            <li class="nav-item @if(request()->routeIs('user.advertises')) active @endif">
                <a class="nav-link" href="{{route('user.advertises')}}">Advertises</a>
            </li>
            <li class="nav-item @if(request()->routeIs('user.jobs')) active @endif">
                <a class="nav-link" href="{{route('user.jobs')}}">Jobs</a>
            </li>
            <li class="nav-item @if(request()->routeIs('user.users_list')) active @endif">
                <a class="nav-link" href="{{route('user.users_list')}}">Users List</a>
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
