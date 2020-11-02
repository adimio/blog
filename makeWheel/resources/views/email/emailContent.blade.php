<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>email</title>
    <style>

    </style>
    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script>

    </script>
</head>
<body>
<section id="email">
    <div class="title">你好，user</div>
    <div class="content"></div>
    <div>
        <div class="signature">{{ Auth::user()->name }}</div>
        <div class="date">{{ date('Y-M-D h:i:s') }}&nbsp;+8:00:00</div>
    </div>
</section>
</body>
</html>
