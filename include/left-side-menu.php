<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>
                    <a href="dashboard.php">
                        <i class="mdi mdi-view-dashboard"></i> <span> Dashboard </span>
                    </a>
                </li>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 1) { ?>
                <li>
                    <a href="employees.php">
                        <i class="mdi mdi-account-group"></i> <span> Employees </span>
                    </a>
                </li>
                <?php } ?>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 1 || $_SESSION['role'] == 0) { ?>
                <li>
                    <a href="javascript: void(0);"><i class="mdi mdi-account-group"></i><span> Shippers </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="shipper-subshippers.php">Shippers</a></li>
                         
                    </ul>
                </li>
                <?php } ?>
                <li>
                    <a href="javascript: void(0);"><i class="mdi mdi-account-card-details"></i><span> Shipments </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                         <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 1 || $_SESSION['role'] == 0) { ?>
                        <li><a href="add-shipper.php">Add</a></li>
                        <li><a href="shipper-list.php">List</a></li>  
                        <?php } ?>  
                    </ul>
                </li>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 1) { ?>
                <li>
                    <a href="javascript: void(0);"><i class=" dripicons-document-edit"></i><span> Biils </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="search-update-bill.php">Search & Update</a></li>
                        <li><a href="bill-list.php">List</a></li>    
                    </ul>
                </li>
                <?php } ?>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 1) { ?>
                <li>
                    <a href="javascript: void(0);"><i class="  mdi mdi-cash-multiple"></i><span> Invoice </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="pay-bill.php">Create</a></li>
                        <li><a href="shipper-payments-list.php">List</a></li>    
                    </ul>
                </li>
                <?php } ?>
                <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 1) { ?>
                <li>
                    <a href="javascript: void(0);"><i class="mdi mdi-cash-multiple"></i><span> Statement </span> <span class="menu-arrow"></span></a>
                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="shipper-statement.php">Shipper Statement</a></li>
                        <li><a href="serach-statement.php">Search Statement</a></li>
                    </ul>
                </li>
                <?php } ?>
                
            </ul>
        </div>
        <!-- Sidebar -->

        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>