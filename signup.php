<?php

require "header.php"

?>

<div class="container">
    <div class="main mt-5 ">
        <h1>Signup</h1>

        <form action="includes/signup.php" method="post">

            <div class="form-group">
                <input class="form-control" type="text" name="uid" placeholder="Your username" >
            </div>

            <div class="form-group">
                <input class="form-control" type="text" name="mail" placeholder="Your e-mail">
            </div>

            <div class="form-group">
                <input class="form-control" type="password" name="pwd" placeholder="Your password" >
            </div>

            <div class="form-group">
                <input class="form-control" type="password" name="pwd-repeat" placeholder="Repeat password" >
            </div>

            <div class="form-group">
                <button type="submit" name="signup-submit">
                    Signup
                </button>
            </div>

        </form>

    </div>
</div>


<?php

require "footer.php"

?>
