<div id="layout-sidenav" class="<?php echo e(isset($layout_sidenav_horizontal) ? 'layout-sidenav-horizontal sidenav-horizontal container-p-x flex-grow-0' : 'layout-sidenav sidenav-vertical'); ?> sidenav bg-sidenav-theme">

    <!-- Inner -->
    <ul class="sidenav-inner<?php echo e(empty($layout_sidenav_horizontal) ? ' py-1' : ''); ?>">

        <li class="sidenav-item<?php echo e(Request::is('/') ? ' active' : ''); ?>">
            <a href="<?php echo e(route('home')); ?>" class="sidenav-link"><i class="sidenav-icon ion ion-ios-contact"></i><div>Home</div></a>
        </li>

        <li class="sidenav-item<?php echo e(Request::is('page-2') ? ' active' : ''); ?>">
            <a href="<?php echo e(route('page-2')); ?>" class="sidenav-link"><i class="sidenav-icon ion ion-md-desktop"></i><div>Page 2</div></a>
        </li>

    </ul>
</div>
