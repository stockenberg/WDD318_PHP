<?php

require_once 'classes/Status.php';

$status = new Status();

$status2 = new Status(5);

echo $status->printEntryCount();
echo $status2->printEntryCount();
