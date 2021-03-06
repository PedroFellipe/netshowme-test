<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Netshowme Recruitment Test</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        .full-height {
            height: 100vh;
        }
        .flex-center {
            /*align-items: center;*/

            /*justify-content: center;*/
            margin-left: 10%;
            margin-right: 10%;
        }
        .position-ref {
            position: relative;
        }
        .content {
            /*text-align: center;*/
        }
        .title {
            margin-top: 40px;
            text-align: center;
            font-size: 50px;
        }
        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body class="bg-white">
<div id="app">
    <index></index>
</div>

<script src={{ mix('js/app.js') }}></script>
</body>
</html>
