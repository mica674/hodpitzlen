<?php

$con = mysqli_connect("localhost", "ouioui", "ouiOUI123&", "hospitale2n");

if (!$con) {
    echo 'Connection failed' . mysqli_connect_error();
}