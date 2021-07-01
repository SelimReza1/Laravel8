@extends('layouts.master')
@section('title','Create Epost')

@section('content')
    <section style="padding-top: 40px">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            Edit Post
                        </div>
                        <div class="card-body">
                            @if(\Illuminate\Support\Facades\Session::has('post updated'))
                                <div class="alert alert-success">
                                    {{Session::get('post updated')}}
                                </div>
                            @endif
                            <form action="{{ route('eposts.update',$epost->id) }}" method="POST">
                                @csrf
                                    <div class="form-group">
                                    <label for="title">Epost Title</label>
                                    <input type="text" name="title" value="{{$epost->title}}" class="form-control" placeholder="Enter Epost Title" >
                                </div>
                                <div class="form-group">
                                    <label for="body">Epost Body</label>
                                    <input type="text" name="body" value="{{$epost->body}}" class="form-control" placeholder="Enter Epost Description" >
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
