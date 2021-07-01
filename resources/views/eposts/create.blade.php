@extends('layouts.master')
@section('title','Create Epost')

@section('content')
 <section style="padding-top: 40px">
     <div class="container">
         <div class="row">
             <div class="col-md-6 offset-md-3">
                 <div class="card">
                     <div class="card-header">
                         Add Post
                     </div>
                     <div class="card-body">
                         @if(\Illuminate\Support\Facades\Session::has('post created'))
                             <div class="alert alert-success">
                                 {{Session::get('post created')}}
                             </div>
                         @endif
                        <form method="POST" action="{{route('eposts.store')}}">
                            @csrf
                            <div class="form-group">
                                <label for="title">Epost Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter Epost Title" >
                            </div>
                            <div class="form-group">
                                <label for="body">Epost Body</label>
                                <input type="text" name="body" class="form-control" placeholder="Enter Epost Description" >
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
