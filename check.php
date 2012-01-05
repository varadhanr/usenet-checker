<?php
	require('functions.php');

	$user = $_GET['acc'];
	$pass = $_GET['pwd'];
	$host = $_GET['srv'];
	$data = unserialize(_check($user, $pass, $host));
	if ($data[0] == 'OK')
	{
		$status = 'OK';
		$traffic = round(($data / 1000 / 1000)) . ' MB'.' / '.round(($data[1] / 1000 / 1000 / 1000)) . ' GB';
	}
	elseif ($data[0] == 'ERROR')
	{
		$status = $data[1];
		$traffic = 0;
	}
	else
	{
		$status = $data[0];
		$traffic = 0;
	}
?>

<table class="table">
	<tr>
		<td align="left">Account</td>
		<td>:</td>
		<td><b><?=$user?></b></td>
	</tr>
	<tr>
		<td align="left">Passwort</td>
		<td>:</td>
		<td><b><?=$pass?></b></td>
	</tr>
	<tr>
		<td align="left">Server</td>
		<td>:</td>
		<td><b><?=$host?></b></td>
	</tr>
	<tr>
		<td align="left">Status</td>
		<td>:</td>
		<td><b><?=$status?></b></td>
	</tr>
<?php if ($traffic > 0) { ?>
	<tr>
		<td align="left">Traffic</td>
		<td>:</td>
		<td><b><?=$traffic?></b></td>
	</tr>
<?php 
}
	$user = base64_encode($user);
	$pass = base64_encode($pass);
	$host = base64_encode($host);
	$img = sprintf('image.php?acc=%s=&pwd=%s&srv=%s', $user, $pass, $host);
?>
	<tr>
		<td align="left">Image</td>
		<td>:</td>
		<td><img src="<?=$img?>" alt="" /></td>
	</tr>
	<tr>
		<td align="left">BBCode</td>
		<td>:</td>
<?php
	$bbcode = '[url=http://%s/][img]http://%s/image.php?acc=%s=&pwd=%s&srv=%s[/img][/url]';
	$bbcode = sprintf($bbcode, $_SERVER['SERVER_NAME'], $_SERVER['SERVER_NAME'], $user, $pass, $host);
?>
		<td><input class="box" type="text" value="<?=$bbcode?>" onmouseover="high(this)" onclick="high(this)" /></td>
	</tr>
</table>

