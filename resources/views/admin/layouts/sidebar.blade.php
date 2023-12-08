<div class="col-md-2">
    <!-- Sidebar -->
    <div class="list-group">
        <a href="{{route('admin.dashboard')}}" class="list-group-item list-group-item-action
        @if(request()->routeIs('admin.dashboard'))
        active
        @endif">Dashboard</a>
        <a href="{{route('admin.users')}}" class="list-group-item list-group-item-action
        @if(request()->routeIs('admin.users'))
        active
        @endif"">Users</a>
        <a href="{{route('admin.kyc')}}" class="list-group-item list-group-item-action
        @if(request()->routeIs('admin.kyc'))
        active
        @endif"">KYCs</a>
        <a href="{{route('admin.categories')}}" class="list-group-item list-group-item-action
        @if(request()->routeIs('admin.categories'))
        active
        @endif"">Categories</a>
        <a href="{{route('admin.categories_create')}}" class="list-group-item list-group-item-action
        @if(request()->routeIs('admin.categories_create'))
        active
        @endif"">Create Categories</a>
        <a href="{{route('admin.advertises')}}" class="list-group-item list-group-item-action
        @if(request()->routeIs('admin.advertises'))
        active
        @endif"">Advertise List</a>
        <a href="{{route('admin.jobsCategories')}}" class="list-group-item list-group-item-action
        @if(request()->routeIs('admin.jobsCategories'))
        active
        @endif"">Jobs Categories</a>
        <a href="{{route('admin.jobsCategories_create')}}" class="list-group-item list-group-item-action
        @if(request()->routeIs('admin.jobsCategories_create'))
        active
        @endif"">Create Jobs Categories</a>
        <a href="{{route('admin.jobs')}}" class="list-group-item list-group-item-action
        @if(request()->routeIs('admin.jobs'))
        active
        @endif"">Jobs List</a>
    </div>
</div>
