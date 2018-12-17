<dropdown-trigger class="h-9 flex items-center" slot-scope="{toggle}" :handle-click="toggle">
    <img src="https://secure.gravatar.com/avatar/<?php echo e(md5(auth()->user()->email)); ?>?size=512" class="rounded-full w-8 h-8 mr-3"/>

    <span class="text-90">
        <?php echo e(auth()->user()->name); ?>

    </span>
</dropdown-trigger>

<dropdown-menu slot="menu" width="200" direction="rtl">
    <ul class="list-reset">
        <li>
            <a href="<?php echo e(route('nova.logout')); ?>" class="block no-underline text-90 hover:bg-30 p-3">
                <?php echo e(__('Logout')); ?>

            </a>
        </li>
    </ul>
</dropdown-menu>
