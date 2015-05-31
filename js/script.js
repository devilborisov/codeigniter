$(document).ready(function() {
    //после загрузки страницы отправляем AJAX запрос контроллеру и получаем данные о последних статьях
    $.ajax({
        type:"POST",
        url:"index.php/main/lenta/",
        success:function(data){
            //при нажатии на ссылки ленты справа ,загружаем туда последние статьи
            $('.right-sidebar').html(data)
            $('.linker').click(function(){
                var r=this.href;
                $.ajax({
                    type:"POST",
                    url:r,
                    success:function(data){
                        $('div.content').html(data);
                    }
                });
            });
        }
    });
    $('a.cssmenu').click(function (){
        //получаем ссылку
        var hre=this.href;
        //отправляем Запрос AJAX по ссылке hre
        $.ajax({
            type:"POST",
            url:hre,
            //при удачной отправке возвращаем данные и загружаем их на страницу
            success:function(data){
                $('div.content').html(data);
            //что бы работало одновременно и правое меню с оследними статьями дописываем функцию
                $('.linker').click(function () {
                   var r=this.href;
                    $.ajax({
                        type:"POST",
                        url:r,
                        success:function(data){
                            $('div.content').html(data);
                        }
                    });
                });
            }

        });
    });
});
