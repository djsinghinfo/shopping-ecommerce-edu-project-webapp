<html>

<head>
    <title>Add Product</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <?php
    // Report all PHP errors
    error_reporting(-1);
    // Report all PHP errors
    error_reporting(E_ALL);

    if (isset($_POST['add'])) {
        require_once('db_config.php');

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if (!get_magic_quotes_gpc()) {
            $title = addslashes($_POST['title']);
            $price = addslashes($_POST['price']);
            $detail = addslashes($_POST['detail']);
        } else {
            $title = $_POST['title'];
            $price = $_POST['price'];
            $detail = $_POST['detail'];
        }

        $ratting = rand(1, 5);

        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                // echo 1;
            } else {
                // echo "Sorry, there was an error uploading your file.";
                header("Location: add_product.php?ud=Sorry, there was an error uploading your file");
            }
        } else {
            // echo "File is not an image.";
            header("Location: add_product.php?ud=File is not an image");
        }

        $image = $target_file;

        $sql = "INSERT INTO products " . "(title, price, detail, ratting, image, creationdate) " . "VALUES('$title','$price','$detail', '$ratting', '$image', NOW())";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
            header("Location: add_product.php?ud=Product Uploaded");
        } else {
            // echo "Error: " . $sql . "<br>" . $conn->error;
            header("Location: add_product.php?ud=" . $conn->error);
        }

        $conn->close();
    } else {
        ?>

        <div class="container">
            <?php if (isset($_GET['ud']) && trim($_GET['ud']) != '') : ?>
                <div class="alert alert-success">
                    <?php echo $_GET['ud']; ?>
                </div>
            <?php endif; ?>

            <h2>Add Product</h2>
            <form method="post" action="<?php $_PHP_SELF ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Product Name:</label>
                    <input type="name" class="form-control" id="title" placeholder="Enter Product Name" name="title" required>
                </div>
                <div class="form-group">
                    <label for="price">Product Price:</label>
                    <input type="number" class="form-control" id="price" placeholder="Enter Product Price" name="price" required>
                </div>
                <div class="form-group">
                    <label for="detail">Product Detail:</label>
                    <textarea name="detail" class="form-control" id="detail" placeholder="Product Detail" required></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Product Detail:</label>
                    <input type="file" name="file" id="image" class="form-control" accept="image/x-png,image/gif,image/jpeg" required />
                </div>

                <input name="add" type="submit" id="add" value="Add Product" class="btn btn-success">

                <a href="/shop" class="btn btn-primary pull-right">Home / Cancel</a>

            </form>
        </div>

        <?php include_once('by.php'); ?>



    <?php
    }
    ?>

</body>

</html>