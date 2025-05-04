<nav id="sidebar" class="sidebar-wrapper">

<!-- Sidebar profile starts -->
<div class="sidebar-profile">
  <img src="/labreport/labs/assets/images/user4.png" class="img-shadow img-3x me-3 rounded-5" alt="Hospital Admin Templates">
  <div class="m-0">
    <h5 class="mb-1 profile-name text-nowrap text-truncate">
        <?php

echo $_SESSION['user']['name'];
        ?>
    </h5>
    <p class="m-0 small profile-name text-nowrap text-truncate">Dept Admin</p>
  </div>
</div>
<!-- Sidebar profile ends -->

<!-- Sidebar menu starts -->
<div class="sidebarMenuScroll">
  <ul class="sidebar-menu">

    <li class="active current-page">
      <a href="/labreport/admin/">
        <i class="ri-home-smile-2-line"></i>
        <span class="menu-text">Dashboard</span>
      </a>
    </li>

    <li class="treeview">
      <a href="#!">
        <i class="ri-stethoscope-line"></i>
        <span class="menu-text">Category</span>
      </a>
      <ul class="treeview-menu">

        <li>
          <a href="/labreport/admin/categories/">Category List</a>
        </li>

        <li>
          <a href="/labreport/admin/categories/">Add Category</a>
        </li>

        <li>
          <a href="/labreport/admin/categories/">Edit Categoryr</a>
        </li>
      </ul>
    </li>


    <li class="treeview">
      <a href="#!">
        <i class="ri-heart-pulse-line"></i>
        <span class="menu-text">Test</span>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="/labreport/admin/test/">Test List</a>
        </li>
        <li>
          <a href="/labreport/admin/addtest/">Add Test</a>
        </li>

      </ul>
    </li>


    <li class="treeview">
      <a href="#!">
        <i class="ri-dossier-line"></i>
        <span class="menu-text">Lab Requests</span>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="/labreport/admin/requests/">Pending Requests</a>
        </li>
        <li>
          <a href="/labreport/admin/requests/requestlist.php">All Labs</a>
        </li>

      </ul>
    </li>


    <!-- <li class="treeview">
      <a href="#!">
        <i class="ri-nurse-line"></i>
        <span class="menu-text">Staff</span>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="/labreport/labs/staff/">Staff List</a>
        </li>
        <li>
          <a href="/labreport/labs/staff/">Add Staff</a>
        </li>
        <li>
          <a href="/labreport/labs/staff/">Edit Staff Details</a>
        </li>
      </ul>
    </li> -->

    <li class="treeview">
      <a href="#!">
        <i class="ri-dossier-line"></i>
        <span class="menu-text">Doctor Requests</span>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="/labreport/admin/doctor">Pending</a>
        </li>
        <li>
          <a href="/labreport/admin/doctor/alldoctors.php">All Doctors</a>
        </li>


      </ul>
    </li>



  







    <li>
      <a href="/labreport/admin/backup/">
      <i class="ri-money-dollar-circle-line"></i>
        <span class="menu-text">Backup</span>
      </a>
    </li>




    

    <li class="treeview">
      <a href="#!">
        <i class="ri-login-circle-line"></i>
        <span class="menu-text">Login/Signup</span>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="/labreport/admin/logout.php">Logout</a>
        </li>


      </ul>
    </li>





  </ul>
</div>
<!-- Sidebar menu ends -->

<!-- Sidebar contact starts -->
<div class="sidebar-contact">
  <p class="fw-light mb-1 text-nowrap text-truncate">Emergency Contact</p>
  <h5 class="m-0 lh-1 text-nowrap text-truncate">0343-9187565</h5>
  <i class="ri-phone-line"></i>
</div>
<!-- Sidebar contact ends -->

</nav>