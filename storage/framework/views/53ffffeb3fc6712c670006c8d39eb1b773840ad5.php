<nav class="layout-navbar navbar navbar-expand-lg align-items-lg-center bg-navbar-theme container-p-x" id="layout-navbar">

    <!-- Brand -->
    <a href="<?php echo e(route('home')); ?>" class="navbar-brand">MicroFarmManager.com</a>

    <?php if(empty($hide_layout_sidenav_toggle)): ?>
    <!-- Sidenav toggle -->
    <div class="layout-sidenav-toggle navbar-nav align-items-lg-center mr-auto mr-lg-4">
        <a class="nav-item nav-link px-0 ml-2" href="javascript:void(0)">
            <i class="ion ion-md-menu text-large align-middle"></i>
        </a>
    </div>
    <?php endif; ?>

    <!-- Navbar toggle -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#layout-navbar-collapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    
        
            
            
        
    

</nav>
