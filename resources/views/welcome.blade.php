<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Atlas Orbit</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background: #f4f7fb;
                margin: 0;
                min-height: 100vh;
            }

            #app {
                align-items: center;
                display: flex;
                justify-content: center;
                min-height: 100vh;
                padding: 24px;
            }

            section {
                background: #fff;
                border-radius: 12px;
                box-shadow: 0 12px 40px rgba(15, 23, 42, 0.08);
                max-width: 560px;
                padding: 32px;
                text-align: center;
                width: 100%;
            }

            h1 {
                margin: 0 0 12px;
            }

            p {
                color: #475569;
                margin: 0;
            }
        </style>
    </head>
    <body>
        <div id="app"></div>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
