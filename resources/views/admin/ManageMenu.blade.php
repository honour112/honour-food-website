@extends('Admin.AdminLayout')

@section('content')
@if(session('success'))
<div class="alert">{{session('success')}}</div>
<style>
    .alert {
        padding: 12px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        border-radius: 4px;
        background-color: lightgreen;
    }
</style>
@endif

<link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&family=Poppins:wght@300;400;500;600;700;800&family=Rufina:wght@400;700&family=Racing+Sans+One:wght@400&family=Radio+Canada:wght@300;400;500;600;700&family=Sansation:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/assets/css/admin.css">
<link rel="stylesheet" href="/assets/css/frontdeskpages.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- Menu Table -->
<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Description</th>
      <th>Price (FCFA)</th>
      <th>Image</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($menuItems as $item)
    <tr>
        <td>{{ $item->name }}</td>
        <td>{{ $item->description }}</td>
        <td>{{ number_format($item->price, 0, ',', ' ') }} FCFA</td>
        <td>
          @if($item->image)
            <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->name }}" width="70" height="70" style="border-radius:8px;">
          @else
            <span>Image displayed in Menu Page</span>
          @endif
        </td>
        <td>
          <div class="buttons">
            <!-- Delete Button -->
            <form action="{{ route('menu.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </form>
            <!-- Edit Button
            <button type="button" class="edit">
                <i class="fa-solid fa-pen-to-square"></i>
            </button> -->
          </div>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>

<!-- Toggle Button -->
<div style="margin: 20px 0;">
    <button id="toggleForm" style="padding: 10px 20px; cursor: pointer;">
        <i class="fa-solid fa-plus"></i> Add New Dish
    </button>
</div>

<!-- Hidden Form -->
<div id="menuFormContainer" style="display: none;">
    <h1>Create Menu Item</h1>

    <form action="{{ route('ManageMenu.store') }}" method="POST" enctype="multipart/form-data" class="menu-form">
        @csrf

        <label>
            <span>Name</span>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Item name" required>
        </label>

        <label>
            <span>Description</span>
            <textarea name="description" rows="4" placeholder="Write a short description">{{ old('description') }}</textarea>
        </label>

        <label>
            <span>Price (FCFA)</span>
            <input type="number" name="price" step="0.01" min="0" value="{{ old('price') }}" placeholder="0.00" required>
        </label>

        <label>
            <span>Dish Image</span>
            <input type="file" name="image" accept="image/*" required>
        </label>

        <button type="submit">
            <i class="fa-solid fa-check"></i> Create
        </button>
    </form>
</div>

<script>
    const toggleButton = document.getElementById('toggleForm');
    const formContainer = document.getElementById('menuFormContainer');

    toggleButton.addEventListener('click', () => {
        if(formContainer.style.display === 'none') {
            formContainer.style.display = 'block';
            toggleButton.innerHTML = '<i class="fa-solid fa-minus"></i> Close';
        } else {
            formContainer.style.display = 'none';
            toggleButton.innerHTML = '<i class="fa-solid fa-plus"></i> Add New Dish';
        }
    });
</script>

@endsection
