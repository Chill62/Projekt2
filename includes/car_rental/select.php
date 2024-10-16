<?php
include "../../includes/conn.php";
include "variables.php";
if (isset($_POST['submit'])) {
    

    if (!empty($date_range) && strpos($date_range, ' to ') !== false) {
        list($date_start, $date_end) = explode(' to ', $date_range);
        $sql = "SELECT * FROM car_list 
                WHERE cost BETWEEN ? AND ? 
                AND (date_start <= ? AND date_end >= ?)";
        if (!empty($car_type)) {
            $sql .= " AND type = ?";
        }        
        $sql .= " ORDER BY cost DESC"; 

        $stmt = $conn->prepare($sql);
        if (!empty($car_type)) {
            $stmt->bind_param("iisss", $min_cost, $max_cost, $date_end, $date_start, $car_type);
        } else {
            $stmt->bind_param("iiss", $min_cost, $max_cost, $date_end, $date_start);
        }

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {
            echo '<div class="container">';
            echo '<div class="row">';
            while ($row = mysqli_fetch_array($result)) {
                echo '<div class="col-md-4 mb-4">';
                echo '<div class="card">';
                echo '<img src="../../img/' . htmlspecialchars($row['name']) . '.jpg" class="card-img-top img-fluid" alt="' . htmlspecialchars($row["name"]) . '">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . htmlspecialchars($row["name"]) . '</h5>';
                echo '<p class="card-text"><strong>Price per day:</strong> ' . htmlspecialchars($row["cost"]) . ' zł</p>';
                echo '<p class="card-text"><strong>Horsepower:</strong> ' . htmlspecialchars($row["horsepower"]) . ' HP</p>';
                echo '<p class="card-text"><strong>Trunk Capacity:</strong> ' . htmlspecialchars($row["trunk_capacity"]) . ' liters</p>';
                echo '<p class="card-text"><strong>Fuel Type:</strong> ' . htmlspecialchars($row["fuel_type"]) . '</p>';
                echo '<p class="card-text"><strong>Description:</strong> ' . htmlspecialchars($row["description"]) . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
            echo '</div>';
        } else {
            echo '<p>No results found for your search criteria.</p>';
        }

        $stmt->close();
    } else {
        echo '<p>Please select a valid date range.</p>';
    }

    $conn->close();
}
?>
