  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="{{ route('admin.dashboard') }}" class="brand-link text-center">
          <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">{{ __('backend.system_name') }}</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                  <li class="nav-item">
                      <a href="{{ route('admin.dashboard') }}" class="nav-link">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              {{ __('backend.dashboard') }}
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('admin.crud.index', ['model' => 'Service']) }}" class="nav-link">
                          <i class="nav-icon fas fa-cubes"></i>
                          <p>
                              {{ __('backend.services') }}
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('admin.clubs.index') }}" class="nav-link">
                          <i class="nav-icon fas fa-cubes"></i>
                          <p>
                              {{ __('backend.clubs.clubs') }}
                          </p>
                      </a>
                  </li>
                  <li class="nav-item menu-is-opening menu-open">
                      <a href="#" class="nav-link active">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>
                              {{ __('backend.offers.offers') }}
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview" style="display: block;">
                          <li class="nav-item">
                              <a href="{{ route('admin.offer-company.index') }}" class="nav-link active">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('backend.offers.offer_companies') }}</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('admin.offer.index') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>{{ __('backend.offers.offers') }}</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="./index3.html" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Dashboard v3</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('admin.coupons.index') }}" class="nav-link">
                          <i class="nav-icon fas fa-cubes"></i>
                          <p>
                              {{ __('backend.coupons.coupons') }}
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('admin.crud.index', ['model' => 'Client']) }}" class="nav-link">
                          <i class="nav-icon fas fa-user"></i>
                          <p>
                              {{ __('backend.client') }}
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('admin.faqs.index') }}" class="nav-link">
                          <i class="nav-icon fas fa-question"></i>
                          <p>
                              {{ __('backend.faqs') }}
                          </p>
                      </a>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
