<?php

if ($result) {
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";

        echo "<td>" . htmlspecialchars($row['name']) . "</td>"; 
        echo "<td>" . htmlspecialchars($row['start_date']) . "</td>"; 
        echo "<td>" . htmlspecialchars($row['end_date']) . "</td>"; 
        echo "<td>" . htmlspecialchars($row['status']) . "</td>";     
        
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No reservations found.</td></tr>";
}
?>
