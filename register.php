<?php

require_once "config/db.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";

    if ($name === "" || $email === "" || $password === "") {
        $error = "Барлық өрістерді толтырыңыз.";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Электрондық пошта дұрыс емес.";

    } elseif (strlen($password) < 8) {
        $error = "Құпиясөз кемінде 8 таңбадан тұруы керек.";

    } else {

        $check = $pdo->prepare(
            "SELECT id FROM users WHERE email = ?"
        );

        $check->execute([$email]);

        if ($check->fetch()) {
            $error = "Бұл электрондық пошта тіркелген.";

        } else {

            $hashedPassword = password_hash(
                $password,
                PASSWORD_DEFAULT
            );

            $sql = "INSERT INTO users
                    (name, email, password, role)
                    VALUES (?, ?, ?, 'user')";

            $stmt = $pdo->prepare($sql);

            $stmt->execute([
                $name,
                $email,
                $hashedPassword
            ]);

            header("Location: login.php");
            exit;
        }
    }
}

$pageTitle = "Тіркелу";
require_once "includes/header.php";

?>

<div class="form-container">

    <h2>Тіркелу</h2>

    <?php if ($error): ?>
        <p style="color:red;">
            <?= htmlspecialchars($error) ?>
        </p>
    <?php endif; ?>

    <form method="POST">

        <input type="text" name="name"
               placeholder="Аты-жөніңіз" required>

        <input type="email" name="email"
               placeholder="Электрондық пошта" required>

        <input type="password" name="password"
               placeholder="Құпиясөз" required>

        <button type="submit">Тіркелу</button>

    </form>

    <p>Аккаунтыңыз бар ма?
        <a href="login.php">Кіру</a>
    </p>

</div>

<?php require_once "includes/footer.php"; ?>