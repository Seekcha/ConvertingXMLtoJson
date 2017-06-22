.<!DOCTYPE html>
<html>
<head>
	<title>XML PHP JSON</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<body>
<?php
$xml=simplexml_load_file("PatientXML.xml") or die("Error: Cannot create object");

foreach ($xml ->patients as $patient ) {	
	echo "<img src='" .$patient -> img. "' width='100 px' height= '150 px'/><br>";
	echo " Patient ID: " . $patient -> filecode . "<br>";
	echo " Firstname: " . $patient -> firstname  . "<br>"; 
	echo " Lastname: " . $patient -> lastname  . "<br>";
	echo " Date of birth: " . $patient -> dob  . "<br>";
	echo " Gender: " . $patient -> gender  . "<br>";
	echo " Street:  " . $patient-> address -> street  . "<br>";
	echo " City: " . $patient-> address -> city . "<br>";
	echo " Cell: " . $patient ->  phone -> cell . "<br>";
	echo " Home: " . $patient ->  phone -> home . "<br>";
	echo " Work: " . $patient ->  phone -> work . "<br>";
	echo " Email: " . $patient ->  email . "<br>";
	echo " Medical History: " . $patient ->  medicalhistory . "<br>";
	echo " Allergy: " . $patient ->  allergies . "<br>";
	echo " Blood group: " . $patient ->  bloodgroup . "<br>";
	echo " Marital Status: " . $patient ->  maritalstatus . "<br>";
	echo " Occupation: " . $patient ->  occupation . "<br>";
	echo "<b>Spouse Name</b><br>";
	echo " Spouse firstname: " . $patient ->  spousenamem -> firstname . "<br>";
	echo " Spouse lastname: " . $patient ->  spousenamem -> lastname . "<br>";
	echo "<b>Employer details</b><br>";
	echo " Firstname: " . $patient ->  employ -> firstname  . "<br>";
	echo " Lastname: " . $patient -> employ -> lastname . "<br>";
	echo " Cell: " . $patient ->  employ ->  phone -> cell . "<br>";
	echo " Home: " . $patient ->  employ ->  phone -> home . "<br>";
	echo " Work: " . $patient ->  employ ->  phone -> work . "<br>";
	echo " Street: " . $patient ->  employ ->  address -> street . "<br>";
	echo " City: " . $patient ->  employ ->  address -> city . "<br>";
	echo "<b>Emergency contact</b><br>";
	echo " Firstname: " . $patient ->  emergence ->  firstname . "<br>";
	echo " Lastname: " . $patient ->  emergence ->  lastname . "<br>";
	echo " Street: " . $patient ->  emergence ->  address -> street . "<br>";
	echo " City: " . $patient ->  emergence ->  address -> city . "<br>";
	echo " Cell: " . $patient ->  emergence -> phone -> cell  . "<br>";
	echo " Home: " . $patient ->  emergence ->  phone -> home . "<br>";
	echo " Work: " . $patient ->  emergence ->  phone -> work . "<br>";
	echo " Email: " . $patient ->  emergence ->  email . "<br>";
	echo "<br>============================== <br>";		
	}
?>

<form method="Post">
	<button type="submit" name="save" class="btn btn-primary"><span class="glyphicon glyphicon-send"> Save In JSON</span></button>
</form>
<?php
	if(isset($_POST['save'])){
		
		$xml=simplexml_load_file("PatientXML.xml") or die("Error: Cannot create object");

		$patients = $xml -> patients;
		$img = $patients -> img;
		$filecode = $patients -> filecode ;
		$firstname = $patients -> firstname;
		$lastname= $patients -> lastname;
		$dob = $patients -> dob;
		$gender = $patients-> gender;
		$street = $patients -> address -> street;
		$city = $patients -> address -> city;
		$cell = $patients -> phone -> cell;
		$home = $patients -> phone -> home ;
		$work = $patients -> phone -> work;
		$email = $patients -> email;
		$medical = $patients -> medicalhistory;
		$allergies = $patients -> allergies;
		$bloodgroup = $patients -> bloodgroup;
		$marital = $patients -> maritalstatus;
		$poccupation = $patients -> occupation;
		$sfirstname = $patients -> spousename -> firstname;
		$slastname = $patients -> spousename -> lastname;
		$efirstname = $patients -> employ ->  firstname;
		$elastname = $patients -> employ ->  lastname;
		$ecell = $patients -> employ ->  phone -> cell;
		$ehome = $patients -> employ ->  phone -> home;
		$ework = $patients -> employ ->  phone -> work;
		$estreet = $patients -> employ ->  address -> street;
		$ecity = $patients -> employ ->  address -> city;
		$emfirstname = $patients -> emergence ->  firstname;
		$emlastname = $patients -> emergence ->  lastname;
		$emstreet = $patients -> emergence ->  address -> street;
		$emcity = $patients -> emergence ->  address -> city;
		$emcell = $patients -> emergence -> phone -> cell;
		$emhome = $patients -> emergence -> phone -> home;
		$emwork = $patients -> emergence -> phone -> work;
		$ememail =  $patients -> emergence -> email;
		
		//Get form data
		$formdata = array(
		'patient' => array(
			'patients' => array(
				'img' => $img,
				'filecode' => $filecode,
				'firstname'	=>$firstname,
				'lastname' =>$lastname,
				'dob' => $dob,
				'gender' => $gender,
				'address' => array(
					'street' => $street ,
					'city' => $city 
					),
				'phone' => array(
					'cell' => $cell,
					'home' => $home,
					'work' => $work
					),		
				'email' => $email,
				'medicalhistory' => $medical,
				'occupation' => $poccupation,	
				'spousename' =>array(
					'firstname' => $sfirstname,
					'lastname' => $slastname,	
					),
				'employ' => array(
					'firstname' => $efirstname,
					'lastname' => $elastname,
					'phone' => array(
						'cell' => $ecell,
						'home' => $ehome,
						'work' => $ework
						),
					'address' => array(
						'street' => $estreet,
						'city' => $ecity
						),
					),
				'emergence' => array(
					'firstname' => $emfirstname,
					'lastname' => $emlastname,
					'address' => array(
						'street' => $emstreet,
						'city' => $emcity
						),
					'phone' => array(
						'cell' => $emcell,
						'home' => $emhome,
						'work' => $emwork
						),
					'email' => $ememail
					),
						
			),
		)
	);

	file_put_contents('JsonPhp.json',json_encode($formdata, JSON_PRETTY_PRINT));
	echo "<script>alert('Data successfully saved')</script>";
		 
	}
?>
</body>
</html>