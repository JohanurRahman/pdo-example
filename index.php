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


    
    #### PDO Query

    // $stmt = $pdo->query('SELECT * FROM posts');

    # Fetch as an array
    // while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //     echo $row['title'] . "\n";
    // }
        
    # Fetch as an object

    // while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
    //     echo $row->title . "\n";
    // }

    # Using default fetch mode

    // while($row = $stmt->fetch()) {
    //     echo $row->title . "\n";
    // }


    #### Prepared Statements (prepare & execute)

    # Unsafe way
    // $sql = "SELECT * FROM posts where author = '$author'";

    # Safe way

    # Fetch Multiple Posts

    // User Input
    $author = 'Steve';
    $is_published = true;

    // Positional Params

    $sql = 'SELECT * FROM posts where author = ? && is_published = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$author, $is_published]);
    $posts = $stmt->fetchAll();

    var_dump($posts);
    foreach ($posts as $post) {
        echo $post->title . "\n";
    }


?>