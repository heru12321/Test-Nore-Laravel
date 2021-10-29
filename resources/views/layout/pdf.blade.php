<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
    <h1>Hello, {{ $user['name'] }}</h1>
    <h3>Email : {{ $user['email'] }}</h3>
    <h3>As : {{ $user['as'] }}</h3>
    <h3>Address : {{ $user['address'] }}</h3>
    <h3>Bio : {{ $user['bio'] }}</h3>
</body>
</html>