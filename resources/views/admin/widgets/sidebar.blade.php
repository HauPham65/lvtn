 <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="{{route('admin.dashboard')}}">
          <i class="bi bi-grid"></i>
          <span>Thống Kê</span>
        </a>
      </li><!-- End Dashboard Nav -->



      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Quản lý hãng sản xuất</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{route('manufact.create')}}">
              <i class="bi bi-circle"></i><span>Thêm</span>
            </a>
          </li>
          <li>
            <a href="{{route('manufact.index')}}">
              <i class="bi bi-circle"></i><span>Danh Sách Hãng</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->



    </ul>

  </aside>
