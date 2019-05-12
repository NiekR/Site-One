<div class="container">
    <div class="other d-flex mt-5">
        <div class="mr-3">
            <a class="btn btn-warning" href="signup.php">Sign up!</a>
        </div>

        <?php
        if(isset($_SESSION['userName'])){
            echo '
            <form action="includes/logout.php" method="post">
                <div class="form-group mr-3">
                    <button class="btn btn-danger" type="submit" name="logout-submit">Logout</button>
                </div>
            </form>
            ';
        }
        ?>

    </div>
</div>