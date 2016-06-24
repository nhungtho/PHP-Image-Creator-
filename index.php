<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Image Generator</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

</head>

<body>

<div style="width:1200px; text-align: center; margin: auto;">
<div style="border: solid 1px #ccc;
padding: 10px; float:left;">
<h3>Please select values:</h3>
<?php 
    if(isset($_POST['submit'])){

	 $bg = "";
	 $y1 = "";
	 $y2 = "";
	 $y3 = "";
	 $y4 = "";
	 $logo = "";
	 $cpn= "";
	 $text= "";
	 $fontsize= "";
	 $cha= ""; 
	 $exp= "";


	 $bg = $_POST['bg'];

	 $y3 = $_POST['y3'];
	 $y4 = $_POST['y4'];
	 $logo = $_POST['logo'];
	 $cpn= $_POST['cpn'];
	 $text= $_POST['text'];
	 $fontsize= $_POST['fontsize'];
	 $cha= $_POST['cha'];
	 $exp= $_POST['exp'];

		
		echo "<a target='iframe' href='cpn.php?bg=$bg&y3=$y3&y4=$y4&logo=$logo&cpn=$cpn&text=$text&fontsize=$fontsize&exp=$exp&cha=$cha'>Click to preview</a><br><br>";
}
?>
<form action="" method="post">
  <table style="text-align:left;">
  <tr>
<td>Background:</td> <td><select name="bg" >
<option value="" selected="selected" disabled="disabled">Select a Background:</option>
<?php
$directory = 'images/bg/';
$files = array_diff(scandir($directory), array('..', '.'));
foreach($files as $file) 
{ 
	echo "<option value='$file'";
      if($bg == $file)
	  {echo " selected = 'selected'";}
	  echo ">".$file."</option>"; 
}
?>
</select></td>
</tr>
<tr>
<td>Logo: </td><td><select name="logo" >
<option value="" selected="selected">Select a logo:</option>
<?php
$directory = 'images/logo/';
$files = array_diff(scandir($directory), array('..', '.'));
foreach($files as $file) 
{ 
      echo "<option value='$file'";
      if($logo == $file)
	  {echo " selected = 'selected'";}
	  echo ">".$file."</option>";  
}
?>
</select></td>
</tr>

<tr>
<td>Text:</td> <td><input type="text" name="text" value="<?php echo $text;?>"/></td>
</tr>
<tr>
<td>Pixel to move up:<br>(please review before input): </td><td><input type="text" name="y3" value="<?php echo $y3;?>"/></td>
</tr>
<tr>
<td>Expiration date: </td><td><input type="text" name="exp" value="<?php echo $exp;?>"/></td>
</tr>
<tr>
<td>Pixel to move down:<br>(please review before input): </td><td><input type="text" name="y4" value="<?php echo $y4;?>"/></td>
</tr>
<tr>
<td>Font size:<br> (suggested 12 for image width 290px): </td><td><input type="text" name="fontsize" value="<?php echo $fontsize;?>"/></td></tr>
<td>Characters per line:<br> (suggested 56 for image width 290px): </td><td><input type="text" name="cha" value="<?php echo $cha;?>"/>
</td></tr>
</table>
<input type="submit" name="submit" value="submit"/> 
</form>

</div>
<div style="float:right;">
<iframe NAME="iframe" WIDTH="700" HEIGHT="1200" frameborder=0 ></iframe></div>
</div>
</body>
</html>
