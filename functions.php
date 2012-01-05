<?php
        function _check($user, $pass, $host, $port = 119)
        {
                $fp = @fsockopen($host, $port, $errno, $errstr, 5);
                if (!$fp)
                {
                        die("$errstr ($errno)\n");
                }
                else
                {
			stream_set_timeout($fp, 2);

			fwrite($fp, "AUTHINFO USER ".$user."\r\n");
			fwrite($fp, "AUTHINFO PASS ".$pass."\r\n");
			fwrite($fp, "QUIT\r\n");

                        while (!feof($fp))
                        {
                                $data = fgets($fp, 128);
				$info = stream_get_meta_data($fp);
				if ($info['timed_out'])
				{
					$fin[0] = 'ERROR';
					$fin[1] = 'Connection timed out!';
					return serialize($fin);
				}
				elseif ($ret = _parse($data))
				{
					$fin[0] = 'OK';
					$fin[1] = $ret;
					return serialize($fin);
				}
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
