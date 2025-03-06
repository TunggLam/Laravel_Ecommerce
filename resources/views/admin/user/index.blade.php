@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>User Page</h1>
        <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">PhoneNumber</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
            <tr>
                <th scope="row">{{ $key + 1 }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->address }}</td>
                <td>{{ $user->phonenumber }}</td>
                <td>{{ $user->email }}</td> 
            </tr>
            @endforeach   
        </tbody>
        </table>
    </div>
@endsection


