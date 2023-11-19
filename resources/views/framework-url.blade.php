<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Framework URLs example</title>
</head>
<body>
    @php
    use App\Http\Controllers\UserController;
    @endphp

    <p>Profile URL: <a href="{{ route('profile') }}">Profile</a> </p>
    <p>User Edit URL: <a href="{{ action([UserController::class, 'settings' ]) }}"> My Profile </p>
</body>
</html>