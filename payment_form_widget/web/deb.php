<?php
error_reporting(0);
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'payment');

if(isset($_POST['btn-submit']))
{
  $rno = $_POST['rno'];
$cardn=$_POST['cardn'];
$vld=$_POST['valid'];
$cvv=$_POST['cvv'];
$amt=$_POST['amt'];
$gw=$_POST['gateway'];
$mode="DEBITC";
$bank="";
$query="SELECT * FROM RECEIPT WHERE rno = '$rno' ";
$q=mysqli_query($con,$query);
$num = mysqli_num_rows($q);
if($num == 1) { $status="ALREADY PAID";}
else {
  $q2 = "INSERT INTO debitcard(rno,card,valid,gw) VALUES($rno,'$cardn','$vld','$gw')"; 
  mysqli_query($con,$q2);
   $q = "INSERT INTO RECEIPT(rno,amt,bank,mode) VALUES($rno,'$amt','$bank','$mode')";
    
  mysqli_query($con,$q);

$status="SUCCESSFUL!";
}
}


?>
<html>
<head>
<link rel="stylesheet" href="css/style.css">
</head>


<body background="images/1.png">

<div class="nethead">
DEBIT&nbsp; CARD &nbsp;PORTAL

</div>
<form name="myform" method="post" action="deb.php">
 <div class="status"> STATUS :- <input type="text" name="stat" value="<?php echo $status ?>"></div>
<div class="netblock"> <center>
  <h2>  Select A Card Type To Proceed:-</h2>
  <select name="gateway" >
      <option value="VISA">VISA</option>
      <option value="RUPAY">RUPAY</option>
      <option value="MASTERCARD">MASTERCARD</option>
</select>
</center><br>
<div class="netform">
  
<br>
<font color="white"size="6" face="aharoni">Card No:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><input type="text" name="cardn"required maxlength="16"placeholder="0000-0000-0000-0000"><BR>
<font color="white"size="6" face="aharoni">Valid Upto:-&nbsp;&nbsp;&nbsp;&nbsp;</font> <input type="text" name="valid"required maxlength="4" placeholder="YEAR ONLY"><font color="white"size="6" face="aharoni"> <BR>
<font color="white"size="6" face="aharoni">CVV:- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font> <input type="password" name="cvv"required maxlength="3"><BR>
<font color="white"size="6" face="aharoni">Roll No:-&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font> <input type="text" name="rno"required><BR>
<font color="white"size="6" face="aharoni">Amount:-&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font><input type="text" name="amt" placeholder="2500"required><BR><BR>




</div><br><br><center>
<input type="submit" name="btn-submit" value="PAY">
</center></form>
</div>

</html>
