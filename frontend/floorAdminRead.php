<!DOCTYPE html>
<html>
<head>
<title>Admin: View Floors</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="wrapper fadeInDown">
		<div id="formContent2">
		
        <p> <?php 
                include 'C:\xampp\htdocs\Project\backend\database.php';
                include 'C:\xampp\htdocs\Project\logic\floorQueries.php';

                $conn = connect();

                // Pulling data from Floors table
                $result = floorAdminRead($conn);

                if ($result) {
                    header("Content-Type: JSON");
                    $rowNumber = 0;
                    $output = array();
    
                    while ($row = mysqli_fetch_array($result)) {
                        $output[$rowNumber]['FloorNo'] = $row['FloorNo'];
                        $output[$rowNumber]['FAmenities'] = $row['FAmenities'];
                        $output[$rowNumber]['NumUtilities'] = $row['NumUtilities'];
                        $rowNumber++;
                    }
                    echo json_encode($output, JSON_PRETTY_PRINT);
                }

                else {
                    echo "Failed to retrieve data from database.<br>";
                }

                // Pulling data from MaintHandling table
                $result2 = maintAdminRead($conn);

                if ($result2) {
                    header("Content-Type: JSON");
                    $rowNumber = 0;
                    $output = array();
    
                    while ($row = mysqli_fetch_array($result2)) {
                        $output[$rowNumber]['MaintSSN'] = $row['MaintSSN'];
                        $output[$rowNumber]['FloorNo'] = $row['FloorNo'];
                        $rowNumber++;
                    }
                    echo json_encode($output, JSON_PRETTY_PRINT);
                }
                else {
                    echo "Failed to retrieve data from database.<br>";
                }

            ?>
        </p>
		</div>
	  </div>
</body>

</html> 

