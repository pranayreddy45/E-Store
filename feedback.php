<?php
session_start();
if(!isset($_SESSION['email']))
{
    header("Location:login.php");
}
$email=$_SESSION['email'];
$date=date("Y/m/d");
$db = mysqli_connect("localhost", "root", "", "ecommerce");

if(isset($_POST['submit']))
{
    $feedback=$_POST['feedback_text'];
    $in="INSERT INTO feedback(Email, FeedBack, Date) VALUES ('$email', '$feedback', '$date')";
    if(mysqli_query($db, $in))
    {
        header("Location:feedback.php");
    }
}
?>
<?php include 'header.php';?>
<!DOCTYPE html>
<html>
    <style>
        body {
  margin: 0;
  min-width: 1000px;
}
form{
   	width: 50%;
	margin: 20px auto;
	/* border-bottom: 1px solid red;  */
   }
   p
   {
    position: relative;
    text-align: center;
   }
   table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: auto;
  margin: 20px;
  margin-left:330px;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
    </style>
    <body>
        <div id="feedbackform">
            <form method="POST" action="feedback.php" enctype="multipart/form-data">
            <textarea 
      	id="text" 
      	cols="40" 
      	rows="4" 
      	name="feedback_text" 
          placeholder="Feedback..."></textarea>
          <input type="submit" name="submit" value="Submit">
            </form>
        </div>
    </body>
</html>

<?php
$result=mysqli_query($db, "SELECT * FROM feedback WHERE Email='$email' ORDER BY Date DESC, Id DESC");
echo "<table>
    <th> Date </th>
    <th> Feedback </th>";
while($row=mysqli_fetch_array($result))
{
    echo "<div id='feedback_display'>";
    //  echo "<p>".$row['Date']."       ".$row['FeedBack']."</p>";
    echo "<tr>
    <td>".$row['Date']."</td>
    <td>".$row['FeedBack']."</td>
    </tr>";
    echo "</div>";
}
?>