<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="kk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($pageTitle ?? "Online Courses") ?></title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <div class="container navbar">

        <h2>Online Courses</h2>

        <nav>
            <a href="index.php">Басты бет</a>
            <a href="courses.php">Курстар</a>

            <?php if (isset($_SESSION['user_id'])): ?>

                <span>
                    <?= htmlspecialchars($_SESSION['user_name']) ?>
                </span>

                <a href="logout.php">Шығу</a>

            <?php else: ?>

                <a href="login.php">Кіру</a>
                <a href="register.php">Тіркелу</a>

            <?php endif; ?>

        </nav>

    </div>
</header>