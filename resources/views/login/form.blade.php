<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bistro Bliss Login</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }
    body {
      font-family: Arial, sans-serif;
      background: url('/assets/images/bg.png') no-repeat center center/cover; 
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .container {
      background: rgba(0,0,0,0.7);
      padding: 2rem;
      border-radius: 15px;
      width: 100%;
      max-width: 380px;
      text-align: center;
      color: white;
      box-shadow: 0px 4px 12px rgba(0,0,0,0.4);
    }
    .logo { font-size: 2rem; font-weight: bold; margin-bottom: 0.5rem; }
    .logo span { color: #ff3333; }
    .welcome { margin: 0.5rem 0 1rem; font-size: 1.2rem; font-style: italic; color: #ffcccc; }
    .form-input { width: 100%; padding: 0.8rem; margin: 0.5rem 0; border-radius: 8px; border: none; outline: none; font-size: 1rem; }
    select.form-input { background: white; color: #333; }
    .btn { width: 100%; padding: 0.8rem; background: #ff3333; color: white; border: none; border-radius: 8px; font-size: 1rem; cursor: pointer; margin-top: 1rem; transition: 0.3s; }
    .btn:hover { background: #cc0000; }
    .tagline { margin: 1rem 0; font-size: 0.9rem; color: #ddd; }
    .socials { display: flex; justify-content: center; gap: 1rem; margin-top: 0.5rem; }
    .socials a { font-size: 1.2rem; color: white; text-decoration: none; transition: 0.3s; }
    .socials a:hover { color: #ff3333; }
    .alert {
        background-color: #f8d7da;
        color: #721c24;
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 15px;
        text-align: left;
    }
    @media (max-width: 480px) { .container { width: 90%; padding: 1.5rem; } }
  </style>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
</head>
<body>
  <div class="container">
    <div class="logo"><span>BISTRO BLISS</span> KITCHEN</div>
    <p class="welcome">Welcome Back!<br>Login to continue with Bistro Bliss</p>

    <!-- Login Form -->
    <form method="POST" action="{{ route('login.submit') }}">
      @csrf

      <!-- Display validation errors -->
      @if ($errors->any())
        <div class="alert">
          <ul style="margin:0; padding-left:20px;">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <!-- Email -->
      <input type="email" name="email" class="form-input" placeholder="Email Address" required>

      <!-- Password -->
      <input type="password" name="password" class="form-input" placeholder="Password" required>

      <!-- Role Dropdown -->
      <select name="role" class="form-input" required>
        <option value="">Select Role</option>
        <option value="admin">Admin</option>
        <option value="frontdesk">Front Desk</option>
        <option value="delivery">Delivery</option>
      </select>

      <!-- Login Button -->
      <button type="submit" class="btn">Log In</button>
    </form>

    <p class="tagline">bistro bliss the quality of real taste</p>

    <div class="socials">
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="#"><i class="fab fa-facebook"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
      <a href="#"><i class="fab fa-google"></i></a>
    </div>
  </div>
</body>
</html>
