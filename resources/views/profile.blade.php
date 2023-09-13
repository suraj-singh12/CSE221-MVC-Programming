<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>User Profile</h1>
    <p>Username: {{ $userName }} </p>
    <!-- <h2>IsAdmin: {{ $isAdmin ? 'true' : 'false' }} </h2> -->
    @if($isAdmin)
        <p>You are are an administrator </p>
    @else 
        <p>Your are not an administrator </p>
    @endif

    @unless($isAdmin) 
        <p>You don't have admin privilages </p>
    @endunless

    @empty($userName) 
        <p> Username is empty </p>
    @endempty

    <p>Items:</p>
    <ul>
        @foreach($items as $item)
            <li> {{ $item }} </h2>
        @endforeach
    </ul>

    
    <h2> Including sub-views: </h2>
    @include('partials.footer');
</body>
</html>