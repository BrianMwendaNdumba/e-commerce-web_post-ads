<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Add your custom CSS styles here */
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            width: 100%;
        }

        .container {
            max-width: 100%;
            margin: 0 auto;
            padding: 20px;
        }

        .section-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 2rem;
        }

        .section-desc {
            font-size: 16px;
            margin-bottom: 2rem;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <table class="container" cellpadding="0" cellspacing="0" border="0" align="center">
        <tr>
            <td>
                <h2 class="section-title">Welcome to Kahustle.com</h2>
                <p class="section-desc">Buy and Sell online for free with Kahustle.com Classifieds Ads</p>
                <p class="section-desc">Discover great deals and connect with sellers in your area.</p>
                <a class="btn" href="{{ route('login') }}" style="color: #fff;">Start Shopping</a>
            </td>
        </tr>
    </table>
</body>

</html>