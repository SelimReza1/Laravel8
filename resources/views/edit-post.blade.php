<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-3">
            <div class="card">
                <div class="card-header">
                    Add new post
                </div>
                <div class="card-body">
                    @if(Session::has('post_updated'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('post_updated')}}
                        </div>
                    @endif
                    <form method="POST" action="{{route('post.update')}}">
                        @csrf
                        <input type="hidden" name="id" value="{{$post->id}}">
                        <div class="form-group">
                            <label for="title">post Title</label>
                            <input type="text" name="title" class="form-control" value="{{$post->title}}">
                        </div>
                        <div class="form-group">
                            <label for="body">post Description</label>
                            <textarea type="text" name="body" class="form-control">{{$post->body}}</textarea>
                        </div>
                        <input type="submit" value="submit" class="btn btn-primary mt-3">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
