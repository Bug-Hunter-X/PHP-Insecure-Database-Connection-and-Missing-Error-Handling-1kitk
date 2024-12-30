The improved code uses the PDO (PHP Data Objects) extension, which offers a more secure and robust way to interact with databases.  Prepared statements prevent SQL injection vulnerabilities.  Error handling is implemented to catch potential exceptions during database operations.
```php
<?php
  try {
    $pdo = new PDO('mysql:host=localhost;dbname=mydatabase', 'username', 'password');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = ?');
    $stmt->execute([$_POST['username']]);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Process the results
  } catch (PDOException $e) {
    // Handle errors appropriately (e.g., log the error, display a user-friendly message)
    echo 'Database error: ' . $e->getMessage();
  }
?>
```