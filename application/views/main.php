<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title></title>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link rel="stylesheet" href="/css/style.css" type="text/css" />
    <link rel="stylesheet" href="/css/menu-left.css" type="text/css">
    <link rel="stylesheet" href="/css/main.css" type="text/css">
    <script src="/js/jquery.js" type="application/javascript" ></script>
    <script src="/js/script.js" type="text/javascript"></script>
</head>
<body>
<div class="wrapper">
	<div class="header">
        <div class="login">
            <?
            if(!isset($_SESSION)){
                session_start();
            }
            if(!empty($_SESSION['login'])){
                echo "<a href=".site_url().'/login/exit_session/'.">Выход</a> ";
                echo $_SESSION['login'];
            }?>
        </div>
        <a class="button1" href='/'>Главное Меню</a>
	</div><!-- .header-->

	<div class="middle">

		<div class="container">
			<div class="content">
				<h3>Здравствуйте!!!</h3>
                <p><q style="font-size: 50px;color: #00620C">Э</q>тот сайт,если можно так назвать,написан исключительно для демонстрации своих знаний.Он предназначен для будующего работодателя.</p>
                <p><q style="font-size: 50px;color: #00620C">С</q>айт написан на популярном frameworke CodeIgniter 2.2
                Это делалось ,что бы убить двух зайцев. Во первых подучить framework ,а во вторых показать, что я знаю концепцию MVC и ООП.
                По шагам я распишу как создавался сайт, что применялось при написании.</p>
                    Использовал AJAX,JS,JQuery,MySql,Html,CSS, ну и конечно мой любимый PHP.
                <p><q style="font-size: 50px;color: #00620C">В</q> разделе САЙТ содержится пошаговый алгоритм разработки сайта</p>
			</div><!-- .content-->
		</div><!-- .container-->

		<div class="left-sidebar">
            <div id='cssmenu'>
                <ul>
                    <li><a class="cssmenu" href='index.php/main/content/site' onclick="return false;"><span>Сайт</span></a></li>
                    <li><a class="cssmenu" href='index.php/main/content/php' onclick="return false;"><span>PHP</span></a></li>
                    <li><a class="cssmenu"href='index.php/main/content/css' onclick="return false;"><span>CSS</span></a></li>
                    <li><a class="cssmenu"href='index.php/main/content/javascript' onclick="return false;"><span>JavaScript</span></a></li>
                    <!--если пароль не введен то добавляем кнопку LOGIN-->
                    <?if(empty($_SESSION['login'])){?>
                        <li><a class="cssmenu"href='index.php/login/'><span>LOGIN</span></a></li>
                    <?}?>
                    <!--Если пароль введен то добавляем кнопку Админка-->
                    <?if(!empty($_SESSION['login'])){?>
                        <li><a class="cssmenu"href='index.php/adminka/'><span>АДМИНКА</span></a></li>
                    <?}?>
                </ul>
            </div>
		</div><!-- .left-sidebar -->
        <div class="right-sidebar">
        </div>
	</div><!-- .middle-->

</div><!-- .wrapper -->

<div class="footer">
</div><!-- .footer -->
</body>
</html>