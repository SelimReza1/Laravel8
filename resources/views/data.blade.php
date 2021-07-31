@foreach($posts as $post)
<div class="card">
    <div class="card-header">
        <h1><a href="#"> {{$post->title}}</a></h1>
    </div>
    <div class="card-body">
        <p>{{$post->body}}</p>
        <div class="text-center">
            <button type="button" class="btn btn-success">Read More</button>
        </div>
    </div>
</div>
@endforeach
