<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Leaderboard</title>
        <link rel = "stylesheet" href = "./CSS/leaderboard.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        
        <script type='text/javascript'>
            const reloadUsingLocationHash = () => {
        window.location.hash = "reload";
    }
    window.onload = reloadUsingLocationHash();
        </script>
        
    </head>

    <body>
        <div class = "container">
            <div class = "back">
              <img src="./icons/back.png" width = "50" height = "50" id = "back_lderbrd"></div>
    
            <div class = "titlebox"> <h1 class = "title">LEADERBOARD</h1> </div>
            <div class = "dateset"> <p class = "date" id = "ldDate"></p> </div>
        </div>
        <?php
            include 'PHP/view_data.php';
        ?>
    </body>
    
    <script src = "./js/leader.js"></script>
</html>