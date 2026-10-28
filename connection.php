<?php

#set time zone
date_default_timezone_set('Asia/Kuala_Lumpur');

#
$condb = mysqli_connect('localhost','root','');

#
mysqli_select_db($condb, 'EasyMeet');
?>