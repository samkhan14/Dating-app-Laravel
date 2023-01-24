<!--sidebar-menu-->
<div id="sidebar"><a href="{{ url('/admin/dashboard')}}" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="active"><a href="{{ url('/admin/dashboard')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <!-- <li> <a href="#"><i class="icon icon-signal"></i> <span>Members </span>1</a> </li>
    <li> <a href="{{ url('/admin/view-members')}}"><i class="icon icon-inbox"></i> <span>View Members</span></a> </li> -->
    <!-- <li><a href="#"><i class="icon icon-th"></i> <span></span></a></li>
    <li><a href=""><i class="icon icon-fullscreen"></i> <span></span></a></li>
     -->

     <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Members</span> <span class="label label-important">3</span></a>
       <ul>
         <li><a href="{{ url('/admin/add-members')}}">Add Members</a></li>
         <li><a href="{{ url('/admin/view-members')}}">View Members</a></li>
         <!-- <li><a href="form-wizard.html">Form with Wizard</a></li> -->
       </ul>     
     </li>

     <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Users</span> <span class="label label-important">3</span></a>      
      <ul>
        <li><a href="{{ url('/admin/add-members')}}">Add Users</a></li>
        <li><a href="{{ url('/admin/view-user')}}">View Users</a></li>
        <!-- <li><a href="form-wizard.html">Form with Wizard</a></li> -->
      </ul>     
    </li>

    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Services</span> <span class="label label-important">3</span></a>
      <ul>
        <li><a href="{{ url('/admin/add-services')}}">Add Services</a></li>
        <li><a href="{{ url('/admin/view-services')}}">View Services</a></li>
        <!-- <li><a href="form-wizard.html">Form with Wizard</a></li> -->
      </ul>     
    </li>

    <!-- <li><a href="buttons.html"><i class="icon icon-tint"></i> <span>Buttons &amp; icons</span></a></li>
    <li><a href="interface.html"><i class="icon icon-pencil"></i> <span>Eelements</span></a></li>
    <li class="submenu"> <a href="#"><i class="icon icon-file"></i> <span>Addons</span> <span class="label label-important">5</span></a>
     --> <!--  <ul>
        <li><a href="index2.html">Dashboard2</a></li>
        <li><a href="gallery.html">Gallery</a></li>
        <li><a href="calendar.html">Calendar</a></li>
        <li><a href="invoice.html">Invoice</a></li>
        <li><a href="chat.html">Chat option</a></li>
      </ul> -->
    </li>
    <!-- <li class="submenu"> <a href="#"><i class="icon icon-info-sign"></i> <span>Error</span> <span class="label label-important">4</span></a>
      <ul>
        <li><a href="error403.html">Error 403</a></li>
        <li><a href="error404.html">Error 404</a></li>
        <li><a href="error405.html">Error 405</a></li>
        <li><a href="error500.html">Error 500</a></li>
      </ul>
    </li>
    <li class="content"> <span>Monthly Bandwidth Transfer</span>
      <div class="progress progress-mini progress-danger active progress-striped">
        <div style="width: 77%;" class="bar"></div>
      </div>
      <span class="percent">77%</span>
      <div class="stat">21419.94 / 14000 MB</div>
    </li>
    <li class="content"> <span>Disk Space Usage</span>
      <div class="progress progress-mini active progress-striped">
        <div style="width: 87%;" class="bar"></div>
      </div>
      <span class="percent">87%</span>
      <div class="stat">604.44 / 4000 MB</div>
    </li> -->
  </ul>
</div>
<!--sidebar-menu-->