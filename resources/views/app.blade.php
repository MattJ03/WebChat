<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
    @vite('resources/js/app.js') {{-- Load Vue App --}}
</head>
<body>
<div id="app" data-messages='@json($messages)' data-server-id="{{ $server->id }}"></div>
</body>
</html>
