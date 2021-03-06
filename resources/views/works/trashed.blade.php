@extends('layouts.app')
@section('content')
    <div class="container mt-5">
    <div class="card card-default">
        <div class="card-header">Delete Jobs</div>

        @if($works->count())
            <div class="card-body">
                <table class="table">
                    <thead>
                    <th>Image</th>
                    <th>Title</th>
                    <th></th>
                    <th></th>
                    <th></th>


                    </thead>
                    <tbody>
                    @foreach($works as $work)
                        <tr>
                            <td><img src="{{asset($work->image)}}" width="60px" height="60px" alt=""></td>
                            <td>{{$work->title}}</td>
                            <td>
                            <td>
                                <form action="{{route('restore',$work->id)}}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <button  type="submit" class="btn btn-warning btn-sm del">Restore</button>
                                </form>

                            </td>
                            <td>
                                <form action="{{route('works.destroy',$work->id)}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button onclick="return confirm('Are you sure you want to delete this job ?')" type="submit" class="btn btn-danger btn-sm del">Delete</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>



        @else
            <div class="lead text-center">
                <p>There are no jobs</p>
            </div>
        @endif
    </div>
    </div>
@endsection
