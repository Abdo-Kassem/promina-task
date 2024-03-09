@php
    $segment = Request::segment(3);
    $route = Route::currentRouteName();
@endphp

<aside class="main-sidebar col-md-3 col-lg-2 col-8">

    <section class="sidebar">

        <div class="user-panel text-center">

            <div class="info" style="margin-top:10px">
                <p> {{-- currentUser()->name --}} abdelrahman ahmed</p>
            </div>

        </div>
      
        <ul class="sidebar-menu">

            <li class="{{ $route == 'user.index' ? 'active' : '' }}">
                <a class='link' href="{{ route('user.index') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span> Dashboard </span>
                </a>
            </li>
            
            <!-- album -->
            <li class='tree'>
                
                <a class='link' >
                    <i class="fa fa-user-plus"></i> 
                    <span>Albums</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left float-end"></i>
                    </span>
                </a>

                <ul class="treeview-menu">
                    
                    <li class="{{ $route == 'albums.index' ? 'active' : '' }}">
                        <a href="{{ route('albums.index') }}">
                            <i class="fa fa-angle-double-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }}"></i>
                            <span>Albums</span>
                        </a>
                    </li>

                    <li class="{{ $route == 'albums.create' ? 'active' : '' }}">
                        <a href="{{ route('albums.create') }}">
                            <i class="fa fa-angle-double-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }}"></i>
                            <span>New Albums</span>
                        </a>
                    </li>

                </ul>
            </li>
         
        </ul>

    </section>
  
  </aside>