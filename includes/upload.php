<?php

if (isset($_POST['submit'])) {

    // Superglobal with used name
    $file = $_FILES['file'];

    // name of file from array
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    // Take name of file
    $fileExt = explode('.', $fileName);

    // Get last from array to get file extension
    $fileActualExt = strtolower(end($fileExt));

    // Allowed filetypes
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    if (in_array($fileActualExt, $allowed)) {
        // Check if no errors uploading file
        if ($fileError === 0) {
            if ($fileSize < 1000000) {
                // Give new image unique id with timestamp
                $fileNameNew = uniqid('', true).".". $fileActualExt;

                // upload directory
                $fileDestionation = 'uploads/'. $fileNameNew;

                // Move from temporary location
                move_uploaded_file($fileTmpName, $fileDestionation);
                header('Location: ../index.php?uploadsuccess');
            } else {
                echo "File to big to upload";
            }
        } else {
            echo "Error uploading this file";
        }
    } else {
        echo "Cannot upload files of this type";
    }


}