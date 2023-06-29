<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="./assets/js/table2excel.js" type="text/javascript">
    </script>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;

        }

        .header {
            font-family: "Roboto", sans-serif;
            font-weight: bold;
            overflow: hidden;
            padding: 20px 10px;
            background-color: rgba(131, 18, 56, 1);
        }

        .header a {
            float: left;
            color: black;
            text-align: center;
            padding: 12px;
            text-decoration: none;
            font-size: 17px;
            line-height: 40px;
            border-radius: 4px;
        }

        .header img.logo {
            height: 75px;
            padding-left: 20px;
        }

        .header a.active{
            color: white;
        }

        .header a.active:hover {
            background-color: #ddd;
            color: black;
        }

        .header-right {
            float: right;
        } 

        @media screen and (max-width: 500px) {
            .header a {
                float: none;
                display: block;
                text-align: left;
            }

            .header-right {
                float: none;
            }
        }
    </style>
</head>
<body>
        <div class="header">
        <img class="logo" src="./assets/img/sistlogo.jpg" alt="logo" />
        <div class="header-right">
            <a class="active" href="./logout.php">LOGOUT </a>
        </div>
    </div>
    </body>
</html>