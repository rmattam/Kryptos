<?php
session_start();
require 'config.php';
  ini_set('session.cookie_lifetime',  0);
  if(!isset($_POST['fbid']))
  {
    echo "Error";
    return;
  }
  $fbid=$_POST['fbid'];
  $firstname=$_POST['firstname'];
  $lastname=$_POST['lastname'];
  $_SESSION['username'] = $fbid;
  $_SESSION['usrno'] =$fbid;
    $sql1="SELECT * FROM $usertable WHERE fbid='$fbid'";
    $result1=mysql_query($sql1);
    $count1=mysql_num_rows($result1);
    if($count1<1) 
    {
      
      $ran1=rand(0,1);  

      $sql="INSERT INTO $usertable (firstname,levelid, ran1,lastname,fbid)"." VALUES ('$firstname',0,$ran1,'$lastname','$fbid')";
       
      $result=mysql_query($sql); 
      $sql="INSERT INTO $attacktable (username)".
      " VALUES ('$fbid')";
      $result=mysql_query($sql) or die('error inserting value into attacktable'); 
    
    }
    else
    {
      $sql1="SELECT * FROM $usertable WHERE fbid='$fbid'";
      $result1=mysql_query($sql1);
      $count=mysql_fetch_assoc($result1);
      $i=$count['ran1'];
      $level=$count['levelid'];
      $_SESSION['level']=$level.(($level==8)?(chr(ord('a')+$i%2)):'');;

      $sql1="SELECT * FROM $kryptostable WHERE id =$level";
      $result1=mysql_query($sql1);
      $count1=mysql_fetch_assoc($result1);
      $_SESSION['lev']=$count1['url'];
      $loc=$_SESSION['lev'];
      echo $loc;
      return;
    }
//nigger=0 safe
$sql1="SELECT * FROM $usertable WHERE fbid='$fbid' and nigger=1";
$result1=mysql_query($sql1) or die("querrying nigger");
$count=mysql_num_rows($result1);
if($count==1)
  { header('Location: detention.php');
    die("contact us");   
  }

// $code_filename="answers/fblog.txt";
// $codefileopen=fopen($code_filename,"a") or die("can't open log file");
// $code=$fbid."\n";
// fwrite($codefileopen, $code);
// fclose($codefileopen);
echo 1;
?>