<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/register" method="post">
        @csrf
        <label for="">Email</label>
        <input type="email" name="email">
        <label for="">Name</label>
        <input type="text" name="name">
        <label for="">Password</label>
        <input type="password" name="password" id="">
        <button type="submit">Register</button>
    </form>
</body>
</html>