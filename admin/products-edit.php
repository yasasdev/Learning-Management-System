<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow">
        <div class="card-header">
            <h4 class="mb-0">Edit Book
                <a href="products.php" class="btn btn-primary float-end">Back</a>
            </h4>
        </div>
        <div class="card-body">

            <?php alertMessage(); ?>           

            <form action="code.php" method="POST" enctype="multipart/form-data">

                <?php
                $paramValue = checkParamId('id');
                if(!is_numeric($paramValue)){
                    echo '<h5>Id is not an integer</h5>';
                    return false;
                }

                $product = getById('products',$paramValue);
                if($product)
                {
                    if($product['status'] == 200)
                    {
                    ?>

                    <input type="hidden" name="product_id" value="<?= $product['data']['id']; ?>" />

                    <div class="row">
                        <div class="col md-12 mb-3">
                            <label>Select Category</label>
                            <select name="category_id" class="form-select">
                                <option value="">Select Category</option>
                                <?php
                                $categories = getAll('categories');
                                if($categories){
                                    if(mysqli_num_rows($categories) > 0){
                                        foreach($categories as $cateItem){
                                            ?>
                                                <option 
                                                    value="<?= $cateItem['id']; ?>"
                                                    <?= $product['data']['category_id'] == $cateItem['id'] ? 'selected':''; ?>
                                                    >
                                                    <?= $cateItem['name']; ?>
                                                </option>
                                            <?php
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
                            <label for="">Item Name *</label>
                            <input type="text" name="name" required value="<?= $product['data']['item_name']; ?>" class="form-control" />
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" rows="3"><?= $product['data']['description']; ?></textarea>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="">Quantity *</label>
                            <input type="number" name="quantity" value="<?= $product['data']['quantity']; ?>" required class="form-control" />
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="">Image </label>
                            <input type="file" name="image" class="form-control" />
                            <img src="../<?= $product['data']['image']; ?>" style="width:50px;height:50px" alt="Image" />
                        </div>

                        <div class="col-md-12 mb-3 text-end">
                            <br>
                            <button type="submit" name="updateProduct" class="btn btn-primary">Update Book</button>
                        </div>
                    </div>
                    <?php
                    }
                    else
                    {
                        echo '<h5>'.$product['message'].'</h5>';
                    }
                }
                else {
                    echo '<h5>Something Went Wrong!</h5>';
                    return false;
                }
                ?>
                
            </form>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>