<!DOCTYPE html>
<html lang="kk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тіркелу</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="form-container">

    <h2>Тіркелу</h2>

    <form action="register.php" method="POST">

        <input type="text" name="name"
               placeholder="Аты-жөніңіз" required>

        <input type="email" name="email"
               placeholder="Электрондық пошта" required>

        <input type="password" name="password"
               placeholder="Құпиясөз" required>

        <button type="submit">Тіркелу</button>

    </form>

    <p>Аккаунтыңыз бар ма?
        <a href="login.php">Жүйеге кіру</a>
    </p>

</div>

</body>
</html>