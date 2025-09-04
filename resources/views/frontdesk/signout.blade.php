<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Out</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<div>
    <a href="{{ route('home-page') }}" class="sign-out">
        <i class="fas fa-sign-out-alt"> Go to website</i>
    </a>
    <style>
        .sign-out {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #333;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .sign-out i{
            font-size:2rem;
            color: #bd4343ff;
        }

    </style>

</div>