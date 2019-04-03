<?php /* D:\WEB_Project\NORM\dev-test\resources\views/search.blade.php */ ?>
<!DOCTYPE html>
<body>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<style>
   .search{
   position:relative;
}

.search_airline{
    background: #FFF;
    border: 1px #ccc solid;
    width: 200px;
    border-radius: 4px;
    max-height:300px;
    overflow-y:scroll;
    display:none;
}

.search_airline li{
    list-style: none;
    padding: 5px 10px;
    margin: 0 0 0 -40px;
    color: #0896D3;
    border-bottom: 1px #ccc solid;
    cursor: pointer;
    transition:0.3s;
}

.search_airline li:hover{
    background: #F9FF00;
}
</style>


<hr>
<center>
Найти авиакомпанию: <form align="centre">
<input type="text" name="referalairline" placeholder="Живой поиск" value="" class="who"  autocomplete="off">
<ul class="search_airline"></ul>
</form>
</center>
<!-- -->

<script>    
$(function(){
    
//Живой поиск
$('.who').bind("change keyup input click", function() {
    if(this.value.length >= 2){
        $.ajax({
            type: 'post',
            url: 'searchairline', //Путь к обработчику
            data: {'referalairline':this.value},
            response: 'text',
            success: function(data){
                $(".search_airline").html(data).fadeIn(); //Выводим полученые данные в списке
           }
       })
    }
})
    
$(".search_airline").hover(function(){
    $(".who").blur(); //Убираем фокус с input
})
    
//При выборе результата поиска, прячем список и заносим выбранный результат в input
$(".search_airline").on("click", "li", function(){
    s_user = $(this).text();
    $(".who").val(s_user)
    //$(".who").val(s_user).attr('disabled', 'disabled'); //деактивируем input, если нужно
    $(".search_airline").fadeOut();
})

})
</script>


</body>
</html>