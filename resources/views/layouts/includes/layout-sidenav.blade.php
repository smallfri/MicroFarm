<div id="layout-sidenav"
     class="{{ isset($layout_sidenav_horizontal) ? 'layout-sidenav-horizontal sidenav-horizontal container-p-x flex-grow-0' : 'layout-sidenav sidenav-vertical' }} sidenav bg-sidenav-theme">
    <div class="app-brand demo">
          <span class="app-brand-logo demo">
						<img src="/images/logo-medium.png" alt="home" style="width:160px;margin: 20px 20px"/>

          </span>
    </div>
    <div class="sidenav-divider mt-0"></div>
    <!-- Inner -->
    <ul class="sidenav-inner{{ empty($layout_sidenav_horizontal) ? ' py-1' : '' }}">

        <li class="sidenav-item{{ Request::is('/') ? ' active' : '' }}">
            <a href="{{ route('home') }}" class="sidenav-link"><i class="sidenav-icon ion ion-ios-contact"></i>
                <div>Home</div>
            </a>
        </li>

        <li class="sidenav-item{{ Request::is('seed/create') ? ' active' : '' }}">
            <a href="{{ route('seed/create') }}" class="sidenav-link"><i class="sidenav-icon ion ion-ios-keypad"></i>
                <div>Seed Selection</div>
            </a>
        </li>

        <li class="sidenav-item{{ Request::is('seed') ? ' active' : '' }}">
            <a href="{{ route('seed') }}" class="sidenav-link"><i class="sidenav-icon ion ion-ios-leaf"></i>
                <div>Growing Journal</div>
            </a>
        </li>

        <li class="sidenav-item">
            <a href="https://microfarmmanager.com/coupons/" class="sidenav-link" target="_blank"><i class="sidenav-icon ion ion-md-pricetags"></i>
                <div>Coupons & Deals</div>
            </a>
        </li>

        <li class="sidenav-item">
            <a href="https://microfarmmanager.com/classroom/" class="sidenav-link" target="_blank"><i class="sidenav-icon fas fa-graduation-cap"></i>
                <div>Classroom</div>
            </a>
        </li>

        <li class="sidenav-item">
            <a href="/logout" class="sidenav-link"><i class="sidenav-icon ion oi oi-account-logout"></i>
                <div>Logout</div>
            </a>
        </li>

    </ul>
</div>
