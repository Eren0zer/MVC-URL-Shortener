<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Shortener</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            max-width: 500px;
            width: 100%;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
        }
        form {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }
        input[type="url"] {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px 0 0 5px;
            font-size: 16px;
            outline: none;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 0 5px 5px 0;
            font-size: 16px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        p {
            margin-top: 20px;
            text-align: center;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>URL Shortener</h1>
        @if(session('shortened_url'))
            <p>Shortened URL: <a href="{{ session('shortened_url') }}">{{ session('shortened_url') }}</a></p>
        @endif
        <form action="{{ route('shorten') }}" method="post">
            @csrf
            <input type="url" name="url" placeholder="Enter URL">
            <button type="submit">Shorten</button>
        </form>
    </div>
</body>
</html>
