<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{URL::to('/home')}}" class="brand-link">
      <img src="{{('backend/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      @if(Auth::user()->role == 1 )
      <span class="brand-text font-weight-light">Admin Panel</span>
      @endif
      @if(Auth::user()->role == 2 )
      <span class="brand-text font-weight-light">Picker Panel</span>
      @endif
      @if(Auth::user()->role == 3 )
      <span class="brand-text font-weight-light">Customer Panel</span>
      @endif

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{('backend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{URL::to('/home')}}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


@if (Auth::user()->role == 1 )
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-barcode"></i>
        <p>
          PRODUCT
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{URL::to('/list_product')}}" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Product List
              <!-- <span class="right badge badge-danger">New</span> -->
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{URL::to('/check_new_product')}}" class="nav-link">
            <i class="nav-icon fas fa-bell"></i>
            <p>
              New Product Request
              <!-- <span class="right badge badge-danger">New</span> -->
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{URL::to('/review_request')}}" class="nav-link">
            <i class="nav-icon fas fa-bell"></i>
            <p>
              Restock Request
              <!-- <span class="right badge badge-danger">New</span> -->
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{URL::to('/add_product')}}" class="nav-link">
            <i class="nav-icon fas fa-plus"></i>
            <p>
              Add Product
              <!-- <span class="right badge badge-danger">New</span> -->
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="{{URL::to('/quantity_list')}}" class="nav-link">
            <i class="nav-icon fas fa-chart-line"></i>
            <p>
              Product Stock Level
              <!-- <span class="right badge badge-danger">New</span> -->
            </p>
          </a>
        </li>

      </ul>
    </li>



    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-male"></i>
        <p>
          PICKER
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
     
        <li class="nav-item">
          <a href="{{URL::to('/picker_status')}}" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Picker Status
              <!-- <span class="right badge badge-danger">New</span> -->
            </p>
          </a>
        </li>

                            <li class="nav-item">
                                <a href="{{ URL::to('/cart_index') }}" class="nav-link">
                                    <i class="nav-icon fas fa-edit"></i>
                                    <p>
                                        Assign Product
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>

                        </ul>
                    </li>


                    <li class="nav-item">
                        <a href="{{ URL::to('/delivery_order_list') }}" class="nav-link">
                            <i class="nav-icon fas fa-truck"></i>
                            <p>
                                Delivery Order List
                                <!-- <span class="right badge badge-danger">New</span> -->
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{ URL::to('/receive-return-stock') }}" class="nav-link">
                            <i class="nav-icon fas fa-reply"></i>
                            <p>
                                Returned Order
                                <!-- <span class="right badge badge-danger">New</span> -->
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{ URL::to('/racks') }}" class="nav-link">
                            <i class="nav-icon fas fa-server"></i>
                            <p>
                                Rack List
                                <!-- <span class="right badge badge-danger">New</span> -->
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ URL::to('/floors') }}" class="nav-link">
                            <i class="nav-icon fas fa-server"></i>
                            <p>
                                Floor List
                                <!-- <span class="right badge badge-danger">New</span> -->
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ URL::to('/company_list') }}" class="nav-link">
                            <i class="nav-icon fas fa-suitcase"></i>
                            <p>
                                Company List
                                <!-- <span class="right badge badge-danger">New</span> -->
                            </p>
                        </a>
                    </li>

          <li class="nav-item">
            <a href="{{URL::to('/user_list')}}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                User List
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
        
@endif


@if (Auth::user()->role == 2 )
@php
  $sidebarController = new App\Http\Controllers\SidebarController();
@endphp

          <li class="nav-item">
              <a href="{{URL::to('/picker_task')}}" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>
                      Picker Task
                      <span class="right badge badge-danger" id="picker-tasks-count">{{ $sidebarController->getCountPickerTasks() }}</span>
                  </p>
              </a>
          </li>

          <li class="nav-item">
            <a href="{{URL::to('/return-order-task')}}" class="nav-link">
                <i class="nav-icon fas fa-truck"></i>
                <p>
                    Return Order Task
                    <span class="right badge badge-danger" id="picker-return-count">{{ $sidebarController->getCountPickerReturn() }}</span>
                </p>
            </a>
        </li>

          <li class="nav-item">
            <a href="{{URL::to('/picker/history')}}" class="nav-link">
              <i class="nav-icon fas fa-history"></i>
              <p>
                History
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{URL::to('/quantity_list')}}" class="nav-link">
              <i class="nav-icon fas fa-chart-line"></i>
              <p>
                Product Stock Level
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>

