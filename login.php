<!DOCTYPE html>
<html lang="kk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Жүйеге кіру</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="form-container">

    <h2>Жүйеге кіру</h2>

    <form action="login.php" method="POST">

        <input type="email" name="email"
               placeholder="Электрондық пошта" required>

        <input type="password" name="password"
               placeholder="Құпиясөз" required>

        <button type="submit">Кіру</button>

    </form>

    <p>Аккаунтыңыз жоқ па?
        <a href="register.php">Тіркелу</a>
    </p>

</div>

</body>
</html>