<?php 

session_start();
include('connect.php');
$db = connectDb();

$errors = array();

//deleteAppointment clicked
if (isset($_POST['deleteAppointment'])) {
    $date = mysqli_real_escape_string($db, $_POST['date_appoi']);
    $hour = mysqli_real_escape_string($db, $_POST['hour_appoi']);
    $socialsecuritynumber = mysqli_real_escape_string($db, $_POST['socialsecuritynumber']);

    if (empty($date)) { array_push($errors, "date is required"); }
    if (empty($hour)) { array_push($errors, "hour is required"); }
    if (empty($socialsecuritynumber)) { array_push($errors, "socialsecuritynumber is required"); }

    if (count($errors) == 0) {
        $prequery = "SELECT id_medrec FROM patient_medical_record WHERE socialsecuritynumber= '$socialsecuritynumber'";
        $r = mysqli_query($db, $prequery);
        $res = mysqli_fetch_assoc($r);
        $medrec = $res['id_medrec'];
        $query = "DELETE FROM appointment WHERE id_medrec='$medrec' AND date_appoi='$date' AND hours_appoi='$hour'";
        mysqli_query($db, $query);
        $b = mysqli_error($db);
        echo $b;
    }
}
//header('location: doctor.php');
?>
