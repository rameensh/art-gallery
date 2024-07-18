<html>

<body>
    <!-- <form action="disp.php" method=post name="order"></form> -->

    <input type="button" value="Send" onclick="send()" />
    <!-- </form> -->
    <script>
        function send() {
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                echo "hey";
            }
            $sname = "localhost";
            $unmae = "root";
            $password = "";

            $db_name = "tblproduct";

            $conn = mysqli_connect($sname, $unmae, $password, $db_name) or die(mysqli_errno($conn));
            $query = "Insert into order(id,name,price) values(1,'atiya',1500)";
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo "hi";
            }
            ?>
        }
    </script>
</body>

</html>