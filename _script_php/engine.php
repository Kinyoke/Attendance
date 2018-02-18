<?php
    // $LAN_IP_ADDRESS = "";
    // $WAN_IP_ADDRESS = "";
    
    $ip = $_SERVER['REMOTE_ADDR']?:($_SERVER['HTTP_X_FORWARDED_FOR']?:$_SERVER['HTTP_CLIENT_IP']);
    echo "CLIENT IP_ADDRESS: $ip"."<br>";

    //$externalContent = file_get_contents('http://checkip.dyndns.com/');
   // preg_match('/Current IP Address: \[?([:.0-9a-fA-F]+)\]?/', $externalContent, $m);
    //$externalIp = $m[1];
    //echo "WAN IP_ADDRESS: $externalIp";

?>
