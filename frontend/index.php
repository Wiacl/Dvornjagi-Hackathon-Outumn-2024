



<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;
            0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./CSS/normalize.css">
    <link rel="stylesheet" href="./CSS/index.css">
    <link rel="stylesheet" href="./CSS/adptive_reg.css">
    <title>Welcome page Campfire</title>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="head_cont">
                <a class="logo">
                    <img src="./images/logo1.png" alt="Логотип сайта" class="logo-img">
                </a>
                <div class="nav_cont">
                    <nav class="nav">
                        <ul class="menu">
                         <li class="menu_item">
                                <a href="./pages/AboutUs.html" class="menu-link">О нас</a>
                         </li>
                            <li class="menu_item">
                                <a href="./pages/Support.html" class="menu_link">Поддержка</a>
                            </li>
                            <li class="menu_item">
                                <a href="#" class="menu_link">Контакты</a>
                            </li>
                        </ul>
                        <a href="#" class="cab">Кабинет</a>
                        <a href="#" class="logo">
                            <img src="./images/icon.png" alt="logo">
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <main class="main">
        <section class="enter">
            <div class="container">
                <div class="container_enter">
                    <div class="out_enter">
                        <div class="in_enter">
                            <p class="name_enter">Вход</p>
                    
                            <form action="" method="post" class="enter_form" id="enter">
                                <input type="text" name = "email" class="enter_input" placeholder="Логин">
                      
                                <input type="password" name = "password" class="enter_input" placeholder="Пароль">
                            </form>
                            
                            <p class="already_reg"><a href="./pages/Log in.php" class="a_alrd_reg">Еще не зарегистрированны?</a></p>
                            <button type="submit" class="enter_button" form="enter">Войти</button>
                            <p class="a_alrd_reg"> <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (empty($email)){
        echo "Данные не соответствуют.";
    } else {
    $content = file_get_contents('data.json');
    $jsonData = json_decode($content,true);
    if ($jsonData[$email] == $password){
        header("Location: /pages/dashboard.html");
        exit();
    } else {
        echo "Данные не соответствуют.";
    }
}
}
?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer">
        <div class="container">
                <nav class="nav">
                    <ul class="menu">
                        <li class="menu_item">
                            © 2024
                        </li>
                        <li class="menu_item">
                            <a href="tel:84955405179" class="menu_number">8 495-540-51-79</a>
                        </li>
                        <li class="menu_item">
                            Политика обработки персональных данных
                        </li>
                        <li class="menu_item">
                            <a href="#" class="menu_link"><img src="./images/hh.png" alt="" class="menu_hh"></a>
                        </li>
                        <li class="menu_item">
                            <a href="#" class="menu_link"><img src="./images/vk.png" alt="" class="menu_hh"></a>
                        </li>
                        <li class="menu_item">
                            <a href="#" class="menu_link"><img src="./images/tg.png" alt="" class="menu_hh"></a>
                        </li>
                    </ul>
                </nav>
        </div>
    </footer>
</body>
</html>