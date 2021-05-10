<nav id="sidebar" class="sidenav">
    <div class="sidebar-wrapper">
        @auth
        <div class="profile-sidebar">
            <div class="avatar">
                <img src="assets/images/profiles/05.jpg" alt="">
            </div>
            <div class="profile-name">
                Tamarix Support
            </div>
            <div class="profile-title">
                {{Auth::user()->email}}</div>
        </div>
        @else
        <div class="profile-sidebar">
            <div class="avatar">
                <img src="assets/images/profiles/05.jpg" alt="">
            </div>
            <div class="profile-name">
                Tamarix Support
            </div>
            <div class="profile-title">
                Tamarix Company Limited</div>
        </div>
        @endauth

        
    </div>
</nav>