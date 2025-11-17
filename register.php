<?php
include('connect.php');

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$address = $_POST['address'];
$image = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$role = $_POST['role'];

if ($password == $cpassword) {
    $upload_path = "../uploads/" . $image;

    if (move_uploaded_file($tmp_name, $upload_path)) {
        $insert = mysqli_query($connect, "INSERT INTO user (name, mobile, password, address, photo, role, status, votes)
        VALUES ('$name', '$mobile', '$password', '$address', '$image', '$role', 0, 0)");

        if ($insert) {
            echo '
            <script>
                alert("Registration Successful!");
                window.location = "../index.html";
            </script>';
        } else {
            echo '
            <script>
                alert("Something went wrong while saving data!");
                window.location = "../Routes/register.html";
            </script>';
        }
    } else {
        echo '
        <script>
            alert("File upload failed!");
            window.location = "../Routes/register.html";
        </script>';
    }
} else {
    echo '
    <script>
        alert("Password and Confirm Password do not match!");
        window.location = "../Routes/register.html";
    </script>';
}
?>
