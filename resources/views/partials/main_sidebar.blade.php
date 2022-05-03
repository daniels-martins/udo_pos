<aside class="main-sidebar sidebar-dark-primary elevation-4 scrollable-y">

  <!-- Brand Logo -->
  <a href="{{ route('dashboard') }}" class="brand-link">
    <img src="/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) POS TEMINAL-->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        {{-- <a href="{{ route('pos') }}" class="d-block">{{ auth()->user()->email ??  auth()->guard('emp')->user()->username ?? 'no auth' }} </a> --}}
        <a href="{{ route('pos') }}" class="d-block">{{ auth()->user()->email ??  auth()->guard('web')->user()->username ?? 'no auth' }} </a>

      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2 scrollable-y">

      <ul class="nav nav-pills nav-sidebar flex-column scrollable-y" data-widget="treeview" role="menu" data-accordion="false">

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
              <a href="{{ route('profiles.index') }}" class="nav-link active">
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
              <a href="{{ route('employees.create') }}" class="nav-link custom-link ">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Add Employee </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{  route('employees.index') }}" class="nav-link custom-link ">

                <i class="fas fa-list nav-icon"></i>
                <p> List Employee </p>
              </a>
            </li>
          </ul>
        </li>


        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-plus-square"></i>
            <p>
              Product And Customers
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
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
                  <a href="{{ route('products.create') }}" class="nav-link custom-link ">
                    <i class="fas fa-plus-circle nav-icon"></i>
                    <p>Add Product </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('products.index') }}" class="nav-link custom-link ">
                    <i class="fas fa-list nav-icon"></i>
                    <p> List Product </p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>

                <p>
                  <i class="fas fa-angle-left right"></i>
                  Customer
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('customers.create') }}" class="nav-link custom-link ">
                    <i class="fas fa-plus-circle nav-icon"></i>
                    <p>Add Customer </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('customers.index') }}" class="nav-link custom-link ">
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
                  <a href="{{ route('categories.create') }}" class="nav-link custom-link ">
                    <i class="fas fa-plus-circle nav-icon"></i>
                    <p>Add Category </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('categories.index') }}" class="nav-link custom-link ">

                    <i class="fas fa-list nav-icon"></i>
                    <p> List Category </p>
                  </a>
                </li>
              </ul>
            </li>


            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/employee" class="nav-link custom-link ">
                <i class="fas fa-list nav-icon"></i>
                <p> List Father </p>
              </a>
            </li>
          </ul>
        </li>

        
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fa fa-plus-square"></i>
            <p>
              Tools
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-boxes"></i>
                <p>
                  Measurement Scales
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('scales.create') }}" class="nav-link custom-link ">
                    <i class="fas fa-plus-circle nav-icon"></i>
                    <p>Add Measurement Scale </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('scales.index') }}" class="nav-link custom-link ">
                    <i class="fas fa-list nav-icon"></i>
                    <p> List Measurement Scale </p>
                  </a>
                </li>
              </ul>
            </li>

            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-users"></i>

                <p>
                  <i class="fas fa-angle-left right"></i>
                  Stores
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('stores.create') }}" class="nav-link custom-link ">
                    <i class="fas fa-plus-circle nav-icon"></i>
                    <p>Add Store </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('stores.index') }}" class="nav-link custom-link ">
                    <i class="fas fa-list nav-icon"></i>
                    <p> List Stores </p>
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
                  <a href="{{ route('categories.create') }}" class="nav-link custom-link ">
                    <i class="fas fa-plus-circle nav-icon"></i>
                    <p>Add Category </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('categories.index') }}" class="nav-link custom-link ">

                    <i class="fas fa-list nav-icon"></i>
                    <p> List Category </p>
                  </a>
                </li>
              </ul>
            </li>


            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/employee" class="nav-link custom-link ">
                <i class="fas fa-list nav-icon"></i>
                <p> List Father </p>
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
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/inventory_adjustment/create" class="nav-link custom-link ">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Add Inventory Adjustment</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/inventory_adjustment" class="nav-link custom-link ">
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
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/supplier/create" class="nav-link custom-link ">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Add Supplier</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/supplier" class="nav-link custom-link ">
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
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/purchase/create" class="nav-link custom-link ">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Add Purchase</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/return_purchase/create" class="nav-link custom-link ">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p> Add Return Purchase </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/purchase" class="nav-link custom-link ">
                <i class="fas fa-list nav-icon"></i>
                <p> List Purchase </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/return_purchase" class="nav-link custom-link ">
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
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/sale/createbyname" class="nav-link custom-link ">
                <i class="fas fa-th-large nav-icon"></i>
                <p>POS</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('invoice') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Invoice</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/return_invoice/create" class="nav-link custom-link ">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Add Return Invoice</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/invoice?type=unpaid" class="nav-link custom-link ">
                <i class="fas fa-list nav-icon"></i>
                <p> Unpaid Invoices </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/invoice?type=paid" class="nav-link custom-link ">
                <i class="fas fa-list nav-icon"></i>
                <p> Paid Invoices </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/return_invoice" class="nav-link custom-link ">
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
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/receipt/create" class="nav-link custom-link ">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Add Receipt</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/receipt" class="nav-link custom-link ">
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
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/payment/create" class="nav-link custom-link ">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Add Payment</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/payment" class="nav-link custom-link ">
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
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/account/bill_payment/create" class="nav-link custom-link ">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Add Bill Payment Request</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/account/bill_payment/index_payment" class="nav-link custom-link ">
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
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/account/employee/create" class="nav-link custom-link ">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Deposit Employee Salary</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/account/employee/disburse_salary" class="nav-link custom-link ">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Disburse Employee Salary</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/account/employee/salary" class="nav-link custom-link ">
                <i class="fas fa-plus-circle nav-icon"></i>
                <p>Update Employee Salary</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="https://apps.bitspecksolutions.com/shop/posshop/posshop-tm-V1.0/public/admin/account/employee" class="nav-link custom-link ">
                <i class="fas fa-list nav-icon"></i>
                <p> List Employee Account </p>
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
