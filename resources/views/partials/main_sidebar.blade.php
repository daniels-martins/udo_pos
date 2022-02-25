<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ route('dashboard') }}" class="brand-link">
    <img src="adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
      style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) POS TEMINAL-->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="{{ route('pos') }}" class="d-block">{{ auth()->user()->email }} POS </a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('profile') }}" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Profile</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('password.edit') }}" class="nav-link active">
                <i class="far fa-circle nav-icon"></i>
                <p>Change Password</p>
              </a>
            </li>



            {{-- <li class="nav-item">
              <a href="./index2.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v2</p>
              </a>
            </li> --}}
            {{-- <li class="nav-item">
              <a href="./index3.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v3</p>
              </a>
            </li> --}}
          </ul>
        </li>


        <li class="nav-item">
          <a href="{{ route('widgets') }}" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              widgets
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/setting" class="nav-link ">
            <i class="nav-icon fas fa-cog"></i>
            <p>
              Settings
            </p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Employee
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/employee/create"
                class="nav-link custom-link ">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Add Employee </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/employee"
                class="nav-link custom-link ">
                <i class="fas fa-list nav-icon"></i>
                <p> List Employee </p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tags"></i>
            <p>
              Customer
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/customer/create"
                class="nav-link custom-link ">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Add Customer </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/customer"
                class="nav-link custom-link ">
                <i class="fas fa-list nav-icon"></i>
                <p> List Customer </p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tags"></i>
            <p>
              Category
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/category/create"
                class="nav-link custom-link ">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Add Category </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/category"
                class="nav-link custom-link ">
                <i class="fas fa-list nav-icon"></i>
                <p> List Category </p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-boxes"></i>
            <p>
              Product
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/product/create"
                class="nav-link custom-link ">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Add Product </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/product"
                class="nav-link custom-link ">
                <i class="fas fa-list nav-icon"></i>
                <p> List Product </p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-adjust"></i>
            <p>
              Inventory Adjustment
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/inventory_adjustment/create"
                class="nav-link custom-link ">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Add Inventory Adjustment</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/inventory_adjustment"
                class="nav-link custom-link ">
                <i class="fas fa-list nav-icon"></i>
                <p> List Inventory Adjustment </p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-people-carry"></i>
            <p>
              Supplier
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/supplier/create"
                class="nav-link custom-link ">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Add Supplier</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/supplier"
                class="nav-link custom-link ">
                <i class="fas fa-list nav-icon"></i>
                <p> List Supplier </p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-shopping-basket"></i>
            <p>
              Purchase
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/purchase/create"
                class="nav-link custom-link ">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Add Purchase</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/return_purchase/create"
                class="nav-link custom-link ">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p> Add Return Purchase </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/purchase"
                class="nav-link custom-link ">
                <i class="fas fa-list nav-icon"></i>
                <p> List Purchase </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/return_purchase"
                class="nav-link custom-link ">
                <i class="fas fa-list nav-icon"></i>
                <p> List Return Purchase </p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cart-arrow-down"></i>
            <p>
              Sales
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/sale/createbyname"
                class="nav-link custom-link ">
                <i class="fas fa-th-large nav-icon"></i>
                <p>POS</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/return_invoice/create"
                class="nav-link custom-link ">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Add Return Invoice</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/invoice?type=unpaid"
                class="nav-link custom-link ">
                <i class="fas fa-list nav-icon"></i>
                <p> Unpaid Invoices </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/invoice?type=paid"
                class="nav-link custom-link ">
                <i class="fas fa-list nav-icon"></i>
                <p> Paid Invoices </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/return_invoice"
                class="nav-link custom-link ">
                <i class="fas fa-list nav-icon"></i>
                <p> List Return Invoice </p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-file-invoice-dollar"></i>
            <p>
              Receipt
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/receipt/create"
                class="nav-link custom-link ">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Add Receipt</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/receipt"
                class="nav-link custom-link ">
                <i class="fas fa-list nav-icon"></i>
                <p> List Receipt </p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-credit-card"></i>
            <p>
              Payment
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/payment/create"
                class="nav-link custom-link ">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Add Payment</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/payment"
                class="nav-link custom-link ">
                <i class="fas fa-list nav-icon"></i>
                <p> List Payment </p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>
              Bill Report
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/account/bill_payment/create"
                class="nav-link custom-link ">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Add Bill Payment Request</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/account/bill_payment/index_payment"
                class="nav-link custom-link ">
                <i class="fas fa-list nav-icon"></i>
                <p> List Bill Payment Request</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Employee Accounts
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/account/employee/create"
                class="nav-link custom-link ">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Deposit Employee Salary</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/account/employee/disburse_salary"
                class="nav-link custom-link ">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Disburse Employee Salary</p>
              </a>
            </li>
        
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/account/employee/salary"
                class="nav-link custom-link ">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Update Employee Salary</p>
              </a>
            </li>
        
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/account/employee"
                class="nav-link custom-link ">
                <i class="fas fa-list nav-icon"></i>
                <p> List Employee Account </p>
              </a>
            </li>
                        


        {{-- <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Layout Options
              <i class="fas fa-angle-left right"></i>
              <span class="badge badge-info right">6</span>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/layout/top-nav.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Top Navigation</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Top Navigation + Sidebar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/layout/boxed.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Boxed</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Fixed Sidebar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/layout/fixed-topnav.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Fixed Navbar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/layout/fixed-footer.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Fixed Footer</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Collapsed Sidebar</p>
              </a>
            </li>
          </ul>
        </li> --}}


        {{-- <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Charts
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/charts/chartjs.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>ChartJS</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/charts/flot.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Flot</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/charts/inline.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Inline</p>
              </a>
            </li>
          </ul>
        </li> --}}


        {{-- <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tree"></i>
            <p>
              UI Elements
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/UI/general.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>General</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/UI/icons.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Icons</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/UI/buttons.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Buttons</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/UI/sliders.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Sliders</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/UI/modals.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Modals & Alerts</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/UI/navbar.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Navbar & Tabs</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/UI/timeline.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Timeline</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/UI/ribbons.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Ribbons</p>
              </a>
            </li>
          </ul>
        </li> --}}


        {{-- <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Forms
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/forms/general.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>General Elements</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/forms/advanced.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Advanced Elements</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/forms/editors.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Editors</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/forms/validation.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Validation</p>
              </a>
            </li>
          </ul>
        </li> --}}


        {{-- <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Tables
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/tables/simple.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Simple Tables</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/tables/data.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>DataTables</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/tables/jsgrid.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>jsGrid</p>
              </a>
            </li>
          </ul>
        </li> --}}
