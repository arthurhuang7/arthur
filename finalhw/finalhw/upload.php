<?php
$target_dir = "";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
/*if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}*/

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000000) {
  echo "Sorry, your file is too large.";
  echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "mp3") {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
  echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
 //if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
  } else {
    echo "Sorry, there was an error uploading your file.";
    echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
  }
}
?>