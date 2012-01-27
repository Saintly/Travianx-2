<?php 
class WebHelper{

	public function sendMail($to, $from, $subject, $message){
		$subject = sprintf( "=?utf-8?B?".base64_encode( $subject )."?=" );
		$headers = sprintf( "To: %s <%s>\nFrom: %s\nMIME-Version: 1.0\nContent-type: text/html; charset=utf-8", $to, $to, $from );
		return mail( $to, $subject, $message, $headers );
	}

	public function getDomain(){
		$surl = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$surl = preg_replace( "/^(www\\.)/", "", $surl );
		$arr = explode( "/", $surl );
		$count = sizeof( $arr ) - 1;
		if ( 0 < $count ){
			$surl = "";
			$i = 0;
			while ( $i < $count ){
				$surl .= $arr[$i]."/";
				++$i;
			}
		}
		return strtolower( $surl );
	}

	public function getBaseUrl(){
		return ( WebHelper::isssl( ) ? "https://" : "http://" ).$_SERVER['HTTP_HOST'].strrev( strstr( strrev( $_SERVER['PHP_SELF'] ), "/" ) );
	}

	public function isSSL(){
		return !( !isset( $_SERVER['HTTPS'] ) || preg_match( "/^(|off|false|disabled)\$/i", $_SERVER['HTTPS'] ) );
	}

	public function getClientIP(){
		$ip = "";
		if ( isset( $_SERVER['REMOTE_ADDR'] ) ){
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		else if ( isset( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ){
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		else if ( isset( $_SERVER['HTTP_CLIENT_IP'] ) ){
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		}
		return $ip;
	}

	public function secondsToString( $seconds ){
		$seconds = intval( $seconds );
		$h = floor( $seconds / 3600 );
		$m = floor( $seconds % 3600 / 60 );
		$s = floor( $seconds % 60 );
		if ( $h < 0 || $m < 0 || $s < 0 ){
			return "0:00:00<a href=\"#\" onclick=\"return showManual(7,0);\">?</a>";
		}
		return $h.":".( $m < 10 ? "0" : "" ).$m.":".( $s < 10 ? "0" : "" ).$s;
	}

	public function getDistance( $lat1, $lon1, $lat2, $lon2, $radius ){
		$angle = $radius / 180;
		$lat1 /= $angle;
		$lon1 /= $angle;
		$lat2 /= $angle;
		$lon2 /= $angle;
		return rad2deg( acos( sin( deg2rad( $lat1 ) ) * sin( deg2rad( $lat2 ) ) + cos( deg2rad( $lat1 ) ) * cos( deg2rad( $lat2 ) ) * cos( deg2rad( $lon1 - $lon2 ) ) ) ) * $angle;
	}
}