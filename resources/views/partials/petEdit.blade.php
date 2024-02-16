@extends('layout')

@section('content')

<form method="POST"  action="{{ route('partials.pet.update') }}">
    @csrf
    @method('post')
    <input type="hidden" id="id" name="id" value="{{ $petData['id'] }}">
    <div class="mb-3">
        <label for="petName" class="form-label">Pet Name</label>
        <input type="text" class="form-control" id="petName" name="petName" value="{{ $petData['name'] }}">
    </div>
    <div class="mb-3">
        <label for="categoryName" class="form-label">Category Name</label>
        <select class="form-select" id="categoryName" name="categoryName">
            <option value="{{ $petData['category'] ['name'] }}" selected>{{ $petData['category'] ['name'] }}</option>
            <option value="Dog" >Dog</option>
            <option value="Cat">Cat</option>
            <option value="Rabit">Rabbit</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="photoUrls" class="form-label">Photo URLs</label>
        <input type="text" class="form-control" id="photoUrls" name="photoUrls" value="{{ $petData['photoUrls'][0] }}">
    </div>
    <div class="mb-3">
        <label for="tagName" class="form-label">Tag Name</label>
        <input type="text" class="form-control" id="tagName" name="tagName" value="{{ $petData['tags'] [0] ['name'] }}">
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" id="status" name="status">
            <option value="{{ $petData['status'] }}" selected>{{ $petData['status'] }}</option>
            <option value="available" >Available</option>
            <option value="sold">Sold</option>
            <option value="pending">Pending</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
