<?php

function getConnection()
{
    static $connection;
    if ($connection === null) {
        $connection = mysqli_connect('localhost', 'root', '1q2w3e', 'tmp');
    }
    return $connection;
}