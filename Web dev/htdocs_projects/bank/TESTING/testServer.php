<?php

$sData = file_get_contents('https://kea.dk');
$sData = str_replace('Åbent hus', 'MAC PRO fro KEA student now', $sData);
echo $sData;