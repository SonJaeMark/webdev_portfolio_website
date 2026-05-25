<?php
$host     = "localhost";
$username = "root";
$password = "";
$dbname   = "projects_db";

$conn = mysqli_connect($host, $username, $password);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if database exists
$result = mysqli_query($conn, "SHOW DATABASES LIKE '$dbname'");

if (mysqli_num_rows($result) == 0) {
    echo "Database not found. Creating and running SQL file...\n";

    // Create the database
    mysqli_query($conn, "CREATE DATABASE $dbname");
    mysqli_select_db($conn, $dbname);

    // Read and execute projects_db.sql
    $sql = file_get_contents(__DIR__ . '/../database/projects_db.sql');
    mysqli_multi_query($conn, $sql);

    echo "Database and tables created from projects_db.sql!\n";

} else {
    mysqli_select_db($conn, $dbname);
    echo "Database already exists. Connected!\n";
}
?>