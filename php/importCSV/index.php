<?php
session_start();

if ($_POST['submit'])
{
	$stime = $_POST['starttime'];
	echo $_SESSION["stime"]=$name1;
	$edtime = $_POST['endtime'];
	echo $_SESSION["edtime"]=$name2;
	$sid = $_POST['terminalId'];
	echo $_SESSION["sid"]=$name3;
	$sty = $_POST['Type'];
	echo $_SESSION["sty"]=$name4;			
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
		<title>车辆百公里油气耗批量查询</title>
        <link rel="shortcut icon" href="favicon.ico">
        <link rel="stylesheet" href="../JS/ui.tabs.css" type="text/css" media="print, projection, screen">
		<script language="javascript" type="text/javascript" src="../Time/WdatePicker.js"></script>
<script language="javascript" type="text/javascript" src="JS/jquery.js"></script>
<style type="text/css">
<!--
.STYLE1 {font-size: xx-large}
-->
</style>

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

        <script src="../JS/jquery-1.2.4b.js" type="text/javascript"></script>
       <script src="../JS/ui.core.js" type="text/javascript"></script>
        <script src="../JS/ui.tabs.js" type="text/javascript"></script>
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
                <li><a href="#fragment-2"><span>百公里油气耗查询</span></a></li>
            </ul>
            
            <div id="fragment-2">
               <p>&nbsp;</p>
<p align="center" class="STYLE1">百公里油气耗查询</p>
<p>&nbsp;</p>
  <form id="addform" action="do.php?action=import" method="post" enctype="multipart/form-data">
    <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td height="50">  <div align="left">
    <p>请选择要导入的CSV文件：<br/><input type="file" name="file"> <input type="button" onClick="javascript:$('#addform').attr('action', 'do.php?action=import');$('#addform').submit();" class="btn" value="导入CSV">&nbsp;&nbsp;&nbsp;&nbsp;<a href="help.html" target="_blank">help</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="data.csv">下载数据文件模板</a></p>
        </div></td>
      </tr>
    </table>
    <table width="600" height="20" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table>
    <table width="600" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>

  </tr>
  <tr>
    <td height="30">开始时间</td>
    <td><input type="text" id="d233" name="starttime" onFocus="WdatePicker({startDate:'%y-%M-01 00:00:00',dateFmt:'yyyy-MM-dd HH:mm:ss',alwaysUseStartDate:true})"/></td>
    <td><div align="right">结束时间&nbsp;</div></td>
    <td><input type="text" id="d233" name="endtime" onFocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss',alwaysUseStartDate:true})"/></td>
	<td><label> 
         <input onClick="javascript:$('#addform').attr('action', 'do.php?action=export');$('#addform').submit(); " type="button" name="Submit" class="btn" id="exportCSV" value="查询并导出"></p></label>  </td>
	
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
   
    <td>&nbsp;</td>
  </tr>
</table>  
</form>
            </div>


    </div>
		                <p>&nbsp;</p><table width="491" border="0" align="center" cellpadding="0" cellspacing="0">
                          <tr>
                            <td><div align="center"><span class="STYLE2">* 数据更新至：2015-05-07 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;开始时间和结束时间请选择数据库更新前日期</span></div></td>
                          </tr>
                        </table>
                <p> </p>
                <p align="center"> 智能服务研究所</p>
                <p> </p>
                <p>&nbsp;    </p>
    </body>
</html>