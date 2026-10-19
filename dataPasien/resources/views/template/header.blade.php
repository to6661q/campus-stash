<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Website Pendataan Pasien</title>
    <style>
        * {
            font-family: Cambria;
            background-color: lightgray;
        }

        body{
            width: 50%;
            margin: 40px auto;
        }

        #header h1 {
            text-align: center;
        }

        #header p {
            text-align: center;
        }

        .footer-menu{
            padding-left:0px;
            list-style:none;
            text-align: center;
        }

        .footer-menu li{
            display: inline-block;
        }

        .footer-menu a{
            text-decoration: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        table tr th{
            padding: 8px;
            background-color:#5f5f5f;
            color: white;
        }
        
        table tr td{
            padding: 5px;
        }

        table tr td a {
            text-decoration: none;
        }
        
        table tr th, td {
            border: 1px black solid;
        }

        .button {
            width: 100%;
            background: none;
            border: 2px solid #5f5f5f;
            color: black;
            padding: 5px;
            font-size: 16px;
            cursor: pointer;
            margin: 12px 0;
            font-family: Cambria;
        }

        .textbox {
            width: 100%;
            overflow: hidden;
            padding: 8px 0;
            margin: 8px 0;
            border-bottom: 1px solid #5f5f5f;
        }

        .textbox input {
            border: none;
            height: 25px;
            outline: none;
            background: none;
            font-size: 16px;
            font-family: Cambria;
            color: black;
            width: 80%;
            float: left;
            margin: 0 10px;
            font-family: Cambria;
        }

        .animated {
            -webkit-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }

        @keyframes lightSpeedIn {
            from {
                transform: translate3d(100%, 0, 0) skewX(-30deg);
                opacity: 0;
            }

            60% {
                transform: skewX(20deg);
                opacity: 1;
            }

            80% {
                transform: skewX(-5deg);
            }

            to {
                transform: translate3d(0, 0, 0);
            }
        }

        .lightSpeedIn {
            animation-name: lightSpeedIn;
            animation-timing-function: ease-out;
        }

        @keyframes tada {
            from {
                transform: scale3d(1, 1, 1);
            }

            10%,
            20% {
                transform: scale3d(0.9, 0.9, 0.9) rotate3d(0, 0, 1, -3deg);
            }

            30%,
            50%,
            70%,
            90% {
                transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg);
            }

            40%,
            60%,
            80% {
                transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg);
            }

            to {
                transform: scale3d(1, 1, 1);
            }
        }

        .tada {
            animation-name: tada;
        }

        @keyframes flash {
            from,
            50%,
            to {
                opacity: 1;
            }

            25%,
            75% {
                opacity: 0;
            }
        }

        .flash {
            animation-name: flash;
        }
    </style>
</head>
<body>
    <section id="header"> 
        <div class="animated lightSpeedIn">
            <h1>WEBSITE PENDATAAN PASIEN</h1>
            <p>Selamat datang di website kami</p>
            <hr>
        </div>
    </section>