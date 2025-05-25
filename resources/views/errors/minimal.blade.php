<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Inter', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial, sans-serif;
            background: #f4f6fb;
            color: #222;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .error-container {
            background: #fff;
            border-radius: 2rem;
            box-shadow: 0 8px 32px rgba(60, 72, 88, 0.12);
            padding: 4rem;
            max-width: 420px;
            width: 100%;
            text-align: center;
        }

        .error-code {
            font-size: 6rem;
            font-weight: 800;
            color: #2d3748;
            letter-spacing: -0.05em;
            margin-bottom: 0.5rem;
        }

        .error-message {
            font-size: 1.5rem;
            font-weight: 500;
            color: #4a5568;
            text-transform: uppercase;
            letter-spacing: 0.1em;
        }

        @media (max-width: 600px) {
            .error-container {
                padding: 2rem 1rem;
            }

            .error-code {
                font-size: 3.5rem;
            }

            .error-message {
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>
<div class="error-container">
    <div class="error-code">
        @yield('code')
    </div>
    <div class="error-message">
        @yield('message')
    </div>
</div>
</body>
</html>
