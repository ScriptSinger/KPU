   <!-- Main Sidebar Container -->
   <aside class="main-sidebar sidebar-dark-primary elevation-4">
       <!-- Brand Logo -->
       <a href="{{ route('index') }}" class="brand-link">
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
                   <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


                   <li class="nav-item">
                       <a href="{{ route('index') }}" class="nav-link">
                           <i class="nav-icon fas fa-home"></i>
                           <p>
                               Главная
                           </p>
                       </a>
                   </li>
                   <li class="nav-item">
                       <a href="{{ route('activity') }}" class="nav-link">
                           <i class="nav-icon fas fa-clipboard"></i>
                           <p>
                               Журнал
                           </p>
                       </a>
                   </li>


                   <li class="nav-item">
                       <a href="#" class="nav-link">
                           <i class="nav-icon fas fa-users"></i>
                           <p>
                               Пользователи

                               <i class="right fas fa-angle-left"></i>
                           </p>
                       </a>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{ route('users.index') }}" class="nav-link">
                                   <i class="fas fa-list"></i>
                                   <p>
                                       Список
                                   </p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="{{ route('users.create') }}" class="nav-link">
                                   <i class="fas fa-plus"></i>
                                   <p>
                                       Создать
                                   </p>
                               </a>
                           </li>
                       </ul>
                   </li>

                   <li class="nav-item has-treeview">
                       <a href="#" class="nav-link">
                           <i class="nav-icon fas fa-user-cog"></i>
                           <p>
                               Роли

                               <i class="right fas fa-angle-left"></i>
                           </p>
                       </a>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{ route('roles.index') }}" class="nav-link">
                                   <i class="fas fa-list"></i>
                                   <p>
                                       Список
                                   </p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="{{ route('roles.create') }}" class="nav-link">
                                   <i class="fas fa-plus"></i>
                                   <p>
                                       Создать
                                   </p>
                               </a>
                           </li>
                       </ul>
                   </li>
                   <li class="nav-item has-treeview">
                       <a href="#" class="nav-link">
                           <i class="nav-icon fas fa-map"></i>
                           <p>
                               Локации
                               <i class="right fas fa-angle-left"></i>
                           </p>
                       </a>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{ route('areas.index') }}" class="nav-link">
                                   <i class="fas fa-list"></i>
                                   <p>Список</p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="{{ route('areas.create') }}" class="nav-link">
                                   <i class="fas fa-plus"></i>
                                   <p>Создать</p>
                               </a>
                           </li>
                       </ul>
                   </li>
                   <li class="nav-item has-treeview">
                       <a href="#" class="nav-link">
                           <i class="nav-icon fas fa-plug"></i>
                           <p>Потребители<i class="right fas fa-angle-left"></i>
                           </p>
                       </a>
                       <ul class="nav nav-treeview">
                           <li class="nav-item">
                               <a href="{{ route('consumers.index') }}" class="nav-link">
                                   <i class="fas fa-list"></i>
                                   <p>Список</p>
                               </a>
                           </li>
                           <li class="nav-item">
                               <a href="{{ route('consumers.create') }}" class="nav-link">
                                   <i class="fas fa-file-import"></i>
                                   <p>Импортировать</p>
                               </a>
                           </li>

                       </ul>
                   </li>
               </ul>
           </nav>
           <!-- /.sidebar-menu -->
       </div>
       <!-- /.sidebar -->
   </aside>
