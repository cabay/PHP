<?php
session_start();
$_SESSION['name1'] = $_POST['starttime'];
$_SESSION['name2'] = $_POST['endtime'];
$_SESSION['name3'] = $_POST['terminalId'];
$_SESSION['name4'] = $_POST['Type'];

$st = $_SESSION['name4'];

switch ($st)
 {
 case "10-M";
   $st =  "10-2";
   break;
 case "10-S";
   $st =  "10-2";
   break;
 case "10-R";
   $st =  "10-2";
   break;
}

$str.="#txj"."\r\n";
$str.="terminalId=".$_REQUEST['terminalId']."\r\n";
$str.="starttime=".$_REQUEST['starttime']."\r\n";
$str.="endtime=".$_REQUEST['endtime']."\r\n";
$str.="type=".$st."\r\n";
$str.="directory=d:\\\\data";
$dir = "Release/";
$file=fopen("config.txt","w+");
$fp=fopen("config.txt","a");
fwrite($fp,$str."\r\n");
fclose($fp);
system("txjExporter.exe")
?>