<?php
use App\Feature;
?>
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
            <div class="sidenav-divider mt-0"></div>
            <a href="<?php echo e(route('seed/create')); ?>" class="sidenav-link"><i class="sidenav-icon ion ion-ios-keypad"></i>
                <div>Seed Selection</div>
            </a>
        </li>

        <li class="sidenav-item<?php echo e(Request::is('seed/summary') ? ' active' : ''); ?>">
            <a href="<?php echo e(route('seed-summary')); ?>" class="sidenav-link"><i
                        class="sidenav-icon ion ion-ios-clipboard"></i>
                <div>Seed Summary</div>
            </a>
        </li>

        <li class="sidenav-item<?php echo e(Request::is('seed') ? ' active' : ''); ?>">
            <a href="<?php echo e(route('seed')); ?>" class="sidenav-link"><i class="sidenav-icon ion ion-ios-leaf"></i>
                <div>Growing Journal</div>
            </a>
        </li>

        <?php
        if (Feature::can('metrics') || Feature::canAdmin()) { ?>
        <li class="sidenav-item <?php echo e(Request::is('inventory') ? ' active' : ''); ?>" style="">
            <div class="sidenav-divider mt-0"></div>

            <a href="<?php echo e(route('inventory')); ?>" class="sidenav-link sidenav-toggle"><i
                        class="sidenav-icon fa fa-store-alt"></i>
                <div>Inventory</div> &nbsp;<span class="badge badge-danger float-right">NEW!</span>
            </a>

            <ul class="sidenav-menu">

                <?php if(App\Feature::canAdmin()): ?>
                    <li class="sidenav-item">
                        <a href="<?php echo e(route('metrics-create')); ?>" class="sidenav-link">
                            <div>Inventory Metrics</div>
                        </a>
                    </li>
                    <li class="sidenav-item">
                        <a href="<?php echo e(route('category-create')); ?>" class="sidenav-link">
                            <div>Create Category</div>
                        </a>
                    </li>

                    <li class="sidenav-item">
                        <a href="<?php echo e(route('location-create')); ?>" class="sidenav-link">
                            <div>Locations</div>
                        </a>
                    </li>
                <?php endif; ?>
                <li class="sidenav-item">
                    <a href="<?php echo e(route('inventory-create')); ?>" class="sidenav-link">
                        <div>Create Item</div>
                    </a>
                </li>

                <li class="sidenav-item">
                    <a href="<?php echo e(route('inventory-manage')); ?>" class="sidenav-link">
                        <div>Manage Item Quantity</div>
                    </a>
                </li>

            </ul>
        </li>
        <?php } ?>
        <li class="sidenav-item">
            <div class="sidenav-divider mt-0"></div>
            <a href="https://microfarmmanager.com/coupons/" class="sidenav-link" target="_blank"><i
                        class="sidenav-icon ion ion-md-pricetags"></i>
                <div>Coupons & Deals</div>
            </a>
        </li>

        <li class="sidenav-item">
            <a href="https://microfarmmanager.com/classroom/" class="sidenav-link" target="_blank"><i
                        class="sidenav-icon fas fa-graduation-cap"></i>
                <div>Classroom</div>
            </a>
        </li>

        <li class="sidenav-item">
            <div class="sidenav-divider mt-0"></div>
            <a href="/logout" class="sidenav-link"><i class="sidenav-icon ion oi oi-account-logout"></i>
                <div>Logout</div>
            </a>
        </li>

    </ul>
</div>
