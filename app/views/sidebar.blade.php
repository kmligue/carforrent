<div class="navbar-default sidebar" role="navigation">
  <div class="sidebar-nav navbar-collapse">
      <ul class="nav" id="side-menu">
          <li>
              <a class="@if(Request::path() == 'admin/dashboard') active @endif" href="{{ URL::to('admin/dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
          </li>
          <li>
              <a class="@if(Request::path() == 'admin/car') active @endif" href="{{ URL::to('admin/car') }}"><i class="fa fa-car fa-fw"></i> Cars</a>
          </li>
          <li>
              <a class="@if(Request::path() == 'admin/location') active @endif" href="{{ URL::to('admin/location') }}"><i class="fa fa-car fa-fw"></i> Locations</a>
          </li>
          <li>
              <a class="@if(Request::path() == 'admin/booking') active @endif" href="{{ URL::to('admin/booking') }}"><i class="fa fa-table fa-fw"></i> Bookings</a>
          </li>
      </ul>
  </div>
  <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->