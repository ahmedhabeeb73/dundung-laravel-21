@extends('layouts.app')

@section('content')
    <div class="container mt-5">
    <div class="card card-default">
        <div class="card-header">
            Edit tag
        </div>

        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-group">
                        @foreach($errors->all() as $error)
                            <li class="list-group-item text-danger">
                                {{$error}}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('tags.update',$tag->id)}}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text"  id='name' class="form-control" name="name" value="{{$tag->name}}">
                </div>
                <div class="form-group">
                    <button class="btn btn-success">Update Tag</button>
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection
