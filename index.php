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
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    
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
    $id = 1;
    $limit = 3;

    // Positional Params

    // $sql = 'SELECT * FROM posts where author = ? && is_published = ?';
    $sql = 'SELECT * FROM posts where author = ? && is_published = ? LIMIT ?';
    $stmt = $pdo->prepare($sql);
    // $stmt->execute([$author, $is_published]);
    $stmt->execute([$author, $is_published, $limit]);
    $posts = $stmt->fetchAll();

    // var_dump($posts);
    foreach ($posts as $post) {
        echo $post->title . "\n";
    }


    // Named Params

    // $sql = 'SELECT * FROM posts where author = :author';
    // $sql = 'SELECT * FROM posts where author = :author && is_published = :is_published' ;
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute(['author' => $author, 'is_published' => $is_published]);
    // $posts = $stmt->fetchAll();

    // var_dump($posts);
    // foreach ($posts as $post) {
    //     echo $post->title . "\n";
    // }


    # Fetch Single Post

    // $sql = 'SELECT * FROM posts where id = :id' ;
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute(['id' => $id]);
    // $posts = $stmt->fetch();

    // echo $posts->body . "\n";

    # GET ROW COUNT

    // $sql = 'SELECT * FROM posts where author = ?';
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute([$author]);
    // $postCount = $stmt->rowCount();

    // echo $postCount;

    # INSERT DATA

    // $title = 'Post Six';
    // $body = 'This is post Six';
    // $author = 'Ross';
    // $is_published = false;
    

    // $sql = 'INSERT INTO posts(title,body,author,is_published) VALUES (:title, :body, :author, :is_published)';
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute(['title' => $title, 'body' => $body, 'author' => $author, 'is_published' => $is_published]);
    // echo 'Post Added';

    
    # UPDATE DATA

    // $id = 5;
    // $body = 'This is the updated post';
    // $author = 'Arafat';
    // $is_published = false;
    

    // $sql = 'UPDATE posts SET body = :body, author = :author, is_published = :is_published WHERE id = :id';
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute(['body' => $body, 'author' => $author, 'is_published' => $is_published, 'id' => $id]);
    // echo 'Post Updated';

    
    # DELETE DATA

    // $id = 6;

    // $sql = 'DELETE FROM posts WHERE id = :id';
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute(['id' => $id]);
    // echo 'Post Deleted';


    
    # SEARCH DATA

    // $search ="%post%";
    // $sql = 'SELECT * FROM posts WHERE title LIKE ?';
    // $stmt = $pdo->prepare($sql);
    // $stmt->execute([$search]);
    // $posts = $stmt->fetchAll();

    // foreach ($posts as $post) {
    //     echo $post->title . "\n";
    // }




?>