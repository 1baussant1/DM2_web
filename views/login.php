<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Identifiez-vous</h1>
    <?php 
    
    if ($user) {
        ?>
        <p>Vous êtes connecté: <?= $user ?></p>
        <p><a href="/logout">Logout</a></p>
        <form action="/logout">
            <button>Logout</button>
        </form>
        <?php
    } else {
        ?>
        <form action="/login" method="post">
            <p><label>Login <input type="text" name="user"></label></p>
            <p><label>Pass <input type="password" name="pass"></label></p>
            <p><button>Login</button></p>
        </form>
        <?php
    }
    ?>
    
</body>
</html>