<?php

require_once 'classes/Home.php';

$home = new Home();
echo "<pre>";
print_r($home);
echo $home->property;
echo $home->generateMeta();
echo "</pre>";
exit();