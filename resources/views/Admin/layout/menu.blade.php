<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title"> 
                    <span>Main</span>
                </li>
                <li>
                    <a href="{{ url('admin/login') }}"><i class="la la-dashboard"></i> <span> Dashboard</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-cube"></i> <span> Apps</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="chat.html">Chat</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                    </ul>
                </li>
                <li class="menu-title"> 
                    <span>Sản phẩm</span>
                </li>
                <li> 
                    <a href="{{ url('admin/products') }}"><i class="la la-cubes"></i> <span> Tất cả sản phẩm </span></a>
                </li>
                <li>
                    <a href="{{ url('admin/image-product') }}"><i class="las la-comment"></i> <span>Ảnh sản phẩm</span></a>
                </li>
                <li>
                    <a href="{{ url('admin/brand-product') }}"><i class="la la-tags"></i> <span> Thương hiệu</span></a>
                </li>
                <li class="menu-title"> 
                    <span>Quản lý kinh doanh</span>
                </li>
                <li>
                    <a href="{{ url('admin/voucher') }}"><i class="las la-ticket-alt"></i> <span> Mã giảm giá</span></a>
                </li>
                <li>
                    <a href="{{ url('admin/invoices') }}"><i class="las la-file-invoice-dollar"></i> <span> Hóa đơn </span></span></a>                    
                </li>
                <li>
                    <a href="{{ url('admin/report') }}"><i class="la la-pie-chart"></i> <span> Thống kê </span> </a>
                </li>
                

            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->