<!DOCTYPE html>
<html>
    <head>
        <title>Guess It!</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>         
         <link rel="stylesheet" href="./CSS/index.css">
    </head>
    <body>     
        <div class = "parent">
            <div class = "container" id = "main">
                <h1 class = "title">GUESS IT!</h1>
                <div class="imagequestion">
                    <a href = "instructions.php">
                    <img src="./icons/question.png" width = "50" height = "50" id ="quesitons" > </a>
                </div>
                <h2 class = "subtitle">Choose your mode</h2>
                <div class="btn-container">
                    <a href = "mainpage.php"> <button class="mode btn-primary btn-lg" id = "mode1">Regular Mode</button> </a>
                    <a href = "mainpage.php"> <button class="mode btn-primary btn-lg" id = "mode2">Random Mode</button> </a>
                    <a href = "mainpage.php"> <button class="mode btn-primary btn-lg" id = "mode3">Celebrity Mode</button> </a>
                    <a href = "mainpage.php"> <button class="mode btn-primary btn-lg" id = "mode4">Education Mode</button> </a>
                    <a href = "mainpage.php"> <button class="mode btn-primary btn-lg" id = "mode5">Number Mode</button> </a>
                </div>
            </div>
        </div>

        <script src = "./js/mode.js" type = "module"></script>
    </body>
</html>