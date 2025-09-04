@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Dish</h2>

    <form action="{{ route('menu.update', $menuItem->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" value="{{ $menuItem->name }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" value="{{ $menuItem->price }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label>Image</label><br>
            @if($menuItem->image)
                <img src="{{ asset('storage/'.$menuItem->image) }}" width="120" class="mb-2"><br>
            @endif
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('menu.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
