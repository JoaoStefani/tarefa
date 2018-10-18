<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- search form (Optional) -->
    {{--<div class="input-group">
        <input type="text" class="form-control" placeholder="Search" id="sidebar-menu-search">
        <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                <i class="fa fa-search"></i>
            </button>
        </span>
    </div>--}}
    <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{$view_name == 'home' ? 'active' : ''}}">
                <a href="{{URL::to('/admin/')}}"><i class="fa fa-link"></i> <span>Dashboard</span></a>
            </li>

            <li>
                <a href="{{URL::to('/admin/artist')}}"><i class="fa fa-link"></i> <span>Artist</span></a>
            </li>

            <li>
                <a href="{{URL::to('/admin/album')}}"><i class="fa fa-link"></i> <span>Album</span></a>
            </li>

            @if(\App\Models\Permissao::userHasPermissao(['USER']))
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-link"></i> <span>Security</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @if(\App\Models\Permissao::userHasPermissao('USER'))
                            <li><a href="{{URL::to('/')}}/admin/user">User Management</a></li>
                        @endif
                    </ul>
                </li>
            @endif

            @if(\App\Models\Permissao::userHasPermissao(['SLIDES']))
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-home"></i> <span>Configuration</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @if(\App\Models\Permissao::userHasPermissao('SLIDES'))
                            <li><a href="{{URL::to('/')}}/admin/slides?cabecalho_rodape=c">Slides Header</a></li>
                        @endif
                        @if(\App\Models\Permissao::userHasPermissao('SLIDES'))
                            <li><a href="{{URL::to('/')}}/admin/slides?cabecalho_rodape=r">Slides Footer</a></li>
                        @endif
                        @if(\App\Models\Permissao::userHasPermissao('SLIDES'))
                            <li><a href="{{URL::to('/')}}/admin/slides?cabecalho_rodape=mp">Slides Menu Product</a></li>
                        @endif
                        @if(\App\Models\Permissao::userHasPermissao('FIND_US'))
                            <li><a href="{{URL::to('/')}}/admin/find_us">Find Us</a></li>
                        @endif
                    </ul>
                </li>
            @endif

            @if(\App\Models\Permissao::userHasPermissao(['ABOUT']))
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-history"></i> <span>About</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @if(\App\Models\Permissao::userHasPermissao('ABOUT'))
                            <li><a href="{{URL::to('/')}}/admin/about/1/edit">About</a></li>
                        @endif
                        @if(\App\Models\Permissao::userHasPermissao('ABOUT_PROMISE'))
                            <li><a href="{{URL::to('/')}}/admin/about_promise">About Promise</a></li>
                        @endif
                    </ul>
                </li>
            @endif

            @if(\App\Models\Permissao::userHasPermissao(['LINES']))
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-coffee"></i> <span>Product</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        @if(\App\Models\Permissao::userHasPermissao('LINES'))
                            <li><a href="{{URL::to('/')}}/admin/lines">Line</a></li>
                        @endif
                        @if(\App\Models\Permissao::userHasPermissao('LINES_PRODUCT'))
                            <li><a href="{{URL::to('/')}}/admin/line_products"> Product</a></li>
                        @endif
                        @if(\App\Models\Permissao::userHasPermissao('LINES_PRODUCT_INGREDIENTS'))
                            <li><a href="{{URL::to('/')}}/admin/product_ingredients"> Ingredients</a></li>
                        @endif
                    </ul>
                </li>
            @endif

        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>