<?php
include 'conn.php';
$person_id=$_SESSION["person_id"];

    // Fetch and clean the <select> value.
    // The (int) makes sure the value is really a integer.
    $event_type = $_POST['event_type'];
    echo "$event_type";
    $donation = $_POST['donationmethod'];
    $donationTowards = $_POST['donationtowards'];
    $amount = $_POST['amount'];
 
    // Create the INSERT query.
    $sql = "INSERT INTO alumni_donations(person_id,donation_type,donation_towards,donation_amount,donation_made_on)
            VALUES ('$person_id','$donation','$donationTowards','$amount',CURRENT_DATE())";
 
    // Connect to a database and execute the query.
 
    $result = mysqli_query($conn,$sql);
 
    // Check the results and print the appropriate message.
    if($result) {
        echo "Record successfully inserted!";
		$_SESSION["donation"]="Donation";
		header("Location:AlumniDonation.php"); 
    }
    else {
        echo "Record not inserted! (". mysql_error() .")";
    }

?>