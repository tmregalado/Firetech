<?php

include_once('includes/config.php');
include('../includes/login.inc.php');


?>        <!-- Sidebar -->

<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">
<?php $query=mysqli_query($con,"select * from tblsite");
while($row=mysqli_fetch_array($query)){
$logo=$row['siteLogo']; 
$wtitle=$row['siteTitle'];
}  ?>


            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"  href="dashboard.php">

                <div class="sidebar-brand-text mx-3">Fire Tech </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
<?php


if ($_SESSION['pos']== 'admin') {

?>  

        <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

        <li class="nav-item"  >
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages1" aria-expanded="true" aria-controls="collapsePages1">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Fire Control Teams</span>
                </a>
                <div id="collapsePages1" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="add-team.php">Add</a>
                        <a class="collapse-item" href="manage-teams.php">Manage</a>
                    </div>
                </div>
            </li>
   


        <li class="nav-item" >
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-fire"></i>
                    <span>Fire Alerts</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="new-requests.php">New  Requests</a>
                        <a class="collapse-item" href="assigned-requests.php">Assigned Requests</a>
                         <a class="collapse-item" href="all-requests.php">All Requests</a>
                    </div>
                </div>
            </li>


        <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages2">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Reports</span>
                </a>
                <div id="collapsePages2" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="bwdates-report-ds.php">By Dates</a>
                        <a class="collapse-item" href="search-report.php">Search</a>
                    </div>
                </div>
            </li>


        <li class="nav-item">
                <a class="nav-link" href="data.php">
                     <i class=" fas fa-map-marker-alt"></i>
                    <span>Tracking location</span></a>
            </li>




         <li class="nav-item">
                <a class="nav-link" href="manage-site.php">
                      <i class="fas fa-fw fa-cog"></i>
                    <span>Manage Website</span></a>
            </li>


        <li class="nav-item">
                <a class="nav-link" href="FSIC.php">
                      <i class="fas fa-fw fa-cog"></i>
                    <span>FSIC Record</span></a>
            </li>

<?php }

else { ?>

     <li class="nav-item">
                <a class="nav-link" href="./dashboard.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <li class="nav-item">
                <a class="nav-link" href="./businessrecord.php">
                <i class="fa fa-building" aria-hidden="true"></i>
                <span>Business Record</span></a>
        </li>

        <li class="nav-item">
                <a class="nav-link" href="./documents.php">
                <i class="fa fa-file" aria-hidden="true"></i>
                <span>Documents</span></a>
        </li>
            
    <?php } ?>        



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline" >
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
  
