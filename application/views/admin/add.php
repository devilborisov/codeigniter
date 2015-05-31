
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title></title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
</head>
<body>
<form action= "<?site_url()."/adminka/add_content/"?>" method= "POST" enctype="multipart/form-data">
    <p>НАЗВАНИЕ ТЕМЫ</p>
    <input type="radio" name="theme" value="php"><label>php</label>
    <input type="radio" name="theme" value="css"><label>css</label>
    <input type="radio" name="theme" value="JavaScript"><label>js</label>
    <p> <textarea rows= "2" cols= "45" name= "title">Название статьи</textarea></p>
    <p> <textarea rows= "2" cols= "45" name= "short">Короткое содержание</textarea></p>
    <p> <textarea id="content" rows= "10" cols= "70" name= "content">Текст статьи</textarea></p>
    <input type= "submit" name="submit" value= "Отправить">
</form>
<a href="/index.php/adminka/">Вернуться к статьям</a>
</body>
</html>