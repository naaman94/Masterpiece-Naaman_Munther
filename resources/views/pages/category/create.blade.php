@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="post" action="{{route('category.store')}}">
            @csrf
            <div class="form-group">
                <h1 class="text-primary">Add Categoy</h1>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-group row">
                <label class="col-form-label" for="Category_name">Category name</label>
                <input name="name" type="text" class="form-control
                input {{ $errors->has('name') ? 'is-invalid' : '' }}"
                       value="{{ old('name') }}" placeholder="">
            </div>
            <div class="form-group row">
                <label class="col-form-label" for="description">Description</label>
                <textarea rows="3" name="description" type="text"
                          class="form-control input {{ $errors->has('description') ? 'is-invalid ' : '' }}"
                          id="description"
                          placeholder="Do you have any notes ? Please  tell us .. ">{{ old('description') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary float-right">Add</button>
        </form>
    </div>
@endsection
