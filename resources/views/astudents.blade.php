<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student Insert By Ajax</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"></head>
</head>
<body>
<section style="margin-top: 50px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Students <a href="#" class="btn btn-success" data-toggle="modal" data-target="#studentModal">Add Student</a>
                    </div>
                    <div class="card-body">
                        <table id="astudentTable" class="table">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </tr>
                        </thead>
                            <tbody>
                            @foreach($astudents as $astudent)
                                <tr>
                                    <td>{{$astudent->id}}</td>
                                    <td>{{$astudent->firstname}}</td>
                                    <td>{{$astudent->lastname}}</td>
                                    <td>{{$astudent->email}}</td>
                                    <td>{{$astudent->phone}}</td>
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

<!-- Modal -->
<div class="modal fade" id="studentModal" tabindex="-1" role="dialog" aria-labelledby="studentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="studentModalLabel">Add New Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="studentForm">
                    @csrf
                    <div class="form-group">
                        <label for="firstname">FirstName</label>
                        <input type="text" id="firstname" name="firstname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="firstname">LastName</label>
                        <input type="text" id="lastname" name="lastname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="firstname">Email</label>
                        <input type="text" id="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="firstname">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script>
    $("#studentForm").submit(function (e){
        e.preventDefault();
        let firstname = $("#firstname").val();
        let lastname = $("#lastname").val();
        let email = $("#email").val();
        let phone = $("#phone").val();
        let _token = $("input[name=_token]").val();
        $.ajax({
            url: "{{route('astudent.add')}}",
            type: "POST",
            data: {
                firstname:firstname,
                lastname:lastname,
                email:email,
                phone:phone,
                _token:_token

            },
            success: function (response)
            {
                if (response)
                {
                    $("#astudentTable tbody").prepend('<tr><td>'+response.id+'</td><td>'+response.firstname+'</td><td>'+response.lastname+'</td><td>'+response.email+'</td><td>'+response.phone+'</td></tr>')
                    $('#studentForm')[0].reset();
                        $('#studentModal').modal('hide');
                }
            }
        });
    });
</script>
</body>
</html>
