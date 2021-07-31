<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Infinite scroll pagination</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"></head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
<section style="padding-top: 50px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">Infinite Scroll Pagination</h2>
            </div>
            <div class="col-md-12" id="postscroll-data">
                @include('data');
            </div>
        </div>
    </div>
</section>
<div class="ajax-load text-center" style="display: none">
    <p><img src="{{asset('images/loader.gif')}}"/>Loading More Post</p>
</div>

<script>
    function loadMoreData(page){
        $.ajax({
            url:'?page' + page,
            type:'get',
            beforeSend: function (){
                $('.ajax-load').show();
            }
        })
        .done(function (data){
            if(data.html ==" "){
            $(".ajax-load").html("No more data found");
            return
            }
            $(".ajax-load").hide();
            $("#postscroll-data").append(data.html);
        })
        .fail(function (jqXHR,ajaxOptions,thrownError){
            alert("server not responding...");
        });
    }
    var page=1;
    $(window).scroll(function (){
       if($(window).scrollTop() + $(window).height() >= $(document).height()){
           page++;
           loadMoreData(page);
       }
    });
</script>
</body>
</html>
