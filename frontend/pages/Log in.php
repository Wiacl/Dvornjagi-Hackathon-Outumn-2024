
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = $_POST['email'];
    $passwordone = $_POST['passwordone'];
    $passwordtwo = $_POST['passwordtwo'];
    $text = $_POST['text'];
    


    // Проверка данных
    if ($passwordone == $passwordtwo) {

        $content = file_get_contents('../data.json');
        $jsonData = json_decode($content,true);
        $jsonData[$email] = $passwordone;
    
        $postjson = json_encode($jsonData,JSON_FORCE_OBJECT);
        file_put_contents('../data.json', $postjson);
        header("Location: ../index.php");
        exit();
    } else {
        echo "Пароли не совпадают.";
    }


    

    
}
?>



<!DOCTYPE html>

<html lang="ru" >
<head>
    <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./../CSS/normalize.css">
        <link rel="stylesheet" href="./../CSS/Log in.css">
        <link rel="stylesheet" href="../CSS/adptive_login.css">
        <title>Log in</title>
</head>
<body>
        <header class="header">
            <div class="container">
                <div class="head_cont">
                    <a href="./dashboard.html" class="logo">
                        <img src="../images/logo1.png" alt="Логотип сайта" class="logo-img">
                    </a>
                    <div class="nav_cont">
                        <nav class="nav">
                            <ul class="menu">
                                <li class="menu_item">
                                    <a href="../pages/AboutUs.html" class="menu-link">О нас</a>
                                </li>
                                <li class="menu_item">
                                    <a href="../pages/Support.html" class="menu_link">Поддержка</a>
                                </li>
                                <li class="menu_item">
                                    <a href="#" class="menu_link">Контакты</a>
                                </li>
                            </ul>
                            <a href="#" class="cab">Кабинет</a>
                            <a href="#" class="logo">
                                <img src="../images/icon.png" alt="logo">
                            </a>
                        </nav>
                    </div>
            </div>
        </header>
        <main class="main">
            <section class="enter">
                <div class="container">
                    <div class="container_enter">
                        <img src="../images/endless-todo-list.png 1.png" alt="" class="container_enter_img">
                        <div class="out_enter">
                            <div class="in_enter">
                                <p class="name_enter">Регистрация</p>
                        
                                <form action="" class="enter_form" id="enter" method="post">
                                    <input type="text" name = "text" class="enter_input" placeholder="Логин" id="username">
                                    <input type="email" name= "email"  class="enter_input" placeholder="Email" id="email">
                                    <input type="password" name = "passwordone" class="enter_input" placeholder="Пароль" id="password">
                                    <input type="password" name = "passwordtwo" class="enter_input" placeholder="Повторите пароль" id="password2">
                                </form>

                                <p class="already_reg"><a href="./../enter.html" class="a_alrd_reg">Уже зарегистрированны?</a></p>
                                <button type="submit" class="enter_button" form="enter" id="enter">Зарегистрироваться</button>
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
                                <a href="#" class="menu_link"><img src="../images/hh.png" alt="" class="menu_hh"></a>
                            </li>
                            <li class="menu_item">
                                <a href="#" class="menu_link"><img src="../images/vk.png" alt="" class="menu_hh"></a>
                            </li>
                            <li class="menu_item">
                                <a href="#" class="menu_link"><img src="../images/tg.png" alt="" class="menu_hh"></a>
                            </li>
                        </ul>
                    </nav>
            </div>
        </footer>
</body>
</html>