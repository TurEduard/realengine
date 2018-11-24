<?php
function session( $sid = false ){
	global $config;
	
	$params = session_get_cookie_params();

	if ( DOMAIN ) $params['domain'] = DOMAIN;
	
	if ($config['only_ssl']) $params['secure'] = true;
	
	session_set_cookie_params($params['lifetime'], "/", $params['domain'], $params['secure'], true);

	if ( $sid ) @session_id ( $sid );

	@session_start();
}
function get_ip() {
	global $config;
	$ip = $_SERVER['REMOTE_ADDR'];

	$temp_ip = explode(",", $ip);

	if(count($temp_ip) > 1) $ip = trim($temp_ip[0]);

	if ( filter_var( $ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) ) {
		return filter_var( $ip , FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
	}

	if ( filter_var( $ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) ) {
		return filter_var( $ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6);
	}

	return 'not detected';
}
function check_ip($ips) {
	$_IP = get_ip();
	$blockip = false;

	if( is_array( $ips ) ) {
		if( strpos($_IP, ":") === false ) {
			$delimiter = ".";
		} else $delimiter = ":";
		
		$this_ip_split = explode( $delimiter, $_IP );
		$ip_lenght = count($this_ip_split);
		
		foreach ( $ips as $ip_line ) {
			$ip_arr = trim( $ip_line['ip'] );

			if( $ip_arr == $_IP ) {
				$blockip = $_IP;
				break;
			} elseif ( count(explode ('/', $ip_arr)) == 2 ) {
				if( maskmatch($_IP, $ip_arr) ) {
					$blockip = $ip_line['ip'];
					break;
				}
			} else {
				$ip_check_matches = 0;
				$db_ip_split = explode( $delimiter, $ip_arr );
				for($i_i = 0; $i_i < $ip_lenght; $i_i ++) {
					if( $this_ip_split[$i_i] == $db_ip_split[$i_i] or $db_ip_split[$i_i] == '*' ) {
						$ip_check_matches += 1;
					}
				
				}
				if( $ip_check_matches == $ip_lenght ) {
					$blockip = $ip_line['ip'];
					break;
				}
			}		
		}
	}
	
	return $blockip;
}
?>