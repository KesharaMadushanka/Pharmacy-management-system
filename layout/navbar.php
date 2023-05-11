<!--start navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="../views/admin.php">Welcome, <?php echo ($_SESSION['userName']) ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- emp managment dropdown start-->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Employee Management
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#" id="addEmp">Add New Employee</a></li>
                        <li><a class="dropdown-item" href="#" id="viewEmp">View Employee</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#" id="login">Login Management</a></li>
                    </ul>
                </li>
                <!-- emp managment dropdown end-->

                <!-- Medicine managment dropdown start-->

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Medicine Management
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#" id="addMed">Add New Medicine</a></li>
                        <li><a class="dropdown-item" href="../views/medicine/viewMed.php">View Medicine</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#" id="medPrice">Medicine Price List</a></li>
                        <li><a class="dropdown-item" href="#" id="medBuyingPrice">Medicine Buying Price List</a></li>

                    </ul>
                </li>

                <!-- Medicine managment dropdown stop-->

                <!-- stock management dropdown-->

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Inventory Management
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../views/stock/viewStock.php">View Stock Records</a></li>
                        <li><a class="dropdown-item" href="../views/stock/viewInventory.php">View Inventory</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="../views/stock/updateStock.php">Update Stocks</a></li>
                    </ul>
                </li>

                <!-- stock manegment end-->
            </ul>

            <a href="../route/users/logout.php" onclick="<?php //session_destroy(); unset($_SESSION['loginId']); unset($_SESSION['loginName']); ?>" class="btn btn-info btn-sm">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </a>

        </div>
    </div>
</nav>
<!--end navbar-->