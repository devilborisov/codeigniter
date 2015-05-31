<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title></title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
</head>
<body>
<? if(isset($row))
foreach($row as $item):?>
<form action= "<?site_url()."adminka/edit_content/".$item['id']?>" method= "POST"enctype="multipart/form-data">
    <p>НАЗВАНИЕ ТЕМЫ</p>
    <p> <textarea rows= "2" cols= "45" name= "title"> <?=$item['title'];?></textarea></p>
    <p> <textarea rows= "2" cols= "45" name= "short"> <?=$item['short_text'];?></textarea></p>
    <p>ТЕКСТ МАТЕРИАЛА </p>
    <p> <textarea id="content" rows= "10" cols= "70" name= "content"><?=$item['full_text'];?></textarea></p>
    <input type= "submit" name="submit" value= "Отправить">
    <?endforeach?>
</form>
<a href="../">Вернуться к статьям</a>
</body>
</html>