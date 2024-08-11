 <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
      
    >
      <!-- ============================================================== -->
      <!-- Topbar header - style you can find in pages.scss -->
      <!-- ============================================================== -->
      <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
          <div class="navbar-header  " data-logobg="skin5">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <a class="navbar-brand" href="/home">
              <!-- Logo icon -->
              <b class="logo1 ps-4">
                <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                <!-- Dark Logo icon -->
                <img
                
                  src="{{asset('assets/images/logo1.png')}}"
                  alt="homepage"
                  class="light-logo  "
                  width="170"
                  height="65"
                  
                  
                />
              </b>
              <!--End Logo icon -->

              <!-- Logo icon -->
              <!-- <b class="logo-icon"> -->
              <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
              <!-- Dark Logo icon -->
              <!-- <img src="../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

              <!-- </b> -->
              <!--End Logo icon -->
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a
              class="nav-toggler waves-effect waves-light d-block d-md-none"
              href="javascript:void(0)"
              ><i class="ti-menu ti-close"></i
            ></a>
          </div>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <div
            class="navbar-collapse collapse"
            id="navbarSupportedContent"
            data-navbarbg="skin5"
          >
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-start me-auto ">

            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-end">


              <!-- ============================================================== -->
              <!-- User profile and search -->
              <!-- ============================================================== -->
              <li class="nav-item dropdown">
                <a
                  class="
                    nav-link
                    dropdown-toggle
                    text-muted
                    waves-effect waves-dark
                    pro-pic
                  "
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                <span class="mr-2 d-none d-lg-inline text-white font-15"> {{ Auth::user()->name }}</span>
                  <img
                    src="{{asset('assets/images/users/1.jpg')}}"
                    alt="user"
                    class="rounded-circle"
                    width="31"
                  />
                </a>
                <ul
                  class="dropdown-menu dropdown-menu-end user-dd animated"
                  aria-labelledby="navbarDropdown"
                >
   
                  <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-power-off me-1 ms-1"></i>
                                        {{ __('ออกจากระบบ') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                </a>

                  <div class="dropdown-divider"></div>
        
                  <div class="ps-4 p-10">
                    <a
                      href="{{ url('/myprofile/') }}"
                      class="btn btn-sm btn-success btn-rounded text-white"
                      >ข้อมูลผู้ใช้งาน</a>
                  </div>
                </ul>
              </li>
              <!-- ============================================================== -->
              <!-- User profile and search -->
              <!-- ============================================================== -->
            </ul>
          </div>
        </nav>
      </header>
      <!-- ============================================================== -->
      <!-- End Topbar header -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <aside class="left-sidebar" data-sidebarbg="skin5">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="/home"
                  aria-expanded="false"
                  ><i class="mdi mdi-home"></i
                  ><span class="hide-menu">หน้าหลัก</span></a
                >
              </li>
              <!-- Admin -->
              @if( Auth::user()->role_id == '1') 
              
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="/profile/create"
                  aria-expanded="false"
                  ><i class="mdi mdi-account-plus"></i
                  ><span class="hide-menu">เพิ่มข้อมูลผู้เช่า</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark"
                  href="javascript:void(0)" 
                  aria-expanded="false"
                  ><i class="mdi mdi-view-dashboard"></i
                  ><span class="hide-menu">ข้อมูลห้องพัก </span></a
                >
                <ul aria-expanded="false" class="collapse first-level" >
                  <li class="sidebar-item">
                    <a href="/room/create" class="sidebar-link"
                      ><i class="mdi mdi-note-plus"></i
                      ><span class="hide-menu"> เพิ่มห้องพัก </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="/room" class="sidebar-link"
                      ><i class="mdi mdi-note"></i
                      ><span class="hide-menu"> ข้อมูลห้องพัก </span></a
                    >
                  </li>
                </ul>
              </li>
       


              <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark"
                  href="javascript:void(0)" 
                  aria-expanded="false"
                  ><i class="mdi mdi-receipt"></i
                  ><span class="hide-menu">สัญญาเช่า </span></a
                >
                <ul aria-expanded="false" class="collapse first-level" >
                  <li class="sidebar-item">
                    <a href="/lease/create" class="sidebar-link"
                      ><i class="mdi mdi-note-plus"></i
                      ><span class="hide-menu"> จัดทำสัญญาเช่า </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="/lease/" class="sidebar-link"
                      ><i class="mdi mdi-note"></i
                      ><span class="hide-menu"> ข้อมูลสัญญาเช่า </span></a
                    >
                  </li>
                </ul>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark"
                  href="javascript:void(0)" 
                  aria-expanded="false"
                  ><i class="mdi mdi-barcode"></i
                  ><span class="hide-menu">ใบแจ้งหนี้ </span></a
                >
                <ul aria-expanded="false" class="collapse first-level" >
                  <li class="sidebar-item">
                    <a href="/invoices/create" class="sidebar-link"
                      ><i class="mdi mdi-note-plus"></i
                      ><span class="hide-menu"> จัดทำใบแจ้งหนี้ </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="/invoices/" class="sidebar-link"
                      ><i class="mdi mdi-note"></i
                      ><span class="hide-menu"> ข้อมูลใบแจ้งหนี้ </span></a
                    >
                  </li>
                </ul>
              </li>

              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="/upload"
                  aria-expanded="false"
                  ><i class="mdi mdi-cloud-upload"></i
                  ><span class="hide-menu">ข้อมูลสลิปค่าเช่า</span></a
                >
              </li>

              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="/checkout"
                  aria-expanded="false"
                  ><i class="mdi mdi-account-off"></i
                  ><span class="hide-menu">ข้อมูลแจ้งย้ายออก</span></a
                >
              </li>

              <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark"
                  href="javascript:void(0)" 
                  aria-expanded="false"
                  ><i class="mdi mdi-note-multiple"></i
                  ><span class="hide-menu">รายงาน </span></a
                >
                <ul aria-expanded="false" class="collapse first-level" >
                  <li class="sidebar-item">
                    <a href="/report1" class="sidebar-link"
                      ><i class="mdi mdi-note"></i
                      ><span class="hide-menu"> รายงานสรุปรายได้ประจำเดือน</span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="/reportRoom" class="sidebar-link"
                      ><i class="mdi mdi-note"></i
                      ><span class="hide-menu"> รายงานสถานะห้องพัก </span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="/reportUser" class="sidebar-link"
                      ><i class="mdi mdi-note"></i
                      ><span class="hide-menu"> รายงานข้อมูลผู้เช่า </span></a
                    >
                  </li>
                </ul>
              </li>

              @endif
              <!-- Admin -->

              <!-- Guest -->
              @if( Auth::user()->role_id != '1')        
              <li class="sidebar-item">
       
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="/myprofile/"
                  aria-expanded="false"
                  ><i class="mdi mdi-account"></i
                  ><span class="hide-menu">ข้อมูลผู้เช่า</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="/room/"
                  aria-expanded="false"
                  ><i class="mdi mdi-view-dashboard"></i
                  ><span class="hide-menu">ข้อมูลห้องพัก</span></a
                >
              </li>
       
              <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark"
                  href="javascript:void(0)" 
                  aria-expanded="false"
                  ><i class="mdi mdi-chart-pie"></i
                  ><span class="hide-menu">แสดงค่าเช่า</span></a
                >
                <ul aria-expanded="false" class="collapse first-level" >
                  <li class="sidebar-item">
                    <a href="/myInvoice" class="sidebar-link"
                      ><i class="mdi mdi-note-plus"></i
                      ><span class="hide-menu">ค่าเช่าเดือนปัจจุบัน</span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="/myInvoiceIndex/" class="sidebar-link"
                      ><i class="mdi mdi-note"></i
                      ><span class="hide-menu"> ค่าเช่าทั้งหมด </span></a
                    >
                  </li>
                </ul>
              </li>


              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="/payment/"
                  aria-expanded="false"
                  ><i class="mdi mdi-barcode-scan"></i
                  ><span class="hide-menu">ชำระเงิน</span></a
                >
              </li>

              <li class="sidebar-item">
                <a
                  class="sidebar-link has-arrow waves-effect waves-dark"
                  href="javascript:void(0)" 
                  aria-expanded="false"
                  ><i class="mdi mdi-cloud-upload"></i
                  ><span class="hide-menu">อัพโหลดสลิปค่าเช่า</span></a
                >
                <ul aria-expanded="false" class="collapse first-level" >
                  <li class="sidebar-item">
                    <a href="/upload/create" class="sidebar-link"
                      ><i class="mdi mdi-note-plus"></i
                      ><span class="hide-menu">อัพโหลดสลิปค่าเช่า</span></a
                    >
                  </li>
                  <li class="sidebar-item">
                    <a href="/userUploads/" class="sidebar-link"
                      ><i class="mdi mdi-note"></i
                      ><span class="hide-menu"> สลิปการโอนทั้งหมด </span></a
                    >
                  </li>
                </ul>
              </li>

           

              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="/checkout/create"
                  aria-expanded="false"
                  ><i class="mdi mdi-close-outline"></i
                  ><span class="hide-menu">แจ้งย้ายออก</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="/resetpassword/{{ Auth::user()->id }}/edit"
                  aria-expanded="false"
                  ><i class="mdi mdi-key-variant"></i
                  ><span class="hide-menu">เปลี่ยนรหัสผ่าน</span></a
                >
              </li>
             
              @endif
              <!-- Guest -->

              <li class="sidebar-item mt-4 ">
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    <i class="btn btn-cyan d-flex align-items-center text-white mdi mdi-exit-to-app ">
                    <span class="hide-menu">ออกจากระบบ</span></i>
                </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
              </li>
            </ul>
          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>
      <!-- ============================================================== -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
     <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title"></h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"></a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                     
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->