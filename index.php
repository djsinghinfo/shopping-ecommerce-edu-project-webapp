<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sanstore | Web Design</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>

<?php
// Report all PHP errors
error_reporting(-1);
// Report all PHP errors
error_reporting(E_ALL);

$products = [];

if (true) {
    require_once('db_config.php');

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $products[$i]['id'] = $row["id"];
            $products[$i]['title'] = $row["title"];
            $products[$i]['price'] = $row["price"];
            $products[$i]['detail'] = $row["detail"];
            $products[$i]['image'] = $row["image"];

            $i++;
        }
    } else {
        echo "0 results";
    }
    $conn->close();
}
?>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="topnav">
                    <a><img src="logo.jpg" id="logo"></a>
                    <a class="active" href="/shop">Home</a>
                    <a href="#about">About</a>
                    <a href="#contact">Contact</a>
                    <a href="add_product.php">Add Product</a>
                    <div class="btn btn-outline-secondary mt-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16">
                            <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                            <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z" />
                        </svg>
                    </div>
                    <div class="search-container">
                        <form method="get" action="search.php">
                            <input type="text" placeholder="Search.." name="search" id="in">
                            <button type="submit" id="button">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-4 btn btn-outline-secondary" onclick="location.reload(); location.href='search.php?search=men&type=d';">Men</div>
            <div class="col-4 btn btn-outline-secondary" onclick="location.reload(); location.href='search.php?search=women&type=d';">Women</div>
            <div class="col-4 btn btn-outline-secondary" onclick="location.reload(); location.href='search.php?search=kids&type=d';">Kids</div>

            <div id="Sanstore" class="containerpage text-center" text-align: center;>
                <h3>Who we are? </h3>
                <p><em>We love fashion</em></p>
                <p>
                    Sanstore is establised in 2021. We deal with different kind of branded clothes which includes sweaters,shirt,shoes,jeans and manymore for men,women and kids. We ensure that we are providing stuff the
                    customer at affordable price with phenominal quality.
                </p>
                <p>
                    “I have always believed that fashion was not only to make women more beautiful, but also to reassure them, give them confidence.”
                    – Yves Saint Laurent
                </p>
                <br>
            </div>
            <div id="tour" class="bg-1 ml-2 col-12">
                <div class="containerpage">
                    <h3 class="text-center" style="background-color:#dc3545;">BEST SELLERS</h3>
                    <!-- <button onclick="sortpr()">Sort Products</button> -->
                    <p class="text-center">

                        <div class="row" id="row">
                            <?php if (isset($products) && !empty($products)) : ?>
                                <?php foreach ($products as $p) : ?>
                                    <div class="thumbnail col-2 text-center div" class="men" style="margin-top:10px;">
                                        <img src='<?php echo $p['image'] ?? 'product1.jpg'; ?>' width=1000 height=200>
                                        <p text-align="left" class="name"><strong><?php echo $p['title'] ?? ''; ?></strong></p>
                                        <!-- <p>black</p> -->
                                        <button class="" col-4 btn btn-outline-secondary"" data-toggle="modal" data-target="#myModal" onclick="location.href='product_detail.php?id=<?php echo $p['id'] ?? 0; ?>';">Buy Now</button>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </p>
                </div>
            </div>
        </div><br><br>

        <h3 class="text-center" style="background-color:#dc3545;">FEEDBACKS</h3>

        <form>
            <span class="row">
                <label for="Email">Email :</label>
                <input type="text" id="Email" name="Email" placeholder="enter your email.."><br><br>
            </span>
        </form>
    </div>
    <div class="form-floating">
        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px; padding-left:20px;"></textarea>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <br><br>
    <div class="container">
        <form>
            <h1>Contact Us</h1>
            <h4>Customer Care:+3429878006</h4>
            <h4>E-mail:sanstore1545@gmail.com</h4>
        </form>
    </div>

    <?php include_once('by.php'); ?>

    <script src="script.js"></script>
</body>

</html>