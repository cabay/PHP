<?php
session_start();

if ($_POST['Submit'])
{
	$stime = $_POST['starttime'];
	echo $_SESSION["stime"]=$name1;
	$edtime = $_POST['endtime'];
	echo $_SESSION["edtime"]=$name2;
	$sid = $_POST['terminalId'];
	echo $_SESSION["sid"]=$name3;
	$sty = $_POST['vinId'];
	echo $_SESSION["sty"]=$name4;	
	$sear = $_POST['Search'];
	echo $_SESSION["sear"]=$name5;
}
?>


<html lang="en">
    <head>
	<?php  
header("Content-type:text/html;charset=utf-8");  
?>  
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="Content-Style-Type" content="text/css">
        <meta http-equiv="Content-Script-Type" content="text/javascript">
		<title>天行健终端号属性查询</title>
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="stylesheet" href="JS/ui.tabs.css" type="text/css" media="print, projection, screen">
		<script language="javascript" type="text/javascript" src="Time/WdatePicker.js"></script>
<script language="javascript" type="text/javascript" src="JS/jquery.js"></script>
<style type="text/css">
<!--
.STYLE1 {font-size: xx-large}
-->
</style>
<script type="text/javascript">

 </script>
        <style type="text/css" media="screen, projection">
            body, h1, h2 {
                font-family: "Trebuchet MS", Trebuchet, Verdana, Helvetica, Arial, sans-serif;
            }
            h1 {
                margin: 1em 0 1.5em;
                font-size: 18px;
            }
            h2 {
                margin: 2em 0 1.5em;
                font-size: 16px;
            }
            p {
                margin: 0;
            }
            pre, pre+p, p+p {
                margin: 1em 0 0;
            }
            code {
                font-family: "Courier New", Courier, monospace;
            }
        .STYLE2 {
	color: #FF0000;
	font-size: x-small;
}
        </style>

        <script src="JS/jquery-1.2.4b.js" type="text/javascript"></script>
       <script src="JS/ui.core.js" type="text/javascript"></script>
        <script src="JS/ui.tabs.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function() {
                $('#rotate > ul').tabs({ fx: { opacity: 'toggle' } }).tabs('rotate', 0);
            });
        </script>  
    </head>
    <body>
    <p>&nbsp;</p>
    <div id="rotate">
            <ul>
                <li><a href="#fragment-3"><span>终端号信息查询</span></a></li>
            </ul>

			<div id="fragment-3">
               <p>&nbsp;</p>
<p align="center" class="STYLE1">天行健终端号属性查询</p>
<p>&nbsp;</p>
<form id="form" name="form" method="POST" action="carVIN_result.php" >
<table width="700" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100" height="50">终端号：</td>
    <td width="155">
      <label>
        <input name="terminalId" type="text" value="" />
        </label>      </td>
      <td width="40" height="50"></td>
	    <td width="100" height="50">VIN码：</td>
    <td width="155">
      <label>
        <input name="vinId" type="text" value="" />
        </label>      </td>
		 <td width="40" height="50"></td>
			    <td width="100" height="50">组织：</td>
    <td width="155">
      <label>
        <input name="Search" type="text" value="" />
        </label>      </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr>
    <td colspan="4"></td>
    </tr>
  
</table>  
<?php /*?><table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th scope="col"><label>
      <input name="radiobutton" type="radio" value="OVER_SPEED_NUM" checked>
      超速次数
      <input type="radio" name="radiobutton" value="SPEED_UP_NUM">
      急加速次数
      <input type="radio" name="radiobutton" value="SPEED_DOWN_NUM">
      急减速次数
      <input type="radio" name="radiobutton" value="IDLE_TIME">
      怠速时长
      <input type="radio" name="radiobutton" value="GREEN_ZONE_TIME">
      绿区行驶时长
      <input type="radio" name="radiobutton" value="radiobutton">
      瞬时油耗</label></th>
  </tr>
  
</table><?php */?>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <th scope="col">&nbsp;</th>
  </tr>
      <tr>
    <td height="30" colspan="4">        <label>
      <div align="center">
        <input type="submit" name="Submit" value="查询"  />
        </div>
    </label>  <div align="center"></div></td>
    </tr>
</table>
</form>
            </div>

    </div>
		                <p>&nbsp;</p>
                        <table width="491" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td><div align="center"><span class="STYLE2">* 数据更新至：2015-05-11</span></div></td>
                          </tr>
                        </table>
                <p> </p>
                <p align="center"> 智能服务研究所</p>
                <p> </p>
                <p>&nbsp;    </p>
    </body>
</html>