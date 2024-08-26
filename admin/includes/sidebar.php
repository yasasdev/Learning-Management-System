<?php
    $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/")+1);
    echo $page;
?>

<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>

                <a class="nav-link <?= $page == 'index.php' ? 'active':''; ?> " href="index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <div class="sb-sidenav-menu-heading">Interface</div>

                <a class="nav-link 
                    <?= $page == 'categories-create.php' ? 'collapse active':''; ?> 
                    <?= $page == 'categories.php' ? 'collapse active':''; ?> 
                    " href="#" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#collapseCategory" aria-expanded="false" aria-controls="collapseCategory">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Book Categories
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse
                    <?= $page == 'categories-create.php' ? 'show':''; ?> 
                    <?= $page == 'categories.php' ? 'show':''; ?> 
                    " 
                    id="collapseCategory" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?= $page == 'categories-create.php' ? 'active':''; ?>" href="categories-create.php">Create Category</a>
                        <a class="nav-link <?= $page == 'categories.php' ? 'active':''; ?>" href="categories.php">View Categories</a>
                    </nav>
                </div>

                <a class="nav-link
                    <?= $page == 'products-create.php' ? 'collapse active':''; ?> 
                    <?= $page == 'products.php' ? 'collapse active':''; ?> 
                    " href="#" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#collapseProduct" aria-expanded="false" aria-controls="collapseProduct">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Books
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse
                    <?= $page == 'products-create.php' ? 'show':''; ?> 
                    <?= $page == 'products.php' ? 'show':''; ?>
                    " id="collapseProduct" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?= $page == 'products-create.php' ? 'active':''; ?>" href="products-create.php">Add Books</a>
                        <a class="nav-link <?= $page == 'products.php' ? 'active':''; ?>" href="products.php">View Books</a>
                    </nav>
                </div>

                <div class="sb-sidenav-menu-heading">Manage Users</div>
                
                <a class="nav-link collapsed" href="#" 
                data-bs-toggle="collapse" 
                data-bs-target="#collapseCustomer" 
                aria-expanded="false" aria-controls="collapseCustomer">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Students
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseCustomer" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?= $page == 'customer-create.php' ? 'active':''; ?>" href="customer-create.php">Add Students</a>
                        <a class="nav-link <?= $page == 'customers.php' ? 'active':''; ?>" href="customers.php">View Students</a>
                    </nav>
                </div>

                <a class="nav-link collapsed" href="#" 
                data-bs-toggle="collapse" 
                data-bs-target="#collapseAdmins" 
                aria-expanded="false" aria-controls="collapseAdmins">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Admins / Staff
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseAdmins" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?= $page == 'admin-create.php' ? 'active':''; ?>" href="admin-create.php">Add Admin</a>
                        <a class="nav-link <?= $page == 'admins.php' ? 'active':''; ?>" href="admins.php">View Admins</a>
                    </nav>
                </div>

            </div>
        </div>
    </nav>
</div>