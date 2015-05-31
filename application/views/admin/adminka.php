<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>
<body>
<a href="<?=site_url();?>">НА ГЛАВНУЮ</a>
<div class="admin"><?foreach($row as $item):?>
        <?= $item['id'].")";?>
       <?= $item['title']."<br>";?>
        <a href="<?=site_url()."/adminka/edit_content/".$item['id']?>">Edit</a>
        <a href="<?=site_url()."/adminka/del_content/".$item['id']?>">DELETE</a><br><br>
       <? endforeach?>
    <a href="/index.php/adminka/add_content">Добавить статью</a>
    </div>
</body>
</html>