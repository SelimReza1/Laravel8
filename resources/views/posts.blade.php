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
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    All Posts
                </div>
                <div class="card-body">
                    @if(Session::has('post_deleted'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('post_deleted')}}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>{{$post->title}}</td>
                            <td>{{$post->body}}</td>
                            <td><a class="btn btn-success" href="/single-post/{{$post->id}}">View</a></td>
                            <td><a class="btn btn-primary" href="/edit-post/{{$post->id}}">Edit</a></td>
                            <td><a class="btn btn-danger" href="/delete-post/{{$post->id}}">Delete</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