@endif



@if (Auth::user()->role == 3 )

<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-barcode"></i>
    <p>
      YOUR PRODUCT
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
 
    <li class="nav-item">
      <a href="{{URL::to('/customer_add_product')}}" class="nav-link">
        <i class="nav-icon fas fa-plus"></i>
        <p>
          Add New Product
          <!-- <span class="right badge badge-danger">New</span> -->
        </p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{URL::to('/mystatus_new_product')}}" class="nav-link">
        <i class="nav-icon fas fa-bell"></i>
        <p>
          Status of Approval
          <!-- <span class="right badge badge-danger">New</span> -->
        </p>
      </a>
    </li>

                            <li class="nav-item">
                                <a href="{{ URL::to('/list_product') }}" class="nav-link">
                                    <i class="nav-icon fas fa-server"></i>
                                    <p>
                                        Product List
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::to('/request_restock_status') }}" class="nav-link">
                                    <i class="nav-icon fas fa-bell"></i>
                                    <p>
                                        Product Restock Status
                                        {{-- oonly display existing item --}}
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ URL::to('/my_stock_level') }}" class="nav-link">
                                    <i class="nav-icon fas fa-chart-line"></i>
                                    <p>
                                        Stock Level
                                        <!-- <span class="right badge badge-danger">New</span> -->
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas  fa-file"></i>
                                    <p>
                                        Monthly Report
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ URL::to('/report') }}" class="nav-link">
                                            <i class="nav-icon fas    fa-cloud"></i>
                                            <p>
                                                View Monthly Report
                                                <!-- <span class="right badge badge-danger">New</span> -->
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ URL::to('/report-create') }}" class="nav-link">
                                            <i class="nav-icon fas  fa-angle-double-down"></i>
                                            <p>
                                                Download Monthly Report
                                                <!-- <span class="right badge badge-danger">New</span> -->
                                            </p>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </li>


<li class="nav-item">
  <a href="#" class="nav-link">
    <i class="nav-icon fas fa-reply"></i>
    <p>
      RETURN ORDER
      <i class="right fas fa-angle-left"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
 
    <li class="nav-item">
      <a href="{{URL::to('/return-stock-form')}}" class="nav-link">
        <i class="nav-icon fas fa-edit"></i>
        <p>
          Return Order Form
          <!-- <span class="right badge badge-danger">New</span> -->
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="{{URL::to('/return-stock-status')}}" class="nav-link">
        <i class="nav-icon fas fa-bell"></i>
        <p>
          Return Order Status
          <!-- <span class="right badge badge-danger">New</span> -->
        </p>
      </a>
    </li>

  </ul>
</li>

<li class="nav-item">
  <a href="{{URL::to('/delivery_form')}}" class="nav-link">
    <i class="nav-icon fas fa-edit"></i>
    <p>
      Delivery Form (future feature)
      <!-- <span class="right badge badge-danger">New</span> -->
    </p>
  </a>
</li>

<li class="nav-item">
  <a href="{{URL::to('/detail_company')}}" class="nav-link">
    <i class="nav-icon fas fa-suitcase"></i>
    <p>
      Company Detail
      <!-- <span class="right badge badge-danger">New</span> -->
    </p>
  </a>
</li>
<li class="nav-item">
  <a href="{{URL::to('/add_company')}}" class="nav-link">
    <i class="nav-icon fas fa-plus"></i>
    <p>
      Add Company
      <!-- <span class="right badge badge-danger">New</span> -->
    </p>
  </a>
</li>

          </li>
          
        
@endif


<li class="nav-item">
<a href="{{ route('logout') }}"
onclick="event.preventDefault();
document.getElementById('logout-form').submit();" class="nav-link">
<i class="nav-icon fas fa-arrow-left"></i>
  <p> Logout
   <!-- <span class="right badge badge-danger">New</span> -->
  </p>
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
@csrf
</form>
</li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>