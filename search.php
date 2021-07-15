<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sanstore search page</title>
    <link rel="stylesheet" href="search.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="project.css">
</head>


<?php
// Report all PHP errors
error_reporting(-1);
// Report all PHP errors
error_reporting(E_ALL);

$products = [];

if (isset($_GET['search'])) {
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

    $_type = $_GET['type'] ?? '';
    $_ratting = $_GET['ratting'] ?? '';
    $_price = $_GET['price'] ?? '';
    $_sort = $_GET['sort'] ?? '';

    $where = "title LIKE '%" . trim($_GET["search"] ?? 0) . "%'";

    if ($_type == 'd') {
        $where .= " AND  detail LIKE '%" . trim($_GET["search"] ?? 0) . "%'";
    }
    if (!empty($_ratting)) {
        $where .= " AND ratting = '" . trim($_ratting) . "'";
    }
    if (!empty($_price)) {
        $where .= " AND price <= '" . trim($_price) . "'";
    }

    $order_by = '';
    if ($_sort == 'lth') {
        $order_by .= " ORDER By price ASC";
    } else if ($_sort == 'htl') {
        $order_by .= " ORDER By price DESC";
    }

    $sql = "SELECT * FROM products WHERE " . $where . " " . $order_by;

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
    <div>
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

            <hr>
            <h3>Search result for <?php echo $_GET['search'] ?? ''; ?></h3>
            <hr>
        </div>
        <div class="row btn-groupdiv-Sec">
            <div class="col-2 main-left">
                <h3>
                    Filters
                </h3>
                <ul>Ratings
                    <li>
                        <a href="search.php?search=<?php echo $_GET['search'] ?? ''; ?>&ratting=1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="search.php?search=<?php echo $_GET['search'] ?? ''; ?>&ratting=2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="search.php?search=<?php echo $_GET['search'] ?? ''; ?>&ratting=3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="search.php?search=<?php echo $_GET['search'] ?? ''; ?>&ratting=4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href="search.php?search=<?php echo $_GET['search'] ?? ''; ?>&ratting=5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                        </a>
                    </li>
                </ul>
                <ul>
                    Price
                    <li>Under $100
                        <!-- <input type="checkbox" name="" id="one" onclick="filtering()"> -->
                        <input type="checkbox" name="" id="one" onclick="location.reload(); location.href='search.php?search=<?php echo $_GET['search'] ?? ''; ?>&price=100';" <?php echo ($_price == 100) ? 'checked' : ''; ?> />
                    </li>
                    <li>Under $200
                        <input type="checkbox" name="" id="two" onclick="location.reload(); location.href='search.php?search=<?php echo $_GET['search'] ?? ''; ?>&price=200';" <?php echo ($_price == 200) ? 'checked' : ''; ?> />
                    </li>
                    <li>Under $300
                        <input type="checkbox" name="" id="three" onclick="location.reload(); location.href='search.php?search=<?php echo $_GET['search'] ?? ''; ?>&price=300';" <?php echo ($_price == 300) ? 'checked' : ''; ?> />
                    </li>
                    <li>Under $400
                        <input type="checkbox" name="" id="four" onclick="location.reload(); location.href='search.php?search=<?php echo $_GET['search'] ?? ''; ?>&price=400';" <?php echo ($_price == 400) ? 'checked' : ''; ?> />
                    </li>
                    <li>Under $500
                        <input type="checkbox" name="" id="five" onclick="location.reload(); location.href='search.php?search=<?php echo $_GET['search'] ?? ''; ?>&price=500';" <?php echo ($_price == 500) ? 'checked' : ''; ?> />
                    </li>
                </ul>
                <ul>
                    Sort by
                    <li>
                        <a href="search.php?search=<?php echo $_GET['search'] ?? ''; ?>&sort=lth">Lowest to Highest</a>
                    </li>
                    <li>
                        <a href="search.php?search=<?php echo $_GET['search'] ?? ''; ?>&sort=htl">Highest to Lowest</a>
                    </li>
                </ul>
            </div>

            <div class="col-10 div2">
                <div class="row P1">
                    <?php if (isset($products) && !empty($products)) : ?>
                        <?php foreach ($products as $p) : ?>
                            <div class="col-3 Img1" id="img1" style="margin-top:10px;">
                                <a href="product_detail.php?id=<?php echo $p['id'] ?? 0; ?>">
                                    <img src="<?php echo $p['image'] ?? 'product1.jpg'; ?>" alt="stock2" class="stock2" style="background-color: darkgray;width: 100%;height: 200px;">
                                    <div>
                                        <?php for ($s = 1; $s <= $p['ratting']; $s++) : ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                            </svg>
                                        <?php endfor; ?>
                                    </div>
                                    <h5>
                                        <?php echo $p['title'] ?? ''; ?>
                                    </h5>
                                    <!-- <p>men's leather shoes</p> -->
                                    <p>
                                        price $<?php echo $p['price'] ?? '0'; ?>
                                    </p>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="container">
                <form>
                    <h1>Contact Us</h1>
                    <h4>Customer Care:+3429878006</h4>
                    <h4>E-mail:sanstore1545@gmail.com</h4>
                </form>
            </div>

            <?php include_once('by.php'); ?>

        </div>
    </div>
    <script src="script.js"></script>
</body>
</head>

</html>