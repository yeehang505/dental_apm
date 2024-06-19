<?php
include "connection.php";
// Retrieve all dentists who are available on the specified date and time
$date = $_POST['date'];
$time = $_POST['time'];
$den_list = "";
$query = "SELECT DISTINCT dentist.den_id, dentist.den_name
          FROM dentist
          LEFT JOIN availability ON dentist.den_id = availability.den_id
          AND availability.av_date = ?
          AND availability.av_time = ?
          WHERE availability.av_status IS NULL";
// Prepare and execute the statement
$stmt = $con->prepare($query);
$stmt->bind_param("ss", $date, $time);
$stmt->execute();
$result = $stmt->get_result();

// Fetch results and build the option list
while ($row = $result->fetch_assoc()) {
    $den_list .= "<option value='" . $row['den_id'] . "'>" . $row['den_name'] . "</option>";
}
if ($den_list == "") {
    $den_list = "<option value=''>No dentists available</option>";
}
// Set the content type to JSON
header('Content-Type: application/json');
echo json_encode(array("den_list" => $den_list));
?>