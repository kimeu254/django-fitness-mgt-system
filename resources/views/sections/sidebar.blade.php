<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="{{ route('home') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">Jhon Doe</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ route('home') }}" class="nav-item nav-link active"><i class="mdi mdi-view-dashboard-outline me-2"></i>Dashboard</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="mdi mdi-account-group-outline me-2"></i>Members</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{route('new.member')}}" class="dropdown-item">Add Member</a>
                    <a href="{{route('member.requests')}}" class="dropdown-item">Member Requests</a>
                    <a href="{{route('members')}}" class="dropdown-item">Members List</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="mdi mdi-weight-lifter me-2"></i>Trainers</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="signin.html" class="dropdown-item">New Trainer</a>
                    <a href="signup.html" class="dropdown-item">Trainers List</a>
                </div>
            </div>
            <a href="chart.html" class="nav-item nav-link"><i class="mdi mdi-calendar-arrow-right me-2"></i>Shifts</a>
        </div>
    </nav>
</div>
