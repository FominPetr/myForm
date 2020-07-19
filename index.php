<html lang="ru">
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/main.css" />
    <title>Тестовое задание</title>
</head>

<body>
   <div class="left"></div>
   <div class="center">
       <form class="decor" method="post">
        <div class="form-inner">
            <h3>Написать нам</h3>
            <input type="text" id="surname" name="surname" placeholder="Фамилия" required>
            <input type="text" id="name" name="name" placeholder="Имя" required>
            <input type="text" id="lastName" name="lastName" placeholder="Отчество" required>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <textarea id="comment" name="comment" placeholder="Сообщение..." rows="3" required></textarea>
            <button id="send">Отправить</button>
        </div>
    </form>
    </div>
   <div class="right"></div>
</body>
<script src="js/mainFunc.js"></script>
</html>