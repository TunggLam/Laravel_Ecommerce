@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Book Page</h1>
        <div>
            <a href="{{ route('book.create') }}" class = "btn btn-primary">Create</a>
        </div>

        <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Author</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $key => $book)
            <tr>
                <th scope="row">{{ $key + 1 }}</th>
                <td>{{ $book->name }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->quantity }}</td>
                <td>{{ number_format($book->price, 0, ',', '.') }} VNĐ</td>
                <td>{{ $book->description }}</td> 
                <td>
                    <a href="{{ route('book.edit', $book->id) }}" class="btn btn-success btn-sm">Edit</a>
                    <a data-id="{{ $book->id }}" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" type="button">Delete</a>
                </td>
            </tr>
            @endforeach   
        </tbody>
        </table>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal Delete</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Do you really want to delete this book?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-delete-book">Delete Book</button>
            </div>
            </div>
        </div>
    </div>

    <form action="{{ url('admin/book/destroy') }}" method="POST" id="form-delete-book">
        @csrf
        <input type="hidden" id="input-delete-id" name="id">
    </form>

    <script>
        const deleteModal = document.getElementById('deleteModal');
        const btndeleteModal = document.getElementById('btn-delete-book');
        const formDeleteBook = document.getElementById('form-delete-book');
        const inputDeleteId = document.getElementById('input-delete-id');
        let bookId;

        if (deleteModal) {
            deleteModal.addEventListener('show.bs.modal', event => {
                // Button that triggered the modal
                const button = event.relatedTarget
                // Extract info from data-bs-* attributes
                bookId = button.getAttribute('data-id')
            });

            btndeleteModal.addEventListener('click', function() {
                inputDeleteId.value = bookId;
                formDeleteBook.submit();
            });
        }
    </script>

@endsection


