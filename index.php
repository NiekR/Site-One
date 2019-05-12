<?php

    require "header.php";
    require "includes/dbh.php";

?>

    <?php

        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id =  $row['id'];
                echo $row['username'];
                $sqliImg = "SELECT * FROM profileimg WHERE userid='$id'";
                $result = mysqli_query($conn, $sqliImg);

                // Loop data from user
                while ($rowImg = mysqli_fetch_assoc($result)) {
                    echo "<div>";
                        if ($rowImg['status'] == 0) {
                            echo "<img src='uploads/profile".$id.".jpg'>";

                        } else{
                            echo "<img src='uploads/profiledefault.jpg' alt='profile'>";
                        }

                        echo $row['username'];
                    echo "</div>";
                }
            }
        } else {
            echo 'No users found';
        }
    ?>

    <div class="container">
        <div class="main">
            <?php
                if(isset($_SESSION['userName'])){
                    echo 'You are logged in!';

                    require 'profile.php';
                }
                else {
                    echo 'You are logged out!';
                }
            ?>
        </div>
    </div>

<?php

    require "footer.php"

?>
