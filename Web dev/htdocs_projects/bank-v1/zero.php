<?php

echo 'zero';
include __DIR__ . '/folderOne/one.php';//if we dont use the __DIR__ var it will always refer to the wrong path
echo __LINE__;//spotting errors shows the error line number