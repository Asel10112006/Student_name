<?php

require_once "config/db.php";

$search = trim($_GET["search"] ?? "");
$category = $_GET["category"] ?? "";

$sql = "SELECT courses.*, categories.name AS category_name
        FROM courses
        LEFT JOIN categories
        ON courses.category_id = categories.id
        WHERE 1=1";

$params = [];

if ($search !== "") {
    $sql .= " AND (courses.title LIKE ?
               OR courses.description LIKE ?)";

    $params[] = "%$search%";
    $params[] = "%$search%";
}

if ($category !== "" && ctype_digit($category)) {
    $sql .= " AND courses.category_id = ?";
    $params[] = (int)$category;
}

$sql .= " ORDER BY courses.id DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute($params);

$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

$categories = $pdo->query(
    "SELECT * FROM categories ORDER BY name"
)->fetchAll(PDO::FETCH_ASSOC);

$pageTitle = "Онлайн курстар";

require_once "includes/header.php";

?>

<section class="container courses">

    <h1>Онлайн курстар</h1>

    <form method="GET">

        <input
            type="text"
            name="search"
            placeholder="Курс іздеу..."
            value="<?= htmlspecialchars($search) ?>"
        >

        <select name="category">
            <option value="">Барлық санаттар</option>

            <?php foreach ($categories as $cat): ?>

                <option
                    value="<?= $cat['id'] ?>"
                    <?= $category == $cat['id'] ? 'selected' : '' ?>
                >
                    <?= htmlspecialchars($cat['name']) ?>
                </option>

            <?php endforeach; ?>

        </select>

        <button type="submit">Іздеу</button>

    </form>

    <div class="cards">

        <?php foreach ($courses as $course): ?>

            <div class="card">

                <h3>
                    <?= htmlspecialchars($course['title']) ?>
                </h3>

                <p>
                    <?= htmlspecialchars($course['description']) ?>
                </p>

                <p>
                    Санаты:
                    <?= htmlspecialchars($course['category_name'] ?? 'Санатсыз') ?>
                </p>

                <p>
                    Бағасы:
                    <?= htmlspecialchars($course['price']) ?> ₸
                </p>

            </div>

        <?php endforeach; ?>

        <?php if (empty($courses)): ?>

            <p>Курстар табылмады.</p>

        <?php endif; ?>

    </div>

</section>

<?php require_once "includes/footer.php"; ?>