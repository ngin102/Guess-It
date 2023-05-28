<!DOCTYPE html>

<html>
    <head>
        <meta charset = "utf-8">
        <title>Guess It</title>
        <meta name="description" content="Guess the hidden word in 6 tries. A new puzzle is available each day.">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
        <link rel = "stylesheet" href = "./CSS/mainpage.css"/>
    </head>

    <body>
        <div class ="container" id = main>
            <div class = "back">
              <a href = "index.php"><img src="./icons/back.png" width = "50" height = "50" id = "back_settings"> </a> </div>
              
            <div class="hintset">
             <button type="button" class = "hintbtn" style="border:transparent; background-color: transparent;"><img src = "./icons/hint.png" width = "50" height = "50" id = "toastbtn" /></button>

                <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
                    <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            <strong class="me-auto">Hint</strong>
                        
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body" id = "hint">
                                
                        </div>
                    </div>
                </div>
            </div>

            <div class="imageset">
                <a href = "settings.php">
                <img src="./icons/settings.png" width = "55" height = "55" id = "settings" > 
            </div>

            <div class="imagequestion">
                <a href = "instructions.php">
                <img src="./icons/question.png" width = "50" height = "50" id = "questions" > </a>
            </div>

            <div class="lbordimage">
                <a href = "leaderboard.php">
                <img src="./icons/leaderboard.png" width = "50" height = "50" id = "leaderboard" > </a>
            </div>
        
            <div class="titlebox">
                <h1 class ="title">GUESS IT</h1>
            </div>

            </div>

            <div class ="timer" id="timer">
                <p class = "time" id="time"></p>
                <p class = "tries" id="tries"></p>
            </div>
        </div>

        <div class ="container">
            <div class="input_guess">
                    <input onkeydown="search(this)" type="text" name ="guess" id ="guess" autofocus autocomplete="off"/>
                    <input type="hidden" name="cnt" value=<?php $cnt=0 ?>>
 
            </div>
        </div>

        <div class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id = 'modal_title'></h5>
                </div>
                <div class="modal-body">
                    <p id = "loser_text"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id = "modal_random">Index</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id = "modal_leader" hidden>Leaderboard</button>
                </div>
                </div>
            </div>
            </div>

        <div class = "container">
            <div class = "outside" id = "arrow_area">
        
            </div>
        </div>

        </div>
        <script src = "./js/play.js"></script>
        <script src = "./js/main.js" type ="module"></script>
      
    </body>
</html>