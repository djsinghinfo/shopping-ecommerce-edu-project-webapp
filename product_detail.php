<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Shirt | Sanstore</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="project.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<?php
// Report all PHP errors
error_reporting(-1);
// Report all PHP errors
error_reporting(E_ALL);

$product = [];
$products = [];

if (isset($_GET['id'])) {
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

    $sql = "SELECT * FROM products WHERE id = '" . trim($_GET["id"] ?? 0) . "'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $product = $row;
        }
    } else {
        echo "0 results";
    }

    $sql = "SELECT * FROM products ORDER BY RAND() LIMIT 4";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $products[$i]['id'] = $row["id"];
            $products[$i]['title'] = $row["title"];
            $products[$i]['price'] = $row["price"];
            $products[$i]['detail'] = $row["detail"];
            $products[$i]['ratting'] = $row["ratting"];
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

    <!-- This is the website's common header -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="topnav">
                    <a><img src="logo.jpg" id="logo"></a>
                    <a class="active" href="/shop">Home</a>
                    <a href="#about">About</a>
                    <a href="#contact">Contact</a>
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
        </div>
        <!-- Start your code here! -->
        <!-- Produect page: image and description -->
        <!-- <div style="margin: 65px 200px 100px 200px;" id="band" class="container"  > -->

        <div class="row">
            <img class="boximage" align="left" src='<?php echo $product['image'] ?? 'product1.jpg'; ?>'>
            <div class="box">
                <h1 class="product-name"><?php echo $product['title'] ?? ''; ?></h1>
                <span class="product-text-style">
                    <?php echo $product['detail'] ?? ''; ?>
                </span>
                <br><br>
                <span id="price"><b>CDN$ <?php echo $product['price'] ?? '0'; ?></b></span><b><span id="k"></span></b>
                <br><br>
                <span class="product-quantitiy1"><b>Qnt:</b><input type="number" min="0" id="quantity" class="quantity1" name="quantity" onchange="getprice()"></span>
                <br><br>
                <span class="add-to-card" type="submit"><button>Add to Cart</button></span>
            </div><br><br>
        </div><br><br><br><br><br><br>
        <div class="rate">
            <h4 style="font-size:x-large"> Customer Rating</h4>
            <?php for ($s = 1; $s <= $product['ratting']; $s++) : ?>
                <span class="fa fa-star checked"></span>
            <?php endfor; ?>
            <span style="padding:10px;font-size: larger;"> <?php echo $product['ratting']; ?> out of 5 </span>
            <br><br>
            <!-- <table style="width:500px;">
                <tr>
                    <td style="width:50px;">5 star</td>
                    <td style="width:400px;">
                        <div class="bar-container">
                            <div class="bar-2" style="width:28%"></div>
                        </div>
                    </td>
                    <td style="width:50px;">28%</td>
                </tr>
                <tr>
                    <td style="width:50px;">4 star</td>
                    <td style="width:400px;">
                        <div class="bar-container">
                            <div class="bar-2" style="width:0%"></div>
                        </div>
                    </td>
                    <td style="width:50px;">0%</td>
                </tr>
                <tr>
                    <td style="width:50px;">3 star</td>
                    <td style="width:400px;">
                        <div class="bar-container">
                            <div class="bar-2" style="width:38%"></div>
                        </div>
                    </td>
                    <td style="width:50px;">38%</td>
                </tr>
                <tr>
                    <td style="width:50px;">2 star</td>
                    <td style="width:400px;">
                        <div class="bar-container">
                            <div class="bar-2" style="width:13%"></div>
                        </div>
                    </td>
                    <td style="width:50px;">13%</td>
                </tr>
                <tr>
                    <td style="width:50px;">1 star</td>
                    <td style="width:400px;">
                        <div class="bar-container">
                            <div class="bar-2" style="width:21%"></div>
                        </div>
                    </td>
                    <td style="width:50px;">21%</td>
                </tr>
            </table> -->
        </div><br><br>

        <h3 class="text-center" style="background-color:#dc3545;">FEEDBACKS</h3>

        <form>
            <span class="row">
                <label for="Email">Email :</label>
                <input type="text" id="Email" name="Email" placeholder="enter your email.."><br><br>
            </span>

            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px;" "padding-left=20px;"></textarea>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div> <br><br><br><br>
        </form><br><br>

        <div class="container" align="center">
            <form align="center">
                <h1>Contact Us</h1>
                <h4>Customer Care:+3429878006</h4>
                <h4>E-mail:sanstore1545@gmail.com</h4>
            </form>
        </div><br>
        <h3 class="text-center" style="background-color: #3399ff">Sujestion Products</h3>
        <div class="row">
            <?php if (isset($products) && !empty($products)) : ?>
                <?php foreach ($products as $p) : ?>
                    <div class="thumbnail col-3 text-center">
                        <a href="product_detail.php?id=<?php echo $p['id'] ?? 0; ?>" target="_blank">
                            <img src='<?php echo $p['image'] ?? 'product1.jpg'; ?>' width=160 height=200>
                            <p text-align="right"><strong><?php echo $p['title'] ?? ''; ?></strong></p>
                        </a>
                        <?php for ($s = 1; $s <= $p['ratting']; $s++) : ?>
                            <span class="fa fa-star checked"></span>
                        <?php endfor; ?><br>
                        <span class="price">Price: CDN$<?php echo $p['price'] ?? 0; ?></span>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <?php include_once('by.php'); ?>

    </div>
    <script src="script.js"></script>
</body>

</html>