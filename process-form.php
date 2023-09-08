<?php
$name = $_POST["name"];
$email = $_POST["email"];
$massage = $_POST["massage"];
$rating = filter_input(INPUT_POST, "rating", FILTER_VALIDATE_INT);
$type = filter_input(INPUT_POST, "type", FILTER_VALIDATE_INT);
$terms = filter_input(INPUT_POST, "terms", FILTER_VALIDATE_BOOL);

if ( ! $terms) {
    die("Terms must be accepted");
}



$host = "localhost";
$dbname = "feedback_db";
$username = "root"; 
$password = "";

$conn = mysqli_connect($host, $username, $password, $dbname);


if(mysqli_connect_errno()) {
    die("Connection error : " .mysqli_connect_error());
}

$sql = "INSERT INTO feedback (name, email, massage, rating, type) VALUES (?, ?, ?, ?, ?)"; //Query

$stmt = mysqli_stmt_init($conn); //prepared statement

if ( ! mysqli_stmt_prepare($stmt, $sql)) { //make the Server regcognite that how to query
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param( $stmt, "sssii", 
                        $name,
                        $email,
                        $massage,
                        $rating,
                        $type );
                        

mysqli_stmt_execute($stmt); // 1.the SQL query specified in your "prepared statement" is sent to the MySQL database server for execution.

echo "Record has been saved"
?>

<a href="index.html">BACK</a>




