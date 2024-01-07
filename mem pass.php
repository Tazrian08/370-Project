<?php
require_once('PhpConnect.php');
// Hash the Member password
$adminPassword1 = "123456789";
$hashedAdminPassword1 = password_hash($adminPassword1, PASSWORD_DEFAULT);
$sql1 = "UPDATE Member SET Password = '$hashedAdminPassword1' WHERE User_ID = 'M119'";
$sql11="UPDATE Authentication SET Password = '$hashedAdminPassword1' WHERE User_ID = 'M119'";
if ((mysqli_query($conn, $sql1)) && (mysqli_query($conn, $sql11) )) {
        echo "Hashed Member password: " . $hashedAdminPassword1;
}
$adminPassword2 = "39039820";
$hashedAdminPassword2 = password_hash($adminPassword2, PASSWORD_DEFAULT);
$sql2 = "UPDATE Member SET Password = '$hashedAdminPassword2' WHERE User_ID = 'M805'";
$sql12="UPDATE Authentication SET Password = '$hashedAdminPassword2' WHERE User_ID = 'M805'";
if ((mysqli_query($conn, $sql2)) && (mysqli_query($conn, $sql12) )) {
        echo "Hashed Member password: " . $hashedAdminPassword2;
}
$adminPassword3 = "987";
$hashedAdminPassword3 = password_hash($adminPassword3, PASSWORD_DEFAULT);
$sql3 = "UPDATE Member SET Password = '$hashedAdminPassword3' WHERE User_ID = 'M602'";
$sql13="UPDATE Authentication SET Password = '$hashedAdminPassword3' WHERE User_ID = 'M602'";
if ((mysqli_query($conn, $sql3)) && (mysqli_query($conn, $sql13) )) {
        echo "Hashed Member password: " . $hashedAdminPassword3;
}
$adminPassword4 = "12345678";
$hashedAdminPassword4 = password_hash($adminPassword4, PASSWORD_DEFAULT);
$sql4 = "UPDATE Member SET Password = '$hashedAdminPassword4' WHERE User_ID = 'M844'";
$sql14="UPDATE Authentication SET Password = '$hashedAdminPassword4' WHERE User_ID = 'M844'";
if ((mysqli_query($conn, $sql4)) && (mysqli_query($conn, $sql14) )) {
        echo "Hashed Member password: " . $hashedAdminPassword4;
}
$adminPassword5 = "123456789";
$hashedAdminPassword5 = password_hash($adminPassword5, PASSWORD_DEFAULT);
$sql5 = "UPDATE Member SET Password = '$hashedAdminPassword5' WHERE User_ID = 'M819'";
$sql15="UPDATE Authentication SET Password = '$hashedAdminPassword5' WHERE User_ID = 'M819'";
if ((mysqli_query($conn, $sql5)) && (mysqli_query($conn, $sql15) )) {
        echo "Hashed Member password: " . $hashedAdminPassword5;
}
$adminPassword6 = "123456789";
$hashedAdminPassword6 = password_hash($adminPassword6, PASSWORD_DEFAULT);
$sql6 = "UPDATE Member SET Password = '$hashedAdminPassword6' WHERE User_ID = 'M396'";
$sql16="UPDATE Authentication SET Password = '$hashedAdminPassword6' WHERE User_ID = 'M396'";
if ((mysqli_query($conn, $sql6)) && (mysqli_query($conn, $sql16) )) {
        echo "Hashed Member password: " . $hashedAdminPassword6;
}$adminPassword7 = "123456789";
$hashedAdminPassword7 = password_hash($adminPassword7, PASSWORD_DEFAULT);
$sql7 = "UPDATE Member SET Password = '$hashedAdminPassword7' WHERE User_ID = 'M202'";
$sql17="UPDATE Authentication SET Password = '$hashedAdminPassword7' WHERE User_ID = 'M202'";
if ((mysqli_query($conn, $sql7)) && (mysqli_query($conn, $sql17) ))  {
        echo "Hashed Member password: " . $hashedAdminPassword7;
}
?>
