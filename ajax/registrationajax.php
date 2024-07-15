<?php
// session_start();
include('../connect.php');

$rname = $_POST['rname'];
$rnumber = $_POST['rnumber'];
$remail = $_POST['remail'];
$org = $_POST['org'];
$address = $_POST['address'];
$rpass = $_POST['rpass'];
$rbname = $_POST['rbname'];
$rcode = $_POST['rcode'];
$accno = $_POST['accno'];
$rcname = $_POST['rcname'];
$rweb = $_POST['rweb'];


$sql = "INSERT INTO registration (name, mobile, email, org, address, password, bankname, ifscno, accno, cname, web) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = $con->prepare($sql);

// Adjusted bind_param to include all 11 parameters
$stmt->bind_param("sssssssssss", $rname, $rnumber, $remail, $org, $address, $rpass, $rbname, $rcode, $accno, $rcname, $rweb);
$query0 = $stmt->execute();

if ($query0) {
    echo "The request has been sent successfully";
} else {
    echo "Failed to send";
}

$stmt->close();