   <!-- Main Sidebar Container -->
   <aside class="main-sidebar sidebar-dark-primary elevation-4">
       <!-- Brand Logo -->
       <a href="{{ route('personal') }}" class="brand-link">
           <img src="{{ asset('assets/image/electric-meter.png') }}" alt="Logo"
               class="brand-image img-circle elevation-3" style="opacity: .8">
           <span class="brand-text font-weight-light"> {{ config('app.name', 'Laravel') }}</span>

       </a>

       <!-- Sidebar -->
       <div class="sidebar">
           <!-- Sidebar user (optional) -->
           <div class="user-panel mt-3 pb-3 mb-3 d-flex">
               <div class="image">
                   <img src="{{ asset('assets/image/avatar.jpg') }}" class="img-circle elevation-2" alt="User Image">
               </div>
               <div class="info">
                   <a href="#" class="d-block">{{ auth()->user()->name }}</a>
               </div>
           </div>

           <!-- Sidebar Menu -->
           <nav class="mt-2">
               <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                   data-accordion="true">
                   <li class="nav-item">
                       <a href="{{ route('personal') }}" class="nav-link">
                           <i class="nav-icon fas fa-home"></i>
                           <p>
                               Главная
                           </p>
                       </a>
                   </li>
                   <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                   @if (auth()->user()->can('show') && isset($areas))
                       <li class="nav-item has-treeview">
                           <a href="#" class="nav-link">
                               <i class="nav-icon fas fa-map"></i>
                               <p>
                                   Локации
                                   <i class="right fas fa-angle-left"></i>
                               </p>
                           </a>
                           <ul class="nav nav-treeview">
                               @foreach ($areas as $area)
                                   <li class="nav-item">
                                       <a href="{{ route('employees-area.show', [$area->id]) }}" class="nav-link">
                                           <i class="far fa-circle nav-icon"></i>
                                           <p> {{ $area->name }}</p>
                                       </a>
                                   </li>
                               @endforeach
                           </ul>
                       </li>
                   @endif
               </ul>
           </nav>
           <!-- /.sidebar-menu -->
       </div>
       <!-- /.sidebar -->
   </aside>
