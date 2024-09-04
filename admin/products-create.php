<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow">
        <div class="card-header">
            <h4 class="mb-0">Add Product
                <a href="products.php" class="btn btn-primary float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">

            <?php alertMessage(); ?>

            <form action="code.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col md-12 mb-3">
                        <label>Select Category</label>
                        <select name="category_id" class="form-select mySelect2">
                            <option value="">Select Category</option>
                            <?php
                            $categories = getAll('categories');
                            if($categories){
                                if(mysqli_num_rows($categories) > 0){
                                    foreach($categories as $cateItem){
                                        echo '<option value="'.$cateItem['id'].'">'.$cateItem['name'].'</option>';
                                    }
                                }else {
                                    echo '<option value="">No Categories found</option>';
                                }
                            }else{
                                echo '<option value="">Something Went Wrong!</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Book Name *</label>
                        <input type="text" name="products_data[name]" required class="form-control" />
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Author</label>
                        <input type="text" name="products_data[author]" required class="form-control" />
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Description</label>
                        <textarea name="products_data[description]" class="form-control" rows="3"></textarea>
                    </div>               
                    <div class="col-md-4 mb-3">
                        <label for="">Quantity *</label>
                        <input type="number" name="products_data[quantity]" required class="form-control" />
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Image </label>
                        <input type="file" name="image" class="form-control" />
                    </div>

                    <div class="col-md-12 mb-3 text-end">
                        <button type="submit" name="saveProduct" class="btn btn-primary">Add Product</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>