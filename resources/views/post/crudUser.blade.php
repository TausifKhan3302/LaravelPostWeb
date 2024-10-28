@extends('layout.app')

@section('content')
    <table class="table w-75 table-striped table-dark m-auto mt-5 shadow-lg table-hover">
        <tr>
            <th>User-id</th>
            <th>User-Name</th>
            <th>User-Email</th>
            <th>View</th>
            <th>Delete</th>
        </tr>
        @foreach ($users as $user)
     <tr>
       <td>{{$user->id}}</td>
       <td>{{$user->name}}</td>
       <td>{{$user->email}}</td>
       <td><a href="{{route('userView',$user->id)}}" class="btn btn-outline-info">View</a></td>

       <td><a href="{{route('userDelete',$user->id)}}" class="btn btn-outline-danger">Delete</a></td>
    </tr>
     @endforeach
    </table>
@endsection