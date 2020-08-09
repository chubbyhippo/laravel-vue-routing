<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/app.css">

    <title>Document</title>
</head>

<body>

    <div id="app">
        @include('header')
        <section class="section">
            <div class="container">
                <router-view></router-view>
            </div>
        </section>

    </div>

    <script src="/js/app.js"></script>
</body>

</html>
