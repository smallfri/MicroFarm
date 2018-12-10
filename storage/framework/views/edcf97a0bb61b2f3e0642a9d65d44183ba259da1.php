<div id="layout-sidenav"
     class="<?php echo e(isset($layout_sidenav_horizontal) ? 'layout-sidenav-horizontal sidenav-horizontal container-p-x flex-grow-0' : 'layout-sidenav sidenav-vertical'); ?> sidenav bg-sidenav-theme">
    <div class="app-brand demo">
          <span class="app-brand-logo demo">
						<img src="/images/logo-medium.png" alt="home" style="width:160px;margin: 20px 20px"/>

          </span>
    </div>
    <div class="sidenav-divider mt-0"></div>
    <!-- Inner -->
    <ul class="sidenav-inner<?php echo e(empty($layout_sidenav_horizontal) ? ' py-1' : ''); ?>">

        <li class="sidenav-item<?php echo e(Request::is('/') ? ' active' : ''); ?>">
            <a href="<?php echo e(route('home')); ?>" class="sidenav-link"><i class="sidenav-icon ion ion-ios-contact"></i>
                <div>Home</div>
            </a>
        </li>

        <li class="sidenav-item<?php echo e(Request::is('seed/create') ? ' active' : ''); ?>">
            <a href="<?php echo e(route('seed/create')); ?>" class="sidenav-link"><i class="sidenav-icon ion ion-md-desktop"></i>
                <div>Seeds</div>
            </a>
        </li>

        <li class="sidenav-item<?php echo e(Request::is('seed') ? ' active' : ''); ?>">
            <a href="<?php echo e(route('seed')); ?>" class="sidenav-link"><i class="sidenav-icon ion ion-md-desktop"></i>
                <div>Growing Journal</div>
            </a>
        </li>

    </ul>
</div>
