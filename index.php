<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
        <head>
		<title>UseNet Account Checker</title>
		<script language="javascript" type="text/javascript" src="js/single.js"></script>
		<script language="javascript" type="text/javascript" src="js/multi.js"></script>
		<script language="javascript" type="text/javascript" src="js/site.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<meta http-equiv="Content-type" content="text/html; charset=UTF-8" /> 
	</head>
	<body>
		<div align="center">
			<a href="index.php"><img src="images/logo.png" border="0" alt="" /></a>
			<p style="font-weight: bold;">Willkommen auf dem UseNetChecker<br /> Bitte w&auml;hlen...</p>
			<p><a href="javascript:toggle('multi');">Multi</a> oder <a href="javascript:toggle('single');">Single</a></p>
			<div style="display:none" id="single">
				<form action="javascript:get(document.getElementById('singleform'));" name="singleform" id="singleform">
					<table class="table" cellspacing="1" width="220">
						<tr>
							<td>Account: </td>
							<td><input class="box" type="text" name="acc" id="acc" value="" /></td>
						</tr>
						<tr>
							<td>Passwort: </td>
							<td><input class="box" type="text" name="pwd" id="pwd" value="" /></td>
						</tr>
						<tr>
							<td align="center" colspan="2"><input class="button" type="submit" value="Check" /></td>
						</tr>
					</table>
				</form>
			</div>
			<div style="display:none" id="multi">
				<form action="javascript:getMulti();">
					<table class="table" cellspacing="1" width="220">
						<tr>
							<td>Info: </td>
							<td>Maximal 10 Accounts!</td>
						</tr>
						<tr>
							<td>Accounts: </td>
							<td><textarea style="border:1px solid #7F7F7F;" cols="25" rows="10" id="text" name="text">user:pass</textarea></td>
						</tr>
						<tr>
							<td></td>
							<td align="center" colspan="2"><input class="button" type="submit" value="Check" /></td>
						</tr>
					</table>
				</form>
			</div>
			<p id="status"></p>
			<div id="result"></div>
			<br />
			<img src="images/lala.png" alt="" />
			<p style="font:icon;">
				<a href="http://tamcore.eu" target="_blank">TamCore</a> | <a href="http://eddy.uni.cx" target="_blank">the|eddy</a>
			</p>
		</div>
	</body>
</html>
