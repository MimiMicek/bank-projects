<?php
$sUserId = $_GET['sUserId'];
$sMessages = file_get_contents("../data/to-$sUserId.txt");
file_put_contents("../data/to-$sUserId.txt", '');
echo $sMessages;