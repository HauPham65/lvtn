 <aside id="sidebar" class="sidebar">

     <ul class="sidebar-nav" id="sidebar-nav">
         <li class="nav-item">
             <a class="nav-link " href="{{ route('admin.dashboard') }}">
                 <i class="bi bi-grid"></i>
                 <span>Thống Kê</span>
             </a>
         </li>
         <!-- End Dashboard Nav -->

         <li class="nav-item">
             <a class="nav-link collapsed" data-bs-target="#manufact-nav" data-bs-toggle="collapse" href="#">
                 <i class="bi bi-journal-text"></i><span>Quản lý hãng sản xuất</span><i
                     class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="manufact-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">

                 <li>
                     <a href="{{ route('manufact.index') }}">
                         <i class="bi bi-circle"></i><span>Danh Sách Hãng</span>
                     </a>
                 </li>
             </ul>
         </li>
         <!-- End Hãng sản xuất Nav -->

         <li class="nav-item">
             <a class="nav-link collapsed" data-bs-target="#category-nav" data-bs-toggle="collapse" href="#">
                 <i class="bi bi-journal-text"></i><span>Quản lý danh mục</span><i
                     class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="category-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">

                 <li>
                     <a href="{{ route('categories.index') }}">
                         <i class="bi bi-circle"></i><span>Danh Sách danh mục</span>
                     </a>
                 </li>
             </ul>
         </li>
         <!-- End Danh mục Nav -->

          <!-- <li class="nav-item">
             <a class="nav-link collapsed" data-bs-target="#product-nav" data-bs-toggle="collapse" href="#">
                 <i class="bi bi-journal-text"></i><span>Quản lý sản phẩm</span><i
                     class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="product-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">

                 <li>
                     <a href="">
                         <i class="bi bi-circle"></i><span>Danh Sách sản phẩm</span>
                     </a>
                 </li>
             </ul>
         </li> -->
       
         <!-- End sản phẩm Nav -->
         <!-- <li class="nav-item">
             <a class="nav-link collapsed" data-bs-target="#discount-nav" data-bs-toggle="collapse" href="#">
                 <i class="bi bi-journal-text"></i><span>Quản lý khuyến mãi</span><i
                     class="bi bi-chevron-down ms-auto"></i>
             </a>
             <ul id="discount-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                 <li>
                     <a href="">
                         <i class="bi bi-circle"></i><span>Danh Sách khuyến mãi</span>
                     </a>
                 </li>
             </ul>
         </li> -->
         <!-- End khuyến mãi Nav -->

            

            <!-- <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#order-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Quản Lý Đơn hàng</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="order-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>Danh Sách Đơn hàng</span>
                        </a>
                    </li>
                </ul>
            </li> -->
            <!-- End bình luận Nav -->

               <!-- <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#user-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-journal-text"></i><span>Quản Lý Người Dùng</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="user-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li>
                        <a href="">
                            <i class="bi bi-circle"></i><span>Danh Sách Người Dùng</span>
                        </a>
                    </li>
                </ul>
            </li> -->
            <!-- End bình luận Nav -->

     </ul>

 </aside>
