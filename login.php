<?php

require_once "config/db.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";

    if ($email === "" || $password === "") {

        $error = "Барлық өрістерді толтырыңыз.";

    } else {

        $sql = "SELECT * FROM users WHERE email = ?";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify(
            $password,
            $user["password"]
        )) {

            session_regenerate_id(true);

            $_SESSION["user_id"] = $user["id"];
            $_SESSION["user_name"] = $user["name"];
            $_SESSION["role"] = $user["role"];

            header("Location: courses.php");
            exit;

        } else {

            $error = "Email немесе құпиясөз қате.";
        }
    }
}

$pageTitle = "Жүйеге кіру";
require_once "includes/header.php";

?>

<div class="form-container">

    <h2>Жүйеге кіру</h2>

    <?php if ($error): ?>
        <p style="color:red;">
            <?= htmlspecialchars($error) ?>
        </p>
    <?php endif; ?>

    <form method="POST">

        <input type="email" name="email"
               placeholder="Email" required>

        <input type="password" name="password"
               placeholder="Құпиясөз" required>

        <button type="submit">Кіру</button>

    </form>

    <p>Аккаунтыңыз жоқ па?
        <a href="register.php">Тіркелу</a>
    </p>

</div>

<?php require_once "includes/footer.php"; ?>