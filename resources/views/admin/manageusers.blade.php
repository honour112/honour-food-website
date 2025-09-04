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

<link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/assets/css/admin.css">
<link rel="stylesheet" href="/assets/css/frontdeskpages.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- Users Table -->
<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Role</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ ucfirst($user->role) }}</td>
        <td>
          <div class="buttons">
            <!-- Delete Button -->
            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </form>
          </div>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>

<!-- Toggle Button -->
<div style="margin: 20px 0;">
    <button id="toggleForm" style="padding: 10px 20px; cursor: pointer;">
        <i class="fa-solid fa-plus"></i> Add New User
    </button>
</div>

<!-- Hidden Form -->
<div id="userFormContainer" style="display: none;">
    <h1>Create New User</h1>

    <form action="{{ route('admin.users.store') }}" method="POST" class="menu-form">
        @csrf

        <label>
            <span>Name</span>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Full Name" required>
        </label>

        <label>
            <span>Email</span>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Email Address" required>
        </label>

        <label>
            <span>Password</span>
            <input type="password" name="password" placeholder="Password" required>
        </label>

        <label>
            <span>Role</span>
            <select name="role" required>
                <option value="">Select Role</option>
                <option value="admin">Admin</option>
                <option value="frontdesk">Front Desk</option>
                <option value="delivery">Delivery</option>
            </select>
        </label>

        <button type="submit">
            <i class="fa-solid fa-check"></i> Create
        </button>
    </form>
</div>

<script>
    const toggleButton = document.getElementById('toggleForm');
    const formContainer = document.getElementById('userFormContainer');

    toggleButton.addEventListener('click', () => {
        if(formContainer.style.display === 'none') {
            formContainer.style.display = 'block';
            toggleButton.innerHTML = '<i class="fa-solid fa-minus"></i> Close';
        } else {
            formContainer.style.display = 'none';
            toggleButton.innerHTML = '<i class="fa-solid fa-plus"></i> Add New User';
        }
    });
</script>

@endsection
