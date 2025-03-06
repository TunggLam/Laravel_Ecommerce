@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Book edit</h1>

        <form class="row g-3" action="{{ route('book.update', $book->id) }}" method="POST" enctype="multipart/form-data" novalidate onsubmit="return validateForm()">
            @method('PUT')
            @csrf
            <div class="col-md-4">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required oninput="validateInput(this, 'text')" value="{{ $book->name }}">
                <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">Please enter a valid name (at least 3 characters).</div>
            </div>
            
            <div class="col-md-4">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" required oninput="validateInput(this, 'number')" value="{{ $book->quantity }}">
                <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">Quantity must be greater than 0.</div>
            </div>

            <div class="col-md-4">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" step="1000" required oninput="validateInput(this, 'number')" value="{{ $book->price }}">
                <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">Price must be greater than 0.</div>
            </div>

            <div class="col-md-6">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" id="author" name="author" required oninput="validateInput(this, 'text')" value="{{ $book->author }}">
                <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">Please enter a valid author name.</div>
            </div>

            <div class="col-md-6">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" required oninput="validateInput(this, 'text')">{{ old('description', $book->description) }}</textarea>
                <div class="valid-feedback">Looks good!</div>
                <div class="invalid-feedback">Please enter a valid description (at least 10 characters).</div>
            </div>


            <div class="col-12">
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </form>
    </div>

    <script>
        function validateInput(input, type) {
            let value = input.value.trim();

            if (type === 'text') {
                if (value.length >= 3) {
                    input.classList.add('is-valid');
                    input.classList.remove('is-invalid');
                } else {
                    input.classList.add('is-invalid');
                    input.classList.remove('is-valid');
                }
            } 
            else if (type === 'number') {
                if (parseFloat(value) > 0) {
                    input.classList.add('is-valid');
                    input.classList.remove('is-invalid');
                } else {
                    input.classList.add('is-invalid');
                    input.classList.remove('is-valid');
                }
            }
        }

        function validateForm() {
            let isValid = true;
            let inputs = document.querySelectorAll('input, textarea');

            inputs.forEach(input => {
                let value = input.value.trim();
                let type = input.type;

                if (type === 'text' && value.length < 3) {
                    isValid = false;
                    input.classList.add('is-invalid');
                } 
                if (type === 'number' && (isNaN(value) || parseFloat(value) <= 0)) {
                    isValid = false;
                    input.classList.add('is-invalid');
                }
            });

            if (!isValid) {
                alert("Please correct the errors before submitting.");
            }

            return isValid;
        }
    </script>
@endsection
