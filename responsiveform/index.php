
<?php
error_reporting(0);
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'newsletter');

if(isset($_POST['btn-submit']))
{
  $name = $_POST['name'];
$email=$_POST['email'];
$classs=$_POST['classs'];

$query="SELECT * FROM SUBSCRIPTION WHERE email = '$email' ";
$q=mysqli_query($con,$query);
$num = mysqli_num_rows($q);
if($num == 1) { $status="ALREADY SUBSCRIBED";}
else { 
    $q = "INSERT INTO SUBSCRIPTION(name,email,class) VALUES('$name','$email','$classs')";
    
mysqli_query($con,$q);

$status="SUCCESSFUL!";
}
}







?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style1.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
 <title>StudentSKY SDC :)</title> 
  </head>
<body background="1.jpg">
  <div class="container">
    <h1 class="sdban"><span>StudentSKY</span> <br>SDC :)</h1>
    
<div class="stat">
 <H1> S T A T U S </H1>
 <input type="text" name="status" value="<?php echo $status ?>">
</div>
      <div class="news">
        <h2 >N E W S L E T T E R</h2></div>
        <div class="news2">
        <center><h4>Get Regular Personalised Updates!</h4></CENTER>
      </div>




      <div class="contact">
        
      
        <form id="contactForm" name="myform" method="post" action="index.php">
          <p>
           
            <input type="text" name="name" id="name" required placeholder="Enter Your Name">
          </p>
          
          
          <p>
            <label>
               
            
            <input type="email" name="email"id="email" required placeholder="Enter Email Id">
          </p>
         
          <p class="full">
          
            <textarea name="classs" rows="2" id="classs" required placeholder="Enter Class With Year"></textarea>
          </p>
          
          
            <center>
            <input type="submit" name="btn-submit" value="SUBSCRIBE!"></center>
      
        </form><br>
        <div class = "bth"> 
    
        <a href = "../index.php">Back To Home</a>
        
        </div>
      </div>
    
    <br>
    <center>
        <div class="author">
      &copy;2020 StudentSKY
      <br>
     
      Made With <span id="heart">&hearts;</span> <!--By <a href="https://www.instagram.com/jainbhavuk555">Bhavuk Jain
      <i class="fa fa-instagram" aria-hidden="true"></i> -->
      </a></div>
    </center>
  </div>
  
  
</body>
</html>