@extends('layouts.master')
@section('title','Create Epost')

@section('content')
    <section style="padding-top: 40px">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    @if(\Illuminate\Support\Facades\Session::has('post deleted'))
                        <div class="alert alert-success">
                            {{\Illuminate\Support\Facades\Session::get('post deleted')}}
                        </div>
                    @endif
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Body</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($eposts as $epost)
                        <tr>
                            <td>{{$epost->id}}</td>
                            <td>{{$epost->title}}</td>
                            <td>{{$epost->body}}</td>
                            <form action="{{route('eposts.destroy',$epost->id)}}" method="POST">
                            <td><a href="{{route('eposts.edit',$epost->id)}}" class="btn btn-secondary">Edit</a></td>
                                @csrf
                                @method('DELETE')
                                <td><button type="submit" class="btn btn-danger">Delete</button></td>
                            </form>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
