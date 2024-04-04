<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <style>
        .form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            background: #666666;
            padding: 40px;
            border-radius: 10px;
        }

        .login {
            font-size: 25px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .flex {
            display: flex;
            flex-direction: column;
        }

        .form button {
            margin-top: 25px;
            margin-bottom: 6px;
            border-radius: 10px;
            border: none;
            padding-top: 4px;
            padding-bottom: 4px;
            font-size: 19px;
            font-weight: bold;
            color: grey;
        }

        .form label {
            margin-top: 20px;
            margin-bottom: 5px;
        }

        .form button:hover {
            box-shadow: 2px 2px 12px white;
        }

        .input {
            height: 30px;
            outline: none;
            padding: 15px;
            border-radius: 10px;
            border: none;
            font-weight: bold;
            font-size: 15px;
            box-shadow: 2px 2px 12px inset black;
        }

        .span:hover {
            font-weight: bold;
        }

        .color {
            color: white;
        }

        .align {
            text-align: center;
        }

        body {
            margin: 0;
            padding: 0;
        }

        .backg {
            padding: 9rem 0;
            width: 100%;
            /* height: 100%; */
            display: flex;
            justify-content: center;
            background-color: #666666;
            background-image: url('https://cdn.pixabay.com/photo/2013/03/19/23/07/easter-bunny-95096_960_720.jpg');
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }

        .addlog {
            width: 25%;
            

        }
    </style>
</head>

<body>
    <div class="backg">
        <div class="addlog">
            <form class="form" action="{{route('admin.login')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex">
                    <div class="login color">Admin</div>
                    <label class="color">Username :</label>
                    <input type="text" class="input" name="user">
                    <label class="color">Password :</label>
                    <input type="password" class="input" name="password">
                    <button class="">Log-in</button>
                    <br>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
