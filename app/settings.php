<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Settings</title>
        <link rel = "stylesheet" href = "./CSS/settings.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>      </head>

    <body>
        <div class = "container" id = 'main'>
            <div class = "back">
              <img onclick = "history.back()" src="./icons/back.png" width = "50" height = "50" id = "back_settings" > </a>
            </div>
    
            <div class = "titlebox"> <h1 class = "title">SETTINGS</h1> </div>
        </div>

        <!-- Setting selection table -->
        <table class = "settings_table">
            </thead>
            <tbody>
            <tr> <td><p class = "selected_setting" id ="selected_timer">Timer</p></td> 
                <td>
                    <label class = "toggle" id = "whole_timer">
                    <input type = "checkbox" name = "timer" id = "toggle_1">
                    <span class = "checkmark"></span>
                    </label>
                </td></tr>

            <tr> <td><p class = "selected_setting" id ="selected_guess">Limited Guesses</p></td> 
                <td>
                    <label class="toggle" id = "whole_tries">
                        <input type = "checkbox" name = "limited_guesses" id = "toggle_2" >
                        <span class = "checkmark"></span>
                    </label>
                </td></tr>
            </tbody>
        </table>

        
        <!-- Code to change mode (redirects to main page) -->
        <div class = "container">
            <!-- The button to redirect to the main page -->
            <a href = "index.php"> <button id = "change_mode_btn" class = "change_mode btn-primary btn-lg">Change Game Mode</button></a>
            <a href = "mainpage.php"> <button id = "apply" class = "apply btn-primary btn-lg">Apply</button></a>
        </div>

        <script src = "./js/main.js" type = "module"></script>
        <script src = "./js/checkbox.js" type = "module"></script>

    </body>
</html>
