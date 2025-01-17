<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $video['title'] }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        p {
            margin: 5px 0;
        }
        iframe {
            width: 100%;
            height: 400px;
            border: none;
            border-radius: 8px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>{{ $video['title'] }}</h1>
    <p><strong>Description:</strong> {{ $video['description'] }}</p>
    <p><strong>Published At:</strong> {{ $video['published_at'] }}</p>
    <p><iframe width="560" height="315" src={{$video['url']}} title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen</iframe></p>
</div>
</body>
</html>
