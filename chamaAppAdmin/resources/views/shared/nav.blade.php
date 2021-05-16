<nav id="sidebar" class="sidenav">
    <div class="sidebar-wrapper">
        @auth
        <div class="profile-sidebar">
            <div class="avatar">
                <img src="assets/images/profiles/05.jpg" alt="">
            </div>
            <div class="profile-name">
                Chama App Admin
            </div>
            <div class="profile-title">
                {{Auth::user()->email}}
            </div>
        </div>
        @else
        <div class="profile-sidebar">
            <div class="avatar">
                <img src="assets/images/profiles/05.jpg" alt="">
            </div>
            <div class="profile-name">
            Chama App
            </div>
            <div class="profile-title">
            Chama App</div>
        </div>
        @endauth

        <ul class="main-menu" id="menus">
            <li class="header">Admin Pannel</li>

            @auth
            <li>
                <a href="{{url('home')}}">
                    <span class="icon ti-mobile"></span>Dashboard
                </a>
            </li>
            <li>
                <a href="{{url('groups')}}">
                    <span class="icon ti-mobile"></span>Groups
                </a>
            </li>
            <!-- <li>
                <a class="pr-mn collapsed" data-toggle="collapse" href="#client" aria-expanded="true">
                    <span class="icon ti-location-pin"></span>Deposits/Withdraws
                </a>
                <ul id="client" class="collapse" data-parent="#menus">
                    <li><a href="{{url('/transact')}}">Deposit Amounts.</a></li>
                    <li><a href="{{url('/withdraw')}}">Withdraw Amounts</a></li>
                </ul>
            </li>
            <li>
                <a class="pr-mn collapsed" data-toggle="collapse" href="#manage" aria-expanded="true">
                    <span class="icon ti-location-pin"></span>Loans
                </a>
                <ul id="manage" class="collapse" data-parent="#menus">
                    <li><a href="{{url('/loan')}}">Requested Loans</a></li>
                    <li><a href="{{url('/repay_loan')}}">Repaid Loan</a></li>
                </ul>
            </li> -->
            <li>
                <a href="{{url('change-password')}}">
                    <span class="icon ti-pencil"></span>Change Password
                </a>
            </li>
            @else
            <!-- <li>
                <a href="{{url('/')}}">
                    <span class="icon ti-pencil"></span>NEW
                </a>
            </li> -->
            @endauth
            @guest
            <li>
                <a href="{{route('login')}}">
                    <span class="icon ti-lock"></span>{{ __('Login') }}
                </a>
            </li>
            @else
            <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <span class="icon ti-lock"></span>{{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            @endguest
        </ul>
    </div>
</nav>