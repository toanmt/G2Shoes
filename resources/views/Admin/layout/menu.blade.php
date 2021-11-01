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
                    <span>Employees</span>
                </li>
                <li> 
                    <a href="{{ url('admin/clients') }}"><i class="la la-users"></i> <span>Clients</span></a>
                </li>
                <li> 
                    <a href="tickets.html"><i class="la la-ticket"></i> <span>Tickets</span></a>
                </li>
                <li class="menu-title"> 
                    <span>Business Management</span>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-first-order"></i> <span> Invoices </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ url('admin/invoices') }}"> All Invoices</a></li>
                    </ul>
                    
                </li>
                <li class="submenu">
                    <a href="#"><i class="la la-pie-chart"></i> <span> Reports </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="invoice-reports.html"> Invoice Report </a></li>
                        <li><a href="payments-reports.html"> Payments Report </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fa fa-cubes"></i> <span> Products </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ url('admin/products') }}"> All Products</a></li>

                    </ul>
                </li>
                <li>
                    <a href="{{ url('admin/sizes') }}"><i class="fa fa-cubes"></i> <span> Sizes </span></a>
                </li>
                <li>
                    <a href="{{ url('admin/images') }}"><i class="fa fa-cubes"></i> <span> Images </span></a>
                </li>
                <li class="menu-title"> 
                    <span>Font-end</span>
                </li>
                <li>
                    <a href="{{ url('admin/brand-product') }}"><i class="la la-dashboard"></i> <span> Brand Product</span></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->