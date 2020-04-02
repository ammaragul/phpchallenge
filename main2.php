<?php
$pagetitle = 'form';
require "header.php";
?>
<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $addrErr = $commentErr = "";
$name = $email = $gender = $comment = $address = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }
  if (empty($_POST["address"])) {
    $addrErr = "Address is Required";
  } else {
    $address = test_input($_POST["address"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL) 
	  if (!preg_match("/^[0-9-a-z ]+$/i",$address)) {
      $addrErr = "Only letters and numbers are allowed";
    }
  }
 if (empty($_POST["comment"])) {
    $commentErr = "Comment is Required";
  } else {
    $comment = test_input($_POST["comment"]);
  }
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }		
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<div id = "wrapper">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
Name: <input type="text" name="name"
value="<?php echo htmlspecialchars($name);?>">
<span class="error">* <?php echo $nameErr;?></span>
<br><br>
Email:<input type="text" name="email"
value="<?php echo htmlspecialchars($email);?>">
<span class="error">* <?php echo $emailErr;?></span>
<br><br>
Address: <input type="text" name="address"
 value="<?php echo htmlspecialchars($address);?>">
<span class="error">* <?php echo $addrErr;?></span>
<br><br>
Comment: <input type="text" name="comment" id="com" 
value="<?php echo htmlspecialchars($comment);?>">
<span class="error">* <?php echo $commentErr;?></span>
<br><br>
Gender:
<input type="radio" name="gender">Female
<input type="radio" name="gender"> Male
<span class="error">* <?php echo $genderErr;?></span>
<br><br>
<input type="submit" name="submit" value="SUBMIT"> 
</form>
	</div>
<?php 
if(isset($_POST['submit'])){
    $to = "ammaragul2002@hotmail.com"; // this is your Email address
    $from = $_POST['email']; // this is the sender's Email address
    $name = $_POST['name'];
    $subject = "Form submission";
	$subject2 = "Copy of your form submission";
    $message = $name . " wrote the following:" . "\n\n" . $_POST['comment'];
	$message2 = "Here is a copy of your message " . $name . "\n\n" . $_POST['comment'];
    $headers = "From:" . $from;
	$headers2 = "From:" . $to;
	if(strlen($name)<3) 
    { 
        die('Name is too short or empty!'); 
    } 
	if(strlen($from)<10) 
    { 
        die('Email is too short or empty!'); 
    } 
	if(strlen($comment)<10) 
    { 
        die('Comments are too short or empty!'); 
    } 
	if(strlen($address)<5) 
    { 
        die('Address is too short or empty!'); 
    } 
	if(strlen($genderErr)) 
    { 
        die('You did not enter gender!'); 
    } 
    mail($to,$subject,$message,$headers);
	mail($from,$subject2,$message2,$headers2);
	// sends a copy of the message to the sender
    
	 header('location:submit.php');
    // You can also use header('Location: thank_you.php'); to redirect to another page.
}?>
<?php require "footer.php"?>
