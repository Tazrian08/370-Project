<?php
    // Start the session
    session_start();

    // Assuming you have a database connection established
    require_once('PhpConnect.php');

    // Check if the username is passed as a GET variable
    if (isset($_GET['username'])) {
        $usrn = $_GET['username'];
    } else {
        // Handle the case when username is not provided
        echo "Username not provided.";
        exit;
    }

    // Fetch payments with Payment_status = 0 from the Payment table
    $sql = "SELECT * FROM Payment WHERE Payment_status = 0";
    $result = mysqli_query($conn, $sql);
	$sql1 = "SELECT Book_ID, Member_ID, Fine FROM Book WHERE Fine>0 AND admin_username='$usrn'";
    $result1 = mysqli_query($conn, $sql1);

    // Update payment status when "Confirm Payment" button is clicked
    if (isset($_POST['confirm_payment'])) {
        $transaction_id = $_POST['transaction_id'];
        $update_sql = "UPDATE Payment SET Payment_status = 1 WHERE Transaction_ID = '$transaction_id'";
        mysqli_query($conn, $update_sql);
    }
	    if (isset($_POST['clear_fine'])) {
        $b = $_POST['book_id'];
        $update_sql = "UPDATE Book SET Fine = 0, Return_date= DATE_ADD(CURDATE(), INTERVAL 1 DAY) WHERE Book_id = '$b'";
        mysqli_query($conn, $update_sql);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment Page</title>
    <!-- Add your meta tags and CSS links here -->

    <!-- Updated styles for the search bar and button -->
    <style>
        .search-bar {
            padding: 6px;
            border: 2px solid #ccc;
            border-radius: 10px;
            width: 20%;
            font-size: 14px;
            outline: none;
            margin-bottom: 10px;
        }
		 .container {
            display: flex;
            align-items: flex-start;
        }

        .search-button {
            padding: 8px 16px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s, transform 0.2s;
        }

         .search-button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        /* Additional styles for centering content */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            text-align: center;
            padding: 10px;
        }

        /* Style for the scrollable box table */
        .scrollable-box {
            max-height: 300px;
            overflow: auto;
            margin-top: 20px;
        }
		.scrollable-box {
            max-height: 300px;
            overflow: auto;
            margin-top: 20px;
            border: 1px solid #ccc;
            flex: 1;
            padding: 10px;
        }
		table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #ccc;
        }
		 th, td {
            text-align: center;
            padding: 10px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <!-- Add the search bar at the top -->
    <div style="text-align: center; margin-top: 10px;">
        
    </div>

    <!-- Add the scrollable box table with payment data -->
    <div class="container">
        <!-- Left side table -->
        <div class="scrollable-box">
		<h2>Sign Up Payment</h2>
		<form method="get">
            <input type="hidden" name="username" value="<?php echo $usrn; ?>">
            <input class="search-bar" type="text" name="search_query" placeholder="Search Transaction IDs or Student IDs">
            <button class="search-button" type="submit">Search</button>
        </form>
            <table>
                <tr>
                    <th>Transaction_ID</th>
                    <th>Payment Status</th>
                    <th>Student_ID</th>
                    <th>Action</th>
                </tr>
                <?php
                if (isset($_GET['search_query'])) {
                    $searchQuery = $_GET['search_query'];
                    $filteredSql = "SELECT * FROM Payment WHERE (Transaction_ID LIKE '%$searchQuery%' OR Student_ID LIKE '%$searchQuery%') AND Payment_Status=0";
                    $filteredResult = mysqli_query($conn, $filteredSql);
                    while ($filteredRow = mysqli_fetch_assoc($filteredResult)) {
                        echo "<tr>";
                        echo "<td>" . $filteredRow['Transaction_ID'] . "</td>";
                        echo "<td>" . $filteredRow['Payment_Status'] . "</td>";
                        echo "<td>" . $filteredRow['Student_ID'] . "</td>";
                        echo "<td>";
                        echo "<form method='post'>";
                        echo "<input type='hidden' name='transaction_id' value='" . $filteredRow['Transaction_ID'] . "'>";
                        echo "<button type='submit' name='confirm_payment'>Confirm Payment</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    // Display all rows when no search query is present
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['Transaction_ID'] . "</td>";
                        echo "<td>" . $row['Payment_Status'] . "</td>";
                        echo "<td>" . $row['Student_ID'] . "</td>";
                        echo "<td>";
                        echo "<form method='post'>";
                        echo "<input type='hidden' name='transaction_id' value='" . $row['Transaction_ID'] . "'>";
                        echo "<button type='submit' name='confirm_payment'>Confirm Payment</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                }

                ?>
            </table>
        </div>


       <div class="scrollable-box">
            <h2>Fine Payment</h2>
            <form method="get">
                <input type="hidden" name="username" value="<?php echo $usrn; ?>">
                <input class="search-bar" type="text" name="search_query_fine" placeholder="Search Book IDs or Member IDs">
                <button class="search-button" type="submit">Search</button>
            </form>
            <table>
                <tr>
                    <th>Book_ID</th>
                    <th>Member_ID</th>
                    <th>Fine</th>
                    <th>Action</th>
                </tr>
                <?php
                if (isset($_GET['search_query_fine'])) {
                    $searchQueryFine = $_GET['search_query_fine'];
                    $filteredSqlFine = "SELECT Book_ID, Member_ID, Fine FROM Book WHERE (Book_ID LIKE '%$searchQueryFine%' OR Member_ID LIKE '%$searchQueryFine%') AND admin_username = '$usrn' AND Fine>0";
                    $filteredResultFine = mysqli_query($conn, $filteredSqlFine);
                    while ($filteredRowFine = mysqli_fetch_assoc($filteredResultFine)) {
                        echo "<tr>";
                        echo "<td>" . $filteredRowFine['Book_ID'] . "</td>";
                        echo "<td>" . $filteredRowFine['Member_ID'] . "</td>";
                        echo "<td>" . $filteredRowFine['Fine'] . "</td>";
                        echo "<td>";
                        echo "<form method='post'>";
                        echo "<input type='hidden' name='book_id' value='" . $filteredRowFine['Book_ID'] . "'>";
                        echo "<button type='submit' name='clear_fine'>Clear Fine</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    // Display rows from Book table with admin_username = $usrn
                    //$fineSql = "SELECT Book_ID, Member_ID, Fine FROM Book WHERE admin_username = '$usrn'";
                    //$fineResult = mysqli_query($conn, $fineSql);
                    while ($fineRow = mysqli_fetch_assoc($result1)) {
                        echo "<tr>";
                        echo "<td>" . $fineRow['Book_ID'] . "</td>";
                        echo "<td>" . $fineRow['Member_ID'] . "</td>";
                        echo "<td>" . $fineRow['Fine'] . "</td>";
                        echo "<td>";
                        echo "<form method='post'>";
                        echo "<input type='hidden' name='book_id' value='" . $fineRow['Book_ID'] . "'>";
                        echo "<button type='submit' name='clear_fine'>Clear Fine</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </table>
        </div>
    </div>
    <!-- ... (other HTML code) ... -->
</body>
</html>