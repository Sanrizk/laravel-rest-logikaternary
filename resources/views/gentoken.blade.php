<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h1>GEN TOKEN</h1>
    {{ auth()->user()->name }}
    <form action="/tokens/create" method="POST">
        @csrf
        <label for="name">Token Name</label>
        <input type="text" id="name" name="token_name">
        <button type="submit">Generate</button>
    </form>

</body>
</html>