<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">

        <title>Todo List</title>
    </head>
    <body>
        <div id="app">
            <app></app>
        </div>
    </body>
    <script src="{{ mix('js/app.js') }}"></script>
</html>

<style lang="scss">
    body {
        font-family: 'Barlow', sans-serif;
        background: black;
    }
</style>
