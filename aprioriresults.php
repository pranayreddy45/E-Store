<?php
session_start();
if(!isset($_SESSION['email']))
{
    header("Location:login.php");
}
else
{
$con=mysqli_connect("localhost","root","","ecommerce");
if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$t="TRUNCATE TABLE apriori_results";
mysqli_query($con,$t);
 
$filename="Prediction_list.csv";
//echo " ";
$ext=substr($filename,strrpos($filename,"."),(strlen($filename)-strrpos($filename,".")));
//echo $ext;
//echo "<br>";

if($ext==".csv")
{
  $file = fopen($filename, "r");
         while (($emapData = fgetcsv($file, 1000000, ",")) !== FALSE)
         {
            $emapData[0]=str_replace("[","",$emapData[0]);
            $emapData[1]=str_replace(array("[","'","]"),'',$emapData[1]);
            $emapData[2]=str_replace(array("[","'","]"),'',$emapData[2]);
            $emapData[4]=str_replace("]","",$emapData[4]);
            $emapData[0]=trim($emapData[0]);
            $emapData[1]=trim($emapData[1]);
            $emapData[2]=trim($emapData[2]);
            $emapData[3]=trim($emapData[3]);
            $emapData[4]=trim($emapData[4]);
            if(strpos($emapData[1],'Men')===0 || strpos($emapData[1],'women')===0)
            {
              $emapData[1]=preg_replace('/\W\w+\s*(\W*)$/', '$1', $emapData[1]);
            }
            if(strpos($emapData[2],'Men')===0||strpos($emapData[2],'women')===0)
            {
              $emapData[2]=preg_replace('/\W\w+\s*(\W*)$/', '$1', $emapData[2]);
            }
            $sql = "INSERT INTO apriori_results(Support,Item1,Item2,Confidence,Lift) VALUES('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]')";
            mysqli_query($con, $sql);
            //echo $emapData[0];
            //echo $emapData[1];
            //echo $emapData[2];
            //echo $emapData[3];
            //echo $emapData[4];
            //echo "<br>";
         }
         fclose($file);
         header('Location:index.php');
         //echo "CSV File has been successfully Imported.";
}
else {
    echo "Error: Please Upload only CSV File";
}
}
?>