<?php
require_once 'config.php'; // Include your database connection configuration

$sql = "SELECT * FROM shoutouts ORDER BY created_at DESC limit 5";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="message">' . $row['message'] . '</div>';
}

mysqli_close($conn);
?> 