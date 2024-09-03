<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow">
        <div class="card-header">
            <h4 class="mb-0">Add Customer
                <a href="customers.php" class="btn btn-primary float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">

            <?php alertMessage(); ?>

            <form action="code.php" method="POST">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="">Customer Name *</label>
                        <input type="text" name="customer_data[name]" required class="form-control" />
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Email</label>
                        <input type="email" name="customer_data[email]" class="form-control" />
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Phone</label>
                        <input type="number" name="customer_data[phone]" required class="form-control" />
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="customer_data[description]" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="col-md-12 mb-3 text-end">
                        <br>
                        <button type="submit" name="saveCustomer" class="btn btn-primary">Add Student</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>