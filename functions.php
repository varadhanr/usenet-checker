<?php
        function _check($user, $pass, $host, $port = 119)
        {
                $fp = fsockopen($host, $port, $errno, $errstr, 5);
                if (!$fp)
                {
                        die("$errstr ($errno)\n");
                }
                else
                {
                        $data = "AUTHINFO USER ".$user."\r\n";
                        $data .= "AUTHINFO PASS ".$pass."\r\n";
                        $data .= "QUIT\r\n";
                        fwrite($fp, $data);
                        while (!feof($fp))
                        {
                                $data = fgets($fp, 128);
                                if ($ret = _parse($data)) return $ret;
                        }
                }
        }
        function _parse($data)
        {
		$data = trim(strtolower($data));
                $data = explode(" ", $data);
                if (is_numeric($data[0]))
                {
                        if ($data[0] == '281') $return = trim($data[4]);
			elseif ($data[0] == '482') {
				if ($data[1] == '(5)') $return = 'wrong password';
				elseif ($data[1] == '(4)') $return = 'limit exceeded';
				elseif ($data[1] == '(3)') $return = 'account disabled';
				elseif ($data[1] == '(2)') $return = 'unknown user';
				elseif ($data[2] == 'rejected') $return = 'unknown user';
                        	else $return = implode(" ", $data);
			}
			if (!empty($return)) return $return;
                }
        }
?>
