<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entered Information</title>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $bdate = $_POST["bdate"];
    $uploaded_image = $_FILES["avatar"]["name"];
    move_uploaded_file($_FILES["avatar"]["tmp_name"], "uploads/$uploaded_image");
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
    <label for="fname">First Name:</label><br>
    <input type="text" id="fname" name="fname" value="<?php if(isset($fname)) echo $fname; ?>"><br>
    <label for="lname">Last Name:</label><br>
    <input type="text" id="lname" name="lname" value="<?php if(isset($lname)) echo $lname; ?>"><br>
    <label for="bdate">Birth Date:</label><br>
    <input type="date" id="bdate" name="bdate" value="<?php if(isset($bdate)) echo $bdate; ?>"><br>
    <label for="avatar">Image:</label><br>
    <input type="file" id="avatar" name="avatar"><br><br>
    <input type="submit" value="Show" name="submit">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h2>Entered Information:</h2>";
    echo "<p><strong>First Name:</strong> $fname</p>";
    echo "<p><strong>Last Name:</strong> $lname</p>";
    echo "<p><strong>Birth Date:</strong> $bdate</p>";
    if (!empty($uploaded_image)) {
        echo "<p><strong>Image:</strong> <img src='uploads/$uploaded_image' alt='Uploaded Image' width='200'></p>";
    }
}
?>

</body>
</html>
