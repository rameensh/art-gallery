<?php
session_start();
require_once("db.php");
$db_handle = new DBController();
if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            if (!empty($_POST["quantity"])) {
                $productByCode = $db_handle->runQuery("SELECT * FROM images WHERE code='" . $_GET["code"] . "'");
                $itemArray = array($productByCode[0]["code"] => array('name' => $productByCode[0]["name"], 'code' => $productByCode[0]["code"], 'quantity' => $_POST["quantity"], 'price' => $productByCode[0]["price"], 'image' => $productByCode[0]["image"]));

                if (!empty($_SESSION["cart_item"])) {
                    if (in_array($productByCode[0]["code"], array_keys($_SESSION["cart_item"]))) {
                        foreach ($_SESSION["cart_item"] as $k => $v) {
                            if ($productByCode[0]["code"] == $k) {
                                if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                        }
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }
            }
            break;
        case "remove":
            if (!empty($_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    if ($_GET["code"] == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if (empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
    }
}
?>
<html>

<head>
    <!-- <link href="css/paints.css" type="text/css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/paints.css">

</head>

<style>
    .product-image img {
        width: 290px;
        height: 175px
    }

    .txt-heading {
        color: #fff;
        border-bottom: 1px solid #E0E0E0;
        overflow: auto;
        font-style: bold;
    }
</style>

<body style="
      background: rgba(0, 0, 0, 0.6) url(back.jpg);
      background-size: cover;
      background-blend-mode: darken;
    ">
    <nav>
        <label class="logo">Art Gallery</label>
        <ul>
            <li><a class="active" href="dash.php">Home</a></li>
            <li><a href="#">Cart</a></li>
            <li><a href="#">Paintings <i class="fas fa-caret-down"></i>
                </a>
                <ul>
                    <li><a href="paints.php?q=abstract">Abstract</a></li>
                    <li><a href="paints.php?q=landscape">Landscape</a></li>
                    <li><a href="paints.php?q=sculpture">Monochrome</a></li>
                </ul>
            </li>
            <li><a href="#">Contact</a></li>
        </ul>

        <div class="search-icon">
            <span class="fas fa-search"></span>
        </div>
        <div class="cancel-icon">
            <span class="fas fa-times"></span>
        </div>
        <form action="paints.php" method="post">
            <input name="search" type="search" class="search-data" placeholder="Search" required>
            <button type="submit" class="fas fa-search"></button>
        </form>
    </nav>
    <div id="shopping-cart">
        <div class="txt-heading">Shopping Cart</div>

        <a id="btnEmpty" href="paints.php?action=empty">Empty Cart</a>
        <?php
        if (isset($_SESSION["cart_item"])) {
            $total_quantity = 0;
            $total_price = 0;
            ?>
            <table class="tbl-cart" cellpadding="10" cellspacing="1">
                <tbody>
                    <tr>
                        <th style="text-align:left;">Name</th>
                        <th style="text-align:left;">Code</th>
                        <!-- <th style="text-align:right;" width="5%">Quantity</th> -->
                        <!-- <th style="text-align:right;" width="10%">Unit Price</th> -->
                        <th style="text-align:right;" width="10%">Price</th>
                        <th style="text-align:center;" width="5%">Remove</th>
                    </tr>
                    <?php
                    foreach ($_SESSION["cart_item"] as $item) {
                        $item_price = $item["quantity"] * $item["price"];
                        ?>
                        <tr>
                            <td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?>
                            </td>
                            <td>
                                <?php echo $item["code"]; ?>
                            </td>
                            <!-- <td style="text-align:right;"><?php echo $item["quantity"]; ?></td> -->
                            <td style="text-align:right;">
                                <?php echo "$ " . $item["price"]; ?>
                            </td>
                            <!-- <td style="text-align:right;"><?php echo "$ " . number_format($item_price, 2); ?></td> -->
                            <td style="text-align:center;"><a href="paints.php?action=remove&code=<?php echo $item["code"]; ?>"
                                    class="btnRemoveAction"><img src="images/icon-delete.png" alt="Remove Item" /></a></td>
                        </tr>
                        <?php
                    }
                    ?>

                    <tr>
                        <td colspan="2" align="right">Total:</td>
                        <!-- <td align="right"><?php echo $total_quantity; ?></td> -->
                        <td align="right" colspan="2"><strong>
                                <?php echo "$ " . number_format($total_price, 2); ?>
                            </strong></td>
                        <!-- <td></td> -->
                    </tr>
                </tbody>
            </table>
            <?php
        } else {
            ?>
            <div class="no-records" style="	background-color: #d8e3e4;">Your Cart is Empty</div>
            <?php
        }
        ?>
        <br>
        <a href="placeorder.php"><button>ORDER</button></a>
    </div>

    <div id="product-grid">
        <div class="txt-heading">Choose below paintings to Add it in your cart</div>
        <?php
        if (isset($_GET['q'])) {
            $product_array = $db_handle->runQuery("SELECT * FROM images WHERE category='" . $_GET['q'] . "'");
            if (!empty($product_array)) {
                foreach ($product_array as $key => $value) {
                    ?>
                    <div class="product-item">
                        <form method="post" action="paints.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
                            <div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>">
                            </div>
                            <div class="product-tile-footer">
                                <div class="product-title">
                                    <?php echo $product_array[$key]["name"]; ?>
                                </div>
                                <div class="product-title">
                                    <?php echo $product_array[$key]["artist"]; ?>
                                </div>
                                <div class="product-price">
                                    <?php echo "$" . $product_array[$key]["price"]; ?>
                                </div>
                                <div class="cart-action">
                                    <input type="hidden" class="product-quantity" name="quantity" value="1" size="2" />
                                    <input type="submit" value="Add to cart" class="btnAddAction" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
                }
            }
            exit();
        }

        if (isset($_POST['search'])) {
            $search = $_POST['search'];
            $product_array = $db_handle->runQuery("SELECT * FROM images WHERE CONCAT(name,artist) LIKE '%" . $search . "%'");
            if (!empty($product_array)) {
                foreach ($product_array as $key => $value) {
                    ?>
                    <div class="product-item">
                        <form method="post" action="paints.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
                            <div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>">
                            </div>
                            <div class="product-tile-footer">
                                <div class="product-title">
                                    <?php echo $product_array[$key]["name"]; ?>
                                </div>
                                <div class="product-title">
                                    <?php echo $product_array[$key]["artist"]; ?>
                                </div>
                                <div class="product-price">
                                    <?php echo "$" . $product_array[$key]["price"]; ?>
                                </div>
                                <div class="cart-action">
                                    <input type="hidden" class="product-quantity" name="quantity" value="1" size="2" />
                                    <input type="submit" value="Buy" class="btnAddAction" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
                }
            }
            exit();
        } else {
            $product_array = $db_handle->runQuery("SELECT * FROM images ORDER BY id ASC");
            if (!empty($product_array)) {
                foreach ($product_array as $key => $value) {
                    ?>
                    <div class="product-item">
                        <form method="post" action="paints.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
                            <div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>">
                            </div>
                            <div class="product-tile-footer">
                                <div class="product-title">
                                    <?php echo $product_array[$key]["name"]; ?>
                                </div>
                                <div class="product-title">
                                    <?php echo $product_array[$key]["artist"]; ?>
                                </div>
                                <div class="product-price">
                                    <?php echo "$" . $product_array[$key]["price"]; ?>
                                </div>
                                <div class="cart-action">
                                    <input type="hidden" class="product-quantity" name="quantity" value="1" size="2" />
                                    <input type="submit" value="Buy" class="btnAddAction" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php
                }
            }
        }
        ?>

    </div>
</body>

</html>