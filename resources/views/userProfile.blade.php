@extends('layout.app')

@section('content')
<div class="user-crud container-fluid pt-5">
    <table class="table w-75 table-striped table-dark m-auto shadow-lg table-hover">
        <tr>
            <th>User-Name</th>
            <th>User-Email</th>
            <th>Update</th>
        </tr>
             <tr>
                <td>{{$users->name}}</td>
                <td>{{$users->email}}</td>
                <td><a href="{{route('singleUpdate',$users->id)}}" class="btn btn-outline-primary">Update</a></td>
               
             </tr>
    </table>
</div>
@endsection