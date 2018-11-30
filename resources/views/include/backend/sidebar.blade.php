<nav id='main-nav'>
    <div class='navigation'>
        <ul class='nav nav-stacked'>
             <?php
                $subactive = function ($part) {
                    $active = 0;
                    //echo str_contains(Request::url(), $part);
                    //echo Request::url().'|||||'.$part.'||||||||';
                    if(Request::url() ==  $part && $part !=''){
                        $active = 1;
                    }
                    return $active;
                }; 
                $active = function ($menu) {
                    $active = 0;
                    if(isset($menu->section[0])){
                        if(str_contains(Request::url(), $menu->section[0]) && $menu->section[0]->url !='') {
                            $active = 1;
                        }
                    }
                    
                    if(!$active && isset($menu->items)){
                        foreach($menu->items as $me){
                            if(str_contains(Request::url(), $me->url) && $me->url != ''){
                                $active = 1;
                                break;
                            }
                        }
                    }
                    return $active;
                };
               
            ?>
            @foreach($laravelAdminMenus->menus as $section)
                @if(isset($section->items))
                    @if(isset($section->section[0]->permission) && Auth::user())
                    <li class="{{ $active($section) ? 'active' : '' }}">
                        <a class="dropdown-collapse {{ ($active($section))? '': 'in' }}" href="#">
                            @if(isset($section->section[0]->icon) && $section->section[0]->icon != '')
                                <i class='{{$section->section[0]->icon}}'></i>
                            @else
                                <i class='fa fa-circle'></i>
                            @endif
                            <span > {{ $section->section[0]->title }}</span>
                            <i class='icon-angle-down angle-down'></i>
                        </a>
                        <ul class="in nav nav-stacked {{ ($active($section))? '': 'in' }}" style="display: {{ ($active($section)) ? 'block': 'none' }}">
                            @foreach($section->items as $menu)
                                @if(isset($menu->permission) && Auth::user())
                                <li class="{{ $subactive(url($menu->url)) ? 'active' : '' }}">
                                    <a href='{{ url($menu->url) }}'>
                                        @if(isset($menu->icon) && $menu->icon != '')
                                            <i class='{{$menu->icon}}'></i>
                                        @else
                                            <i class='fa fa-circle'></i>
                                        @endif
                                        <span>{{ $menu->title }}</span>
                                    </a>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                    @endif
                @else
                    @if(isset($section->section[0]->permission) && Auth::user()->can($section->section[0]->permission))
                    <li class="{{ ($active($section) ? 'active' : '') }}">
                        <a href='{{ url($section->section[0]->url) }}'>
                            <i class='fa fa-users'></i>
                            <span >{{ $section->section[0]->title }}</span>
                        </a>
                    </li>
                    @endif
                @endif
            @endforeach  
        </ul>
    </div>
</nav>