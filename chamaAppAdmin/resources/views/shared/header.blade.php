<header id="page-header" class="pageheader">
    <div class="content-header">
        <div class="navbar-header">
            <button type="button" class="btn-bars btn">
                <span class="ti-menu"></span>
            </button>
            <div class="app-title">
                <!-- <img src="assets/images/logo_white.png" alt=""> -->
                Chama APP
            </div>
            <!-- <div class="mobile-nav">
                <button class="btn" type="button" id="mobileBtn">
                    <i class="ti-layout-grid2-alt"></i></button>
            </div> -->
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown dropdown-search">
                <button class="btn search-btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="ti-search"></span></button>
                <div class="dropdown-menu dropdown-search-container">
                    <div class="search-container">
                        <span class="ti-search"></span>
                        <!-- <input type="text" placeholder="Search" autocomplete="off"></div> -->
                    </div>
                    <div class="search-expand-container">
                        <span class="ti-search"></span>
                        <!-- <input type="text" class="expand-search" placeholder="Search" autocomplete="off"> -->
                    </div>
                </div>
            </li>
            <!-- <li class="dropdown dropdown-help">
                <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="ti-help"></span>
                </button>
                <div class="dropdown-menu dropdown-help-menu">
                    <div class="dropdown-header">Help & Support</div>
                    <ul class="help-list" id="helps">
                        <li>
                            <a class="pr-help collapsed" data-toggle="collapse" href="#help1" aria-expanded="true"><span class="ti-user"></span>Profile settings
                            </a>
                            <ul id="help1" class="collapse" data-parent="#helps">
                                <li><span class="icon ti-panel"></span>
                                    <div class="ctn-info">Das yurio samiun kareo san<br>
                                        <a href="#">Use activity log</a></div>
                                </li>
                                <li><span class="icon ti-save-alt"></span>
                                    <div class="ctn-info">Standard cus imorasun ko ganiu kobe kobe<br>
                                        <a href="#">View more</a></div>
                                </li>
                                <li><span class="icon ti-reload"></span>
                                    <div class="ctn-info">Feel sami qor tay vix<br>
                                        <a href="#">View more</a></div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="pr-help collapsed" data-toggle="collapse" href="#help2" aria-expanded="true">
                                <span class="ti-email"></span>Who can contact me?
                            </a>
                            <ul id="help2" class="collapse" data-parent="#helps">
                                <li><span class="icon ti-panel"></span>
                                    <div class="ctn-info">
                                        Hal pertama yang mesti diingat adalah bagaimana kita bisa survive<br>
                                        <input type="text" class="form-control form-control-sm" placeholder="youremail@example.com"></div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="pr-help collapsed" data-toggle="collapse" href="#help3" aria-expanded="true">
                                <span class="ti-na"></span>How to block someone?</a>
                            <ul id="help3" class="collapse" data-parent="#helps">
                                <li>
                                    <span class="icon ti-panel"></span>
                                    <div class="ctn-info">Hal pertama yang mesti diingat adalah bagaimana kita bisa survive<br>
                                        <a href="index-2.html">Find out more</a></div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="dropdown-footer">
                        <a href="javascript:void(0)">see more settings</a></div>
                </div>
            </li> -->
            @auth
            <li class="dropdown dropdown-notifications">
                <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                    <span class="ti-bell"></span><span class="badge badge-pill badge-danger">1</span>
                </button>
                <div class="dropdown-menu">
                    <div class="dropdown-header">Notifications (1)</div>
                    <div class="list-group notification-list scrollbar-inner">

                        
                        <a href="#" class="list-group-item list-group-item-action active">
                            <div class="notif-icon bg-success"><i class="fa fa-check"></i>
                            </div>
                            <div class="notif-info">notify
                                <span>3 hour ago</span>
                            </div>
                            <div class="unread"></div>
                        </a>
                     

                    </div>
                    <!-- <div class="dropdown-footer">
                        <a href="javascript:void(0)">see all</a></div> -->
                </div>
            </li>
            @else
            @endauth
            <!-- <li class="rightSidebar"><button class="btn btn-r_sidebar" type="button">
                    <i class="ti-view-list-alt"></i>
                </button></li> -->
        </ul>
    </div>
</header>