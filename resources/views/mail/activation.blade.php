<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Activation Code</title>
</head>
<body>
    <h1>Hello ! {{ $userfirst }}</h1>
    <p>pleace click this link to Active your account <a href="{{ url('user/activation/'.$token) }}">Confirm</a></p>
</body>
</html>