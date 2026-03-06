<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    
    <h1>Login</h1>
    <form method="POST" action="login.php">
        <label for="user">User:</label>
        <input type="text" name="user" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
    
    <?php 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = $_POST['user'];
            $password = $_POST['password'];

            // semplice autenticatione per demo,
            // in un'applicazione reale, dovresti usare una funzione un database e ...
            
            if ($user === 'admin' && $password === 'password123') {
                echo "<p>Login successful! Welcome, $user.</p>";
            } else {
                echo "<p>Invalid username or password. Please try again.</p>";
            }
        }
    ?>

</body>
</html>