</ul>

        <li class="nav-header">EXAMPLES</li>
        <li class="nav-item">
          <a href="pages/calendar.html" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Calendar
              <span class="badge badge-info right">2</span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/gallery.html" class="nav-link">
            <i class="nav-icon far fa-image"></i>
            <p>
              Gallery
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-envelope"></i>
            <p>
              Mailbox
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/mailbox/mailbox.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Inbox</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/mailbox/compose.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Compose</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/mailbox/read-mail.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Read</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Pages
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('invoice') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Invoice</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('profile') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Profile</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/examples/e-commerce.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>E-commerce</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/examples/projects.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Projects</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/examples/project-add.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Project Add</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/examples/project-edit.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Project Edit</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/examples/project-detail.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Project Detail</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/examples/contacts.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Contacts</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-plus-square"></i>
            <p>
              Extras
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pages/examples/login.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Login</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/examples/register.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Register</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/examples/forgot-password.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Forgot Password</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/examples/recover-password.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Recover Password</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/examples/lockscreen.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Lockscreen</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Legacy User Menu</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/examples/language-menu.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Language Menu</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/examples/404.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Error 404</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/examples/500.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Error 500</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/examples/pace.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pace</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="pages/examples/blank.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Blank Page</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="starter.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Starter Page</p>
              </a>
            </li>
          </ul>
        </li>
        
        <li class="nav-header">LABELS</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-circle text-danger"></i>
            <p class="text">Important</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-circle text-warning"></i>
            <p>Warning</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-circle text-info"></i>
            <p>Informational</p>
          </a>
        </li>
        <li class="nav-header">MISCELLANEOUS</li>
        <li class="nav-item">
          <a href="https://adminlte.io/docs/3.0" class="nav-link">
            <i class="nav-icon fas fa-file"></i>
            <p>Documentation</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>