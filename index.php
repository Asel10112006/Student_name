<?php

require_once "config/db.php";

$pageTitle = "Басты бет";

require_once "includes/header.php";

?>

<section class="hero">

    <div class="container">

        <h1>Білім алудың жаңа мүмкіндігі!</h1>

        <p>
            Өзіңе қажетті онлайн курстарды таңда.
            Жаңа білім алып, қабілеттеріңді дамыт.
        </p>

        <a href="courses.php" class="main-btn">
            Курстарды қарау
        </a>

    </div>

</section>

<section class="features container">

    <h2>Біздің мүмкіндіктеріміз</h2>

    <div class="cards">

        <div class="card">
            <h3>📚 Әртүрлі курстар</h3>
            <p>Әртүрлі бағыттағы курстарды таңдау.</p>
        </div>

        <div class="card">
            <h3>💻 Онлайн оқу</h3>
            <p>Кез келген уақытта білім алу.</p>
        </div>

        <div class="card">
            <h3>🎓 Даму</h3>
            <p>Өз қабілеттеріңді дамыту.</p>
        </div>

    </div>

</section>

<?php require_once "includes/footer.php"; ?>