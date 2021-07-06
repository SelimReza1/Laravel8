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
                        <h3>Add Teacher</h3>
                    </div>
                    <div class="card-body">
                      @if(Session::has('teacher_updated'))
                          <div class="alert alert-success" role="alert">
                            {{Session::get('teacher_updated')}}
                          </div>
                          @endif
                        <form method="POST" action="{{route('teacher.update')}}" enctype="multipart/form-data" >
                            @csrf
                            <input type="hidden" name="id" value="{{$teacher->id}}">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" value="{{$teacher->name}}" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="image">Select Profile Image</label>
                                <input type="file" name="file" class="form-control" onchange="previewFile(this)">
                                <img id="previewImage" alt="Preview Image" src="{{asset('images')}}/{{$teacher->profileImage}}"  style="max-width: 200px; margin-top: 20px">
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];
        if (file){
            var reader =new FileReader();
            reader.onload= function (){
                $('#previewImage').attr("src",reader.result);
            }
            reader.readAsDataURL(file);
        }
    }
</script>
</body>
</html>
