<?php
require_once 'tunnel_api.php';

$tunnelAPI = new TunnelApi($_REQUEST['request']);
echo $tunnelAPI->processAPI();
?>
