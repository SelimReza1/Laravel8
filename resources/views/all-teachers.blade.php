<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Teacher</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<section style="padding-top: 20px">
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3>All Teachers <a href="/add-teacher" class="btn btn-success">Add Teacher</a> </h3>
                    </div>
                    <div class="card-body">
                        @if(Session::has('teacher_deleted'))
                            <div class="alert alert-success" role="alert">
                                {{Session::get('teacher_deleted')}}
                            </div>
                        @endif

                       <table class="table table-striped">
                           <thead>
                           <tr>
                               <th>Id</th>
                               <th>Name</th>
                               <th>Profile Image</th>
                               <th>Action</th>
                           </tr>
                           </thead>
                           <tbody>
                           @foreach($teachers as $teacher)
                           <tr>
                               <td>{{$teacher->id}}</td>
                               <td>{{$teacher->name}}</td>
                               <td><img src="{{asset('images')}}/{{$teacher->profileImage}}" style="max-width: 60px" /> </td>
                               <td><a href="/edit-teacher/{{$teacher->id}}" class="btn btn-primary">Edit</a> | <a href="/delete-teacher/{{$teacher->id}}" class="btn btn-danger">Delete</a> </td>
                           </tr>
                           @endforeach
                           </tbody>
                       </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
