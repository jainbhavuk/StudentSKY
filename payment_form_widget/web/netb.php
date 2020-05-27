<?php
error_reporting(0);
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'payment');

if(isset($_POST['btn-submit']))
{
  $rno = $_POST['rno'];
$uname=$_POST['uname'];
$pass=$_POST['pass'];
$amt=$_POST['amt'];
$bank=$_POST['bank'];
$mode="NETB";
$query="SELECT * FROM RECEIPT WHERE rno = '$rno' ";
$q=mysqli_query($con,$query);
$num = mysqli_num_rows($q);
if($num == 1) { $status="ALREADY PAID";}
else { $q = "INSERT INTO RECEIPT(rno,amt,bank,mode) VALUES($rno,'$amt','$bank','$mode')";
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
N E T &nbsp;&nbsp;  B A N K I N G  &nbsp;&nbsp; P O R T A L

</div>
<form name="myform" method="post" action="netb.php">
 <div class="status"> STATUS :- <input type="text" name="stat" value="<?php echo $status ?>"></div>
<div class="netblock"> <center>
  <h2>  Select A Bank To Proceed:-</h2>
  <select name="bank" >
      <option value="SBI">SBI</option>
      <option value="HDFC">HDFC</option>
      <option value="ICICI">ICICI</option>
      <option value="BoB">Bank Of Baroda</option>
      <option value="Canara">Canara Bank</option>
</select>
</center><br>
<div class="netform">
  
<br>
<font color="white"size="6" face="aharoni">Username:-&nbsp;&nbsp;</font><input type="text" name="uname"required><BR><BR>
<font color="white"size="6" face="aharoni">Password:- &nbsp;</font> <input type="password" name="pass"required><BR><BR>
<font color="white"size="6" face="aharoni">Roll No:- &nbsp;&nbsp;&nbsp;</font> <input type="text" name="rno"required><BR><BR>
<font color="white"size="6" face="aharoni">Amount:- &nbsp;&nbsp;&nbsp;</font><input type="text" name="amt" placeholder="2500"required><BR><BR>




</div><br><br><center>
<input type="submit" name="btn-submit" value="PAY">
</center></form>
</div>

</html>
