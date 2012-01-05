<?php
        header("Content-type: image/png");
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
        require('functions.php');

        $user = base64_decode($_GET['acc']);
        $pass = base64_decode($_GET['pwd']);
	$host = base64_decode($_GET['srv']);
	$data = unserialize(_check($user, $pass, $host));
        if ($data[0] == 'OK')
        {
                $traffic = round(($data[1] / 1000 / 1000 / 1000)).' GB';
		$r = 8;
		$g = 137;
		$b = 8;
		$x = 2;
		$s = 2;
        }
        else
        {
                $traffic = $data[0];
		$r = 255;
		$g = 0;
		$b = 0;
		$x = 1;
		$s = 3;
        }
	$im = ImageCreateFromPNG('images/traffic.png');
	$font = imagecolorallocate($im, $r, $g, $b);
	ImageString($im, $x, 40, $s, $traffic, $font);
        ImagePNG($im);
        Imagedestroy($im);
?>
