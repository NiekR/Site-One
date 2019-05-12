<div class="profile">
    <div class="mt-3">
        <h2>Profile</h2>

        <!-- Enctype specifies how the form data should be encoded -->
        <div class="profile-pic mt-4">
            <h5>Edit your profile picture</h5>

            <form action="includes/upload.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="file">

                <button type="submit" name="submit">Upload File</button>
            </form>
        </div>

    </div>
</div>