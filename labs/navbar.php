<nav id="sidebar" class="sidebar-wrapper">

<!-- Sidebar profile starts -->
<div class="sidebar-profile">
  <img src="/labreport/labs/assets/images/user6.png" class="img-shadow img-3x me-3 rounded-5" alt="Hospital Admin Templates">
  <div class="m-0">
    <h5 class="mb-1 profile-name text-nowrap text-truncate">
        <?php
if(array_key_exists('name',$_SESSION['user'])){
  echo $_SESSION['user']['name'];
}else{
echo $_SESSION['user']['d_name'];
}
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
      <a href="/labreport/labs/">
        <i class="ri-home-smile-2-line"></i>
        <span class="menu-text">Dashboard</span>
      </a>
    </li>
    <?php
if(array_key_exists('name',$_SESSION['user'])){

        ?>
    <li class="treeview">
      <a href="#!">
        <i class="ri-stethoscope-line"></i>
        <span class="menu-text">Test Management</span>
      </a>
      <ul class="treeview-menu">

        <li>
          <a href="/labreport/labs/addtest/">Add Test</a>
        </li>

        <li>
          <a href="/labreport/labs/test/">All Test List</a>
        </li>


      </ul>
    </li>


    <li class="treeview">
      <a href="#!">
        <i class="ri-heart-pulse-line"></i>
        <span class="menu-text">Patients</span>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="/labreport/labs/patients/">All Patients</a>
        </li>
        <li>
          <a href="/labreport/labs/patients/addpatient.php">Add Patients</a>
        </li>
        <li>
          <a href="edit-patient.html">Edit Patient Details</a>
        </li>
      </ul>
    </li>


    <li class="treeview">
      <a href="#!">
        <i class="ri-dossier-line"></i>
        <span class="menu-text">Reports</span>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="/labreport/labs/reports/">Pending Reports</a>
        </li>
        <li>
          <a href="/labreport/labs/previous/">Previous Reports</a>
        </li>

      </ul>
    </li>


    <li class="treeview">
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
    </li>

    <!-- <li class="treeview">
      <a href="#!">
        <i class="ri-dossier-line"></i>
        <span class="menu-text">Appointments</span>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="appointments.html">Appointments</a>
        </li>
        <li>
          <a href="appointments-list.html">Appointments List</a>
        </li>
        <li>
          <a href="book-appointment.html">Book Appointment</a>
        </li>
        <li>
          <a href="edit-appointment.html">Edit Appointment</a>
        </li>
      </ul>
    </li> -->



  







    <li>
      <a href="/labreport/labs/expense/">
      <i class="ri-money-dollar-circle-line"></i>
        <span class="menu-text">Expense</span>
      </a>
    </li>


    <li>
      <a href="/labreport/labs/company/">
        <i class="ri-settings-5-line"></i>
        <span class="menu-text">Account Settings</span>
      </a>
    </li>

<?php
}else{
?>
<li class="treeview">
      <a href="#!">
        <i class="ri-dossier-line"></i>
        <span class="menu-text">Patients</span>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="/labreport/labs/doctors/">Pending Patients</a>
        </li>
        <li>
          <a href="/labreport/labs/doctors/complete.php">Complete Patients</a>
        </li>

      </ul>
    </li>

<?php
}
?>
    

    <li class="treeview">
      <a href="#!">
        <i class="ri-login-circle-line"></i>
        <span class="menu-text">Login/Signup</span>
      </a>
      <ul class="treeview-menu">
        <li>
          <a href="/labreport/admin/logout.php">Logout</a>
        </li>
        <li>
          <a href="signup.html">Signup</a>
        </li>
        <li>
          <a href="forgot-password.html">Forgot Password</a>
        </li>
        <li>
          <a href="reset-password.html">Reset Password</a>
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