<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">

    <div class="row">
        <div class="col-md-12">
            <h1 class="mt-4">Dashboard</h1>
            <?php alertMessage(); ?>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card card-body bg-primary p-3 color">
                <p class="text-sm mb-0 text-capitalize" style="color: white;">Total Book Categories</p>
                <h5 class="fw-bold mb-0">
                    <?= getCount('categories'); ?>
                </h5>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card card-body bg-primary p-3">
                <p class="text-sm mb-0 text-capitalize" style="color: white;">Total Number of Books</p>
                <h5 class="fw-bold mb-0">
                    <?= getCount('products'); ?>
                </h5>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card card-body bg-primary p-3">
                <p class="text-sm mb-0 text-capitalize" style="color: white;">Total Admins</p>
                <h5 class="fw-bold mb-0">
                    <?= getCount('admins'); ?>
                </h5>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card card-body bg-primary p-3">
                <p class="text-sm mb-0 text-capitalize" style="color: white;">Total Number of Students</p>
                <h5 class="fw-bold mb-0">
                    <?= getCount('customers'); ?>
                </h5>
            </div>
        </div>

        <div class="col-md-12 mb-3">
            <hr>
            <h5>Orders</h5>
        </div>

        <div class="col-md-12 mb-3">
            <div class="card card-body bg-primary p-3">
                <p class="text-sm mb-0 text-capitalize" style="color: white;">Number of Books added (Today)</p>
                <h5 class="fw-bold mb-0">
                    <?php
                        $todayDate = date('Y-m-d');
                        $todayOrders = mysqli_query($conn, "SELECT * FROM products WHERE created_at='$todayDate' ");
                        if($todayOrders){
                            if(mysqli_num_rows($todayOrders) > 0){
                                $totalCountOrders = mysqli_num_rows($todayOrders);
                                echo $totalCountOrders;
                            }
                            else {
                                echo "0";
                            }
                        }else{
                            echo 'Something Went Wrong!';
                        }
                    ?>
                </h5>
            </div>
        </div>
    </div>
    <a href="file-upload.php" class="btn btn-warning">Upload PDF</a>
</div>

<?php include('includes/footer.php'); ?>