<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACS用户中心</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=ZCOOL+KuaiLe&display=swap');
        button{
            border-radius: 4px;
            background-color: #25b6b6;
            border: none;
            color: #23242a;
            text-align: center;
            font-size: 10px;
            padding: 15px;
            width: 100px;
            transition: all 0.5s;
            cursor: pointer;
            margin: 5px;
            vertical-align:middle;
        }
        .container .card .content{
            position: relative;
            margin-top: 60px;
            padding: 10px 15px;
            text-align: center;
            color: #111;
            visibility: visible;
            opacity: 1;
        }
        .container .card{
            position: relative;
            width: 300px;
            background: #36ecec;
            margin: 30px 10px;
            padding: 20px 15px;
            display: flex;
            flex-direction: column;
            box-shadow: 0 5px 202px rgba(0,0,0,0.5);
            height: 420px;
            border-radius: 7px;
        }
        *{
            margin: 0;
            padding: 0;
            font-family: "Ubuntu", "ZCOOL KuaiLe",sans-serif,cursive;
        }

        body{
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #23242a;
        }
        .container{
            position: relative;
            height: 600px;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            padding: 30px;
            color: #23242a;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="content">
            <h2>电脑端V2rayN</h2>
            <p>
                版本号：5.36<br>
                Released on 20 Sep 2022<br>
                <button onclick="location.href='https://t.yoimiya.love/v2rayN.zip'">下载</button><br>
            </p>
        </div>
    </div>
    <div class="card">
        <div class="content">
            <h2>安卓端下载</h2>
            <p>
                版本号：1.7.23<br>
                Released on 21 Oct 2022<br>
                <button onclick="location.href='https://t.yoimiya.love/v2rayNG.apk'">下载</button><br>
            </p>
        </div>
    </div>
</div>
</body>
</html>