<?php
$s=fopen("php://stdin","r");
printf("username: ");
$user=rtrim(fgets($s,1024));
printf("password: ");
$pwd=rtrim(fgets($s,1024));
$salted=substr($user,0,2).$pwd.substr($user,2);
$md=md5($salted);
printf($md."\n");
?>
