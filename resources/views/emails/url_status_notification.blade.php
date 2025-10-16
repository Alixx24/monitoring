<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">

    <style>
        .bg-of-body {
            background-color: rgb(255, 255, 255);
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1 0 auto;
        }

        footer {
            flex-shrink: 0;
            background-color: #f8f9fa;
            padding: 20px 0;
            text-align: center;
        }

        .github-icon {
            color: #000;

        }

        .mt-of-login {
            margin-top: 35%;
        }

        .mt-of-reg {
            margin-top: 25%;
        }
    </style>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px;">
    <section style="max-width: 600px; margin: auto; background-color: #ffffff; padding: 20px; border-radius: 8px;">
      <div style="text-align: center; margin-top: 10px; white-space: nowrap;">
                <a href="{{ route('home.index') }}"
                    style="display: inline-block; padding: 9px 4px; font-size: 10px; background-color: #076ad3; color: white; text-decoration: none; border-radius: 4px; margin: 0 4px;">
                    Home
                </a>
                <a href="{{ route('home.document.index') }}"
                    style="display: inline-block; padding: 9px 4px; font-size: 10px; background-color: #076ad3; color: white; text-decoration: none; border-radius: 4px; margin: 0 4px;">
                    Document
                </a>
                <a href="#"
                    style="display: inline-block; padding: 9px 4px; font-size: 10px; background-color: #076ad3; color: white; text-decoration: none; border-radius: 4px; margin: 0 4px;">
                    Contact Us
                </a>
            </div>

        <div style="color: #333333; font-size: 16px; line-height: 1.6;">

            <!-- Buttons Row -->
      
            <hr>
            <p>Hello,</p>
            <p>The status of the link <strong>{{ $url }}</strong> is <strong>{{ $statusCode }}</strong>. 🚨</p>
            <p>Please check it.</p>

            <!-- Footer -->
            <div style="text-align: center">    <img src="https://alixdev.com/icon/telegram.svg" alt="Telegram" width="24" height="24" style="vertical-align: middle;">

    <img src="https://alixdev.com/icon/github.svg" alt="Telegram" width="24" height="24" style="vertical-align: middle;">
              </div>
            <div
                style="text-align: center; font-size: 14px; color: #999999; margin-top: 40px; padding-top: 20px; border-top: 1px solid #e0e0e0;">
                © 2025 <a href="https://alixdev.ir" style="color: #999999; text-decoration: none;">alixdev.ir</a>
            </div>

        </div>

    </section>
</body>

</html>
