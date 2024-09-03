<?php

require '../config/function.php';

if(isset($_POST['saveAdmin'])){

    $admin_data = $_POST['admin_data'];

    $name = $admin_data['name'];
    $email = $admin_data['email'];
    $password = $admin_data['password'];
    $phone = $admin_data['phone'];

    if($name != '' && $email != '' && $password != ''){

        $emailCheck = mysqli_query($conn, "SELECT * FROM admins WHERE email='$email'");
        if($emailCheck){
            if(mysqli_num_rows($emailCheck) > 0){
                redirect('admin-create.php','Email already exist.');
            }
        }

        $bcrypt_password = password_hash($password, PASSWORD_BCRYPT);

        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $bcrypt_password,
            'phone' => $phone
        ];
        $results = insert('admins', $data);
        if($results){
            redirect('admins.php','Admin Created Successfully!');
        }else {
            redirect('admin-create.php','Something Went Wrong!');
        }

    }else {
        redirect('admin-create.php','Please fill required fields.');
    }

}

if(isset($_POST['updateAdmin']))
{
    $adminId = validate($_POST['adminId']);

    $adminData = getById('admins', $adminId);
    if($adminData['status'] != 200){
        redirect('admins-edit.php?id='.$adminId,'Please fill required fields.');
    }

    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $phone = validate($_POST['phone']);

    $EmailCheckQuery = "SELECT * FROM admins WHERE email='$email' AND id!='$adminId'";
    $checkResult = mysqli_query($conn, $EmailCheckQuery);
    if($checkResult){
        if(mysqli_num_rows($checkResult) > 0){
            redirect('admins-edit.php'.$adminId,'Email is already used by an another user!');
        }
    }

    if($password != ''){
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    } else {
        $hashedPassword = $adminData['data']['password'];
    }

    if($name != '' && $email != ''){
        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $hashedPassword,
            'phone' => $phone
        ];

        $result = update('admins', $adminId, $data);
        if($result){
            redirect('admins-edit.php?id='.$adminId, 'Admin Updated Successfully!');
        } else {
            redirect('admins-edit.php?id='.$adminId, 'Something Went Wrong!');
        }
    } else {
        redirect('admin-create.php', 'Please fill required fields.');
    }
}

if(isset($_POST['saveCategory']))
{
    $category_data = $_POST['category_data'];

    $name = $category_data['name'];
    $description = $category_data['description'];

    $data = [
        'name' => $name,
        'description' => $description,
    ];
    $results = insert('categories', $data);
    if($results){
        redirect('categories.php','Category Added Successfully!');
    }else {
        redirect('categories-create.php','Something Went Wrong!');
    }

}

if(isset($_POST['updateCategory']))
{
    $categoryId = validate($_POST['categoryId']);

    $name = validate($_POST['name']);
    $description = validate($_POST['description']);

    $data = [
        'name' => $name,
        'description' => $description
    ];
    $results = update('categories', $categoryId, $data);
    if($results){
        redirect('categories-edit.php?id='.$categoryId,'Category Updated Successfully!');
    }else {
        redirect('categories-edit.php?id='.$categoryId,'Something Went Wrong!');
    }
}

if(isset($_POST['saveProduct']))
{
    $category_id = validate($_POST['category_id']);
    $products_data = $_POST['products_data'];

    $name = $products_data['name'];
    $author = $products_data['author'];
    $description = $products_data['description'];
    $quantity = $products_data['quantity'];

    if($_FILES['image']['size'] > 0)
    {
        $path = "../assets/uploads/products";
        $image_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

        $filename = time().'.'.$image_ext;

        move_uploaded_file($_FILES['image']['tmp_name'], $path."/".$filename);

        $finalImage = "assets/uploads/products/".$filename;
    }
    else {
        $finalImage = '';
    }

    $data = [
        'category_id' => $category_id,
        'item_name' => $name,
        'author' => $author,
        'description' => $description,
        'quantity' => $quantity,
        'image' => $finalImage,
    ];
    $results = insert('products', $data);
    if($results){
        redirect('products.php','Product Added Successfully!');
    }else {
        redirect('products-create.php','Something Went Wrong!');
    }
}

if(isset($_POST['updateProduct']))
{
    $product_id = validate($_POST['product_id']);

    $productData = getById('products',$product_id);
    if(!$productData){
        redirect('products.php','No such product found');
    }

    $category_id = validate($_POST['category_id']);
    $name = validate($_POST['name']);
    $description = validate($_POST['description']);
    $quantity = validate($_POST['quantity']);

    if($_FILES['image']['size'] > 0)
    {
        $path = "../assets/uploads/products";
        $image_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

        $filename = time().'.'.$image_ext;

        move_uploaded_file($_FILES['image']['tmp_name'], $path."/".$filename);

        $finalImage = "assets/uploads/products/".$filename;

        $deleteImage = "../".$productData['data']['image'];
        if(file_exists($deleteImage))
        {
            unlink($deleteImage);
        }
    }
    else {
        $finalImage = $productData['data']['image'];
    }

    $data = [
        'category_id' => $category_id,
        'item_name' => $name,
        'description' => $description,
        'quantity' => $quantity,
        'image' => $finalImage
    ];
    $results = update('products', $product_id, $data);

    if($results){
        redirect('products-edit.php?id='.$product_id,'Product Updated Successfully!');
    }else {
        redirect('products-edit.php?id='.$product_id,'Something Went Wrong!');
    }
}

if(isset($_POST['saveCustomer']))
{
    $customer_data = $_POST['customer_data'];

    $name = $customer_data['name'];
    $email = $customer_data['email'];
    $phone = $customer_data['phone'];
    $description = $customer_data['description'];

    if($name != '')
    {
        $emailCheck = mysqli_query($conn, "SELECT * FROM customers WHERE email='$email'");
        if($emailCheck){
            if(mysqli_num_rows($emailCheck) > 0){
                redirect('customers.php','Email is already exists!');
            }
        }

        $data = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'description' => $description
        ];

        $result = insert('customers',$data);
        if($result){
            redirect('customers.php','Customer Created Successfully');
        }
        else {
            redirect('customers.php','Something Went Wrong');
        }
    }
    else {
        redirect('customers.php','Please fill required fields');
    }
}

if(isset($_POST['updateCustomer']))
{
    $customerId = validate($_POST['customerId']);

    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $phone = validate($_POST['phone']);
    $description = validate($_POST['description']);

    if($name != '')
    {
        $emailCheck = mysqli_query($conn, "SELECT * FROM customers WHERE email='$email' AND id!='$customerId'");
        if($emailCheck){
            if(mysqli_num_rows($emailCheck) > 0){
                redirect('customers-edit.php?id='.$customerId,'Email is already exists!');
            }
        }

        $data = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'description' => $description
        ];

        $result = update('customers',$customerId ,$data);
        if($result){
            redirect('customers.php?id='.$customerId,'Customer Updated Successfully');
        }
        else {
            redirect('customers-edit.php?id='.$customerId,'Something Went Wrong');
        }
    }
    else {
        redirect('customers-edit.php?id='.$customerId,'Please fill required fields');
    }
}

?>