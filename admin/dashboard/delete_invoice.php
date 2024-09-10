<?php
require "includes/conn.php";

if (isset($_GET['purchase_no'])) {
    $purchase_no = $_GET['purchase_no'];
    $sql = "DELETE FROM purchase_order WHERE purchase_no = '$purchase_no'";
    if (mysqli_query($conn, $sql)) {
        echo "Invoice deleted successfully.";
    } else {
        echo "Error deleting invoice: " . mysqli_error($conn);
    }
    mysqli_close($conn);
    header("Location: invoice.php"); // Redirect back to the invoices page
    exit();
}
?>
