@extends('layout')

@section('content')
<div class="row">
        @if (isset($error))
            <p class="text-danger">{{ $error }}</p>
        @endif
    </div>
<form method="POST"  action="{{ route('partials.pet.add') }}">
    @csrf
    @method('post')
    <div class="mb-3">
        <label for="petName" class="form-label">Pet Name</label>
        <input type="text" class="form-control" id="petName" name="petName" value="Name">
    </div>
    <div class="mb-3">
        <label for="categoryName" class="form-label">Category Name</label>
        <select class="form-select" id="categoryName" name="categoryName">
            <option value="Dog" selected>Dog</option>
            <option value="Cat">Cat</option>
            <option value="Rabit">Rabbit</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="photoUrls" class="form-label">Photo URLs</label>
        <input type="text" class="form-control" id="photoUrls" name="photoUrls" value="Photo Url">
    </div>
    <div class="mb-3">
        <label for="tagName" class="form-label">Tag Name</label>
        <input type="text" class="form-control" id="tagName" name="tagName" value="Tag">
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" id="status" name="status">
            <option value="available" selected>Available</option>
            <option value="sold">Sold</option>
            <option value="pending">Pending</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
