<?php
session_start();//MUST have to use it 
session_destroy();

header('Location: login.php');