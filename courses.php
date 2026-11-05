<!DOCTYPE html>
<html lang="kk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Онлайн курстар</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header>
    <div class="container navbar">
        <h2>Online Courses</h2>

        <nav>
            <a href="index.php">Басты бет</a>
            <a href="courses.php">Курстар</a>
            <a href="login.php">Кіру</a>
        </nav>
    </div>
</header>

<section class="container courses">

    <h1>Біздің онлайн курстар</h1>

    <input type="text" id="search"
           placeholder="Курс іздеу...">

    <div class="cards" id="courseList">

        <div class="card">
            <h3>Web бағдарламалау</h3>
            <p>HTML, CSS және PHP негіздері.</p>
            <button>Курс туралы</button>
        </div>

        <div class="card">
            <h3>Python бағдарламалау</h3>
            <p>Python тілін үйрену.</p>
            <button>Курс туралы</button>
        </div>

        <div class="card">
            <h3>Графикалық дизайн</h3>
            <p>Дизайн және шығармашылық.</p>
            <button>Курс туралы</button>
        </div>

    </div>

</section>

<script src="assets/js/script.js"></script>

</body>
</html>