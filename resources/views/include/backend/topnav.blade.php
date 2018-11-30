
<header>
    <nav class='navbar navbar-default'>
        <a class='navbar-brand' href='{!! url('/') !!}'>
         <img src="{{asset('assets/images/logo.png')}}" class="admin-logo"/>
                   </a>
        <a class='toggle-nav btn pull-left' href='#'>
            <i class='icon-reorder'></i>
        </a>
        <ul class='nav'>


            {{--@include('partials.language')--}}

           {{-- @include('partials.notifications')--}}

            <li class='dropdown dark user-menu'>
                <a class='dropdown-toggle' data-toggle='dropdown' href='#'>

                    @if(isset(Auth::user()->people->photo))
                        <img width="23" height="23" alt="{!! Auth::user()->name !!}"
                             src="{!! asset('uploads/'.Auth::user()->people->photo) !!}"/>
                    @endif
                    <span class='user-name'>{!! Auth::user()->name !!}</span>
                    <b class='caret'></b>
                </a>
                <ul class='dropdown-menu'>
                    <li>
                        <a href='{!! url('admin/profile') !!}'>
                            <i class='icon-user'></i>
                            Profile
                        </a>
                    </li>
                    <li class='divider'></li>

                    <li>
                        <a href="{{ url('/logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class='icon-signout'></i>
                            Logout
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                              style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>

                </ul>
            </li>
        </ul>
        
    </nav>
</header>