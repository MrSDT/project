
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-2">
    <a class="navbar-brand" href="#">Prototype</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('user.index')}}">Home <span class="sr-only"></span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('user.dashboard')}}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('user.kyc_dashboard')}}">KYC</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.dashboard')}}">Admin Panel</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Logout</a>
            </li>
        </ul>
    </div>
</nav>
