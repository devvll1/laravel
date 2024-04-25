<div class="container-fluid">
  <div class="row">
      <!-- Sidebar -->
      <div class="col-md-3 col-xl-2 px-0 bg-dark">
          <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
              <!-- Sidebar Content -->
              <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                  <span class="fs-5 d-none d-sm-inline">Menu</span>
              </a>
              <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                  <li class="nav-item">
                      <a href="{{ route('users.index') }}" class="nav-link align-middle px-0">
                          <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">USER LIST</span>
                      </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('genders.index') }}" class="nav-link align-middle px-0">
                        <i class="fs-4 bi-house"></i> <span class="ms-1 d-none d-sm-inline">GENDER LIST</span>
                    </a>
                </li>
                  <li>
                      <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                          <i class="fs-4 bi-speedometer2"></i> <span class="ms-1 d-none d-sm-inline">ADD</span> </a>
                      <ul class="collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                          <li class="w-100">
                              <a href="{{ route('users.create') }}" class="nav-link px-0"> <span class="d-none d-sm-inline">User</span></a>
                          </li>
                          <li>
                              <a href="{{ route('genders.create') }}" class="nav-link px-0"> <span class="d-none d-sm-inline">Gender</span></a>
                          </li>
                      </ul>
                  </li>
              </ul>
              <hr>
              <div class="dropdown pb-4">
                  <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                      <img src="https://www.svgrepo.com/show/281756/user-profile.svg" alt="hugenerd" width="30" height="30" class="rounded-circle">
                      <span class="d-none d-sm-inline mx-1"></span>{{ session('myFullName') }}
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                      <li><a class="dropdown-item" href="#">New project...</a></li>
                      <li><a class="dropdown-item" href="#">Settings</a></li>
                      <li><a class="dropdown-item" href="#">Profile</a></li>
                      <li>
                          <hr class="dropdown-divider">
                      </li>
                      <li><a class="dropdown-item" href="/logout">Sign out</a></li>
                  </ul>
              </div>
          </div>
      </div>