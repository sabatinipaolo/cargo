<!DOCTYPE html>
<html>

<head>
    <title>Login CARGO</title>
    <script>
        async function authenticate_function(event) {
            event.preventDefault();

            document.getElementById('messaggio').innerHTML = "Verifico le credenziali...";
            document.getElementById('bottone').disabled = true;


            const user = document.getElementById('user').value;
            const password = document.getElementById('password').value;


            const response = await fetch('authenticate_cargo.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    user,
                    password
                }),
            });

            // Controlla che la risposta sia JSON valido
            const text = await response.text();
            try {
                result = JSON.parse(text);
            } catch {
                throw new Error('Risposta non valida dal server');
            }

            if (result.success) {
                document.getElementById('messaggio').innerHTML = "<p>Login successful! Welcome," + user + "</p>";

            } else {
                document.getElementById('messaggio').innerHTML = "<p>Invalid username or password. Please try again.</p>";
            }
            document.getElementById('bottone').disabled = false;
        }
    </script>
</head>

<body>

    <h1>Login</h1>
    <form onSubmit="authenticate_function(event)">
        <label for="user">User:</label>
        <input type="text" id="user" name="user" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit" id="bottone">Login</button>
    </form>

    <div id="messaggio">
    </div>

</body>

</html>