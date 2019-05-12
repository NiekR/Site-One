<?php

    require "header.php"

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
