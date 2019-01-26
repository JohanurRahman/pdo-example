<?php

    $host = 'localhost';
    $user = 'root';
    $password = 'root';
    $dbname = 'pdoposts';


    # Set DSN (Data Source Name)
    # DSN - Which is basically a string that has the associated
    # data structure to describe a connection to a data source

    $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

    # Create a PDO instance
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

?>