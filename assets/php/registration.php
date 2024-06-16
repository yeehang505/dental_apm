<?php
include('connection.php');

$name = $_POST['name'];
$password = $_POST['pass'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$ic = $_POST['ic'];

// To prevent SQL injection
$name = stripcslashes($name);
$password = stripcslashes($password);
$email = stripcslashes($email);
echo "<script>console.log('name: $name, password: $password, email: $email', contact: $contact, ic: $ic');</script>";

// To prevent SQL injection
$name = mysqli_real_escape_string($con, $name);
$password = mysqli_real_escape_string($con, $password);
$email = mysqli_real_escape_string($con, $email);
echo "<script>console.log('name: $name, password: $password, email: $email');</script>";


if ($name == "" || $password == "" || $email == "" || $contact == "" || $ic == "") {
    echo "<script>
            alert('Please fill in all the required fields.');
            // window.location.href = 'register.php';
        </script>";
    exit();
}
// Check if name already exists
$sql_check = "SELECT * FROM customer WHERE name = '$name'";
$result_check = mysqli_query($con, $sql_check);

if (mysqli_num_rows($result_check) > 0) {
    echo "<script>
            alert('This email is already registered. Please use another email address.');
            window.location.href = 'login.php';
        </script>";
} 
else {
    // Hash the password before storing it
    //$hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert new user into the database
    $sql_insert = "INSERT INTO customer (name, email, contact_no, ic, cust_pass) VALUES ('$name', '$email', '$contact', '$ic', '$password')";
    if (mysqli_query($con, $sql_insert)) {
        echo "<script>
                alert('Registration successful.');
                window.location.href = 'login.php';
            </script>";
    } 
    else {
        echo "<script>
                alert('Registration failed. Please try again.');
                window.location.href = 'register.php';
            </script>";
    }
}

// Close the connnection
mysqli_close($con);
?>
