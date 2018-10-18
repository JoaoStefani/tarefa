<header class="main-header">
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle fa fa-bars" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div style="    margin-left: 50px; position: absolute; margin-top: 15px;">
            <p>{{config('app.name')}}</p>
        </div>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <li class="dropdown user user-menu">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class=""><i class="fa fa-user"></i></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="text-right">
                                            <span class="fa fa-user fa-5x" style="top: 9px; position: relative;"></span>
                                        </p>
                                    </div>
                                    <div class="col-lg-8">
                                        <p class="text-left"><strong></span> {{auth()->user()->user}}</strong></p>
                                        <p class="text-left">
                                            <a href="{{URL::to('/')}}/admin/password" class="btn btn-primary btn-block btn-sm">Change Password</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <div class="pull-right">
                            <a href="{{URL::to('/')}}/admin/logout" class="btn btn-default btn-flat">Close</a>
                        </div>
                    </ul>
                </li>

            </ul>
        </div>
    </nav>
</header>