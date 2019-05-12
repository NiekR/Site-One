<?php

session_start();

// Deleta data in session variables
session_unset();
session_destroy();

header("Location: ../index.php");
exit();