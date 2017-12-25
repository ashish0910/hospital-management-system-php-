<?php

$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "hms";

foreach($db as $key => $value){
    define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if(!$connection) {
    die($connection);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    
<meta charset="UTF-8">
<title>edoctor</title>
</head>
<body>
<!-- Image and text -->
<nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="index.php">
    <img src="images/ed.jpg" width="30" height="30" class="d-inline-block align-top" alt="">
    EDoctor
    </a>
</nav>
<h1 align="center">Please Enter Patient ID </h1><br><br>

<form method="post" align="center" action="patient.php">
<input type="text" name="p_id" placeholder="Patient id"> 
<input type="submit" name="submit">          
</form>
<br>
<br>       
</body>
</html>



<?php

$query="SELECT * FROM appointments" ;
$select_appointments_for_patient=mysqli_query($connection,$query) ;

if($_POST["submit"])
{
?>    

<table class="table">
  <thead>
    <tr>
      <th scope="col">S.no.</th>
      <th scope="col">Doctor id</th>
      <th scope="col">Appointment date</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
<?php $sno=1;
while($row=mysqli_fetch_assoc($select_appointments_for_patient))
{
$doctor_id=$row['doctor_id'] ;
$patient_id=$row['patient_id'] ;
$appointment_date=$row['appointment_date'] ; 
$treatment_status=$row['treatment_status'] ; 
if($_POST["p_id"]==$patient_id)
{ ?> 

      <tr>
      <th scope="row"><?php echo $sno ?></th>
      <td><?php echo $doctor_id ?></td>
      <td><?php echo $appointment_date ?></td>
      <td><?php echo $treatment_status ?></td>
      </tr>


<?php    
$sno++  ;   
}

}
      ?>    </tbody></table> 
      <?php
}

?>