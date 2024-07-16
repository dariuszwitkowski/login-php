<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="/assets/css/global.css">
</head>
<body>
    <div class="container">
        <?php include __DIR__ . '/Components/header.php'; ?>
        <form method="POST" action="/authenticate">
            <input type="text" id="username" name="username" placeholder="Username" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <button class="button" type="submit">Login</button>
        </form>
    </div>
</body>
</html>