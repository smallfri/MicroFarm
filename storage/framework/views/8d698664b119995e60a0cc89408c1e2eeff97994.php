<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>" class="default-style">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <title><?php echo e(isset($title) ? $title.' - ' : ''); ?> MicroFarmManager.com</title>

    <!-- Core scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script
            src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"
            integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="
            crossorigin="anonymous"></script>
    <script src="<?php echo e(mix('/vendor/libs/popper/popper.js')); ?>"></script>
    <script src="<?php echo e(mix('/vendor/js/bootstrap.js')); ?>"></script>
    <script src="<?php echo e(mix('/vendor/js/sidenav.js')); ?>"></script>

    <!-- Libs -->

    <!-- `perfect-scrollbar` library required by SideNav plugin -->
    <script src="<?php echo e(mix('/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')); ?>"></script>

    <!-- Application javascripts -->
    <script src="<?php echo e(mix('/js/application.js')); ?>"></script>

    <!--For tabs -->

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="/assets/plugins/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/plugins/font-awesome/5.3/css/all.min.css" rel="stylesheet" />
    <link href="/assets/plugins/animate/animate.min.css" rel="stylesheet" />
    <link href="/assets/css/default/style.min.css" rel="stylesheet" />
    <link href="/assets/css/default/style-responsive.min.css" rel="stylesheet" />
    <link href="/assets/css/default/theme/default.css" rel="stylesheet" id="theme" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="/assetsTabs/pace.min.js"></script>
    <script src="/assetsTabs/render.highlight.js"></script>
    <!-- ================== END BASE JS ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="/assetsTabs/bootstrap.bundle.min.js"></script>

    <script src="/assetsTabs/jquery.slimscroll.min.js"></script>
    <script src="/assetsTabs/js.cookie.js"></script>
    <script src="/assetsTabs/apps.min.js"></script>
    <!-- ================== END BASE JS ================== -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            App.init();
            Highlight.init();
        });
    </script>


    <!-- Main font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900" rel="stylesheet">

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?php echo e(mix('/vendor/fonts/fontawesome.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(mix('/vendor/fonts/ionicons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(mix('/vendor/fonts/linearicons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(mix('/vendor/fonts/open-iconic.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(mix('/vendor/fonts/pe-icon-7-stroke.css')); ?>">

    <!-- Core stylesheets -->
    <link rel="stylesheet" href="<?php echo e(mix('/vendor/css/bootstrap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(mix('/vendor/css/appwork.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(mix('/vendor/css/colors.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(mix('/vendor/css/uikit.css')); ?>">

    <!-- Layout helpers -->
    <script src="<?php echo e(mix('/vendor/js/layout-helpers.js')); ?>"></script>

    <!-- Libs -->

    <!-- `perfec>t-scrollbar` library required by SideNav plugin -->
    <link rel="stylesheet" href="<?php echo e(mix('/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')); ?>">

    <?php echo $__env->yieldContent('styles'); ?>

    <!-- Application stylesheets -->
    <link rel="stylesheet" href="<?php echo e(mix('/css/application.css')); ?>">
    <link href="/assetsTabs/theme-soft.css" rel="stylesheet" id="theme" />

</head>
<body>

    <?php echo $__env->yieldContent('layout-content'); ?>


    <script>
        window.intercomSettings = {
            app_id: "yvcs9u3i",
            <?php if(Auth::check()): ?>
                name: "<?php echo Auth::user()->name; ?>", // Full name
                email: "<?php echo Auth::user()->email;?>", // Email address
                created_at: "<?php echo strtotime(Auth::user()->created_at) ?>" // Signup Date
            <?php endif; ?>
        };
    </script>
    <script>(function(){var w=window;var ic=w.Intercom;if(typeof ic==="function"){ic('reattach_activator');ic('update',intercomSettings);}else{var d=document;var i=function(){i.c(arguments)};i.q=[];i.c=function(args){i.q.push(args)};w.Intercom=i;function l(){var s=d.createElement('script');s.type='text/javascript';s.async=true;s.src='https://widget.intercom.io/widget/yvcs9u3i';var x=d.getElementsByTagName('script')[0];x.parentNode.insertBefore(s,x);}if(w.attachEvent){w.attachEvent('onload',l);}else{w.addEventListener('load',l,false);}}})()</script>

</body>
</html>
