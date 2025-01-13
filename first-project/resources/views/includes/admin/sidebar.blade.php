<nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="menu"
              data-accordion="false"
            >
              <li class="nav-header">ADMIN PANEL</li>
              <li class="nav-item">
                <a href="./docs/introduction.html" class="nav-link">
                    <i class="nav-icon bi bi-calendar col"></i>
                    <p class="align-middle col">
                        Posts
                    </p>
                    <span class="align-middle">{{ $posts->total() }}</span>           
                </a>
              </li>
            </ul>
            <!--end::Sidebar Menu-->
          </nav>