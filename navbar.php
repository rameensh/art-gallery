<?php
include('db_conn.php');
// session_start();
$user_id = $_SESSION['id'];
?>
<nav style="z-index: 100;">
    <label class="logo">Art Gallery</label>
    <ul>
        <li><a class="active" href="dash.php">Home</a></li>
        <li><a href="#">Paintings <i class="fas fa-caret-down"></i>
            </a>
            <ul style="z-index:200;">
                <li><a href="paints.php?q=abstract">Abstract</a></li>
                <li><a href="paints.php?q=landscape">Landscape</a></li>
                <li><a href="paints.php?q=sculpture">Sculptures</a></li>
                <li><a href="paints.php?q=indian">Contemporary</a></li>
            </ul>
        </li>
        <li><a href="#foot" onclick="">Know Us</a></li>
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
<div class="content">
    <!-- <div class="space text"><br>
        Quality and Affordable Art For All<br><br>
    </div> -->

    <H2 style="color:white">
        IMAGE AS PER YOUR PREFRENCE
        <br><br>
    </H2>
    <div class="banner">
        <img id="bannerImage" src="" alt="Banner image" width="600" height="600">
        <!-- <div class="content">
            <h1 id="bannerText">Welcome to my website!</h1>
            </div> -->
    </div>

    <style>
        .banner {
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f2f2f2;
            padding: 10px;
        }

        .banner img {
            /* /* max-width: 50%; */
            width: 600;
            height: 50%;
            margin-right: 20px;
            */
        }

        .banner .content {
            text-align: center;
        }

        .banner h1 {
            font-size: 24px;
            color: #333;
            margin: 0;
        }
    </style>

</div>
</div>
<script>

    let images = [];
    <?php
    $preference = $_SESSION['preference'];
    $sql = "SELECT * FROM images WHERE category = '$preference'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $typeImg = $row['image'];
            ?>
            images.push('<?php echo $typeImg ?>');

            <?php
        }
    }
    ?>
    var currentIndex = 0;
    console.log(images);

    function changeBanner() {
        currentIndex++;
        if (currentIndex >= images.length) {
            currentIndex = 0;
        }
        document.getElementById('bannerImage').src = images[currentIndex];
        // document.getElementById('bannerText').innerHTML = texts[currentIndex];
    }

    setInterval(changeBanner, 1000); // Change banner every 5 seconds
</script>