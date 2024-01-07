<?php
require_once('PhpConnect.php');

// Initialize variables to store query results
$bookResults = array();

if(isset($_GET['uid'])) {
    $u = $_GET['uid'];
	
    $sql = "SELECT Book_ID, title, Member_ID FROM book b INNER JOIN admin a ON a.user_name = b.admin_username WHERE b.Issue_date IS NULL AND b.return_date IS NOT NULL AND User_ID='$u'";
    
    $result = mysqli_query($conn, $sql);
    
    // Fetch the query results and store them in $bookResults
    while ($row = mysqli_fetch_assoc($result)) {
        $bookResults[] = $row;
    }
}
if(isset($_POST['return_all'])) {
    $bookIdsToUpdate = array();

    foreach ($bookResults as $row) {
        $bookIdsToUpdate[] = $row['Book_ID'];
    }

    foreach ($bookIdsToUpdate as $bookId) {
        $updateQuery = "UPDATE book SET Member_ID =NULL, Return_date = NULL, Fine = NULL WHERE Book_ID = '$bookId'";
        mysqli_query($conn, $updateQuery);
    }
	header("Location: adprofile.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- ... (your head content) ... -->
    <style>
        /* ... (your styles) ... */
        .box-table {
            border-collapse: collapse;
            width: 100%;
        }
        .box-table th, .box-table td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        /* ... (your other styles) ... */
    </style>
</head>
<body>
    <!-- ... (your navigation bar code) ... -->

    <div class="container">
        <h2>Books to be returned</h2>
        <div class="box-table">
            <table class="table">
                <thead>
                    <tr>
                        <th>Book ID</th>
                        <th>Title</th>
                        <th>Member ID</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Display the query results within the table
                    foreach ($bookResults as $row) {
                        echo "<tr>";
                        echo "<td>" . $row['Book_ID'] . "</td>";
                        echo "<td>" . $row['title'] . "</td>";
                        echo "<td>" . $row['Member_ID'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
		<form method="post">
            <button type="submit" name="return_all">Return All</button>
        </form>
    </div>

    <!-- ... (rest of your HTML content) ... -->
</body>
</html>
