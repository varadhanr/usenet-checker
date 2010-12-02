<?php
	require('functions.php');

	$user = $_GET['acc'];
	$pass = $_GET['pwd'];
	$data = _check($user, $pass); 
	if (is_numeric($data)) 
	{
		$status = 'OK';
		$traffic = round(($data / 1000 / 1000)) . ' MB'.' / '.round(($data / 1000 / 1000 / 1000)) . ' GB';
	}
	else 
	{
		$status = $data;
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
	$img = sprintf('image.php?acc=%s=&pwd=%s', $user, $pass);
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
	$bbcode = '[url=http://%s/][img]http://%s/image.php?acc=%s=&pwd=%s[/img][/url]';
	$bbcode = sprintf($bbcode, $_SERVER['SERVER_NAME'], $_SERVER['SERVER_NAME'], $user, $pass);
?>
		<td><input class="box" type="text" value="<?=$bbcode?>" onmouseover="high(this)" onclick="high(this)" /></td>
	</tr>
</table>

