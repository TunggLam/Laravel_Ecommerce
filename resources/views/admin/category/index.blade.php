@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Category Page</h1>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $key => $category)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $category->name }}</td>
                    <td>
                        @if($category->status == 1)
                            <span style="color: green">Hoạt động</span>
                        @else
                            <span style="color: red">Tạm khóa</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
@endsection