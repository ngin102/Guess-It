# Deliverable 4
## Introduction
This document outlines the work our group completed on the project for Deliverable 4.

| Description  |
|--------------|
| [Implementation of features: Server, Client, HTML, CSS](#implementation-of-features-server-client-html-css)|
| [Software Documentation (installing, testing and developing the app)](#software-documentation-installing-testing-and-developing-the-app)|
| [Adherance to UI Design System](#adherance-to-ui-design-system) |
| [Seeding application with sample data](#seeding-application-with-sample-data) |
| [Screenshots of available features](#screenshots-of-available-features) |
| [Application v1.0 (quality versus quantity)](#application-v10-quality-versus-quantity) |
| [Git usage (commit messages, all students involved)](#git-usage-commit-messages-all-students-involved) |

### Deliverable Branch

All changes for Deliverable 4 were made on the f/deliverable4 branch before a pull request was made and the changes made on this branch were merged with the main branch: https://github.com/professor-forward/project-snm/tree/f/deliverable4/


## Implementation of features: Server, Client, HTML, CSS

**Much of the implementation for the features involving the Server, Client, HTML and CSS for our project was already implemented in [Deliverable 3](https://github.com/professor-forward/project-snm/tree/f/deliverable3) and was previously described in the [Deliverable 3 README](https://github.com/professor-forward/project-snm/blob/main/docs/archive/deliverable_3.md).**

In Deliverable 3, the server technology and database technology that were integrated into the project were PHP and PostgreSQL, respectively.

We installed XAMPP, PHP and PostgreSQL on our computers to establish server and database connections for our project.

A look at the XAMPP Control Panel we installed. The "Apache" and "MySQL" modules are running:
<img width="1725" alt="01  XAMPP" src="https://user-images.githubusercontent.com/71230219/156136330-5ea36570-56bf-4677-b396-a78f2b026b06.png">

A look at our PHP installation folder within our XAMPP folder files:
<img width="1727" alt="02  PHP Folder" src="https://user-images.githubusercontent.com/71230219/156136758-d36c4dc0-6646-4755-9def-9eed6ddd8813.png">

A look at our PostgreSQL installation folder within our XAMPP folder files:
<img width="1727" alt="03  Postgresql Folder" src="https://user-images.githubusercontent.com/71230219/156136971-7680ed44-b711-4e25-937a-a44611532941.png">

We installed PostgreSQL on Port 5433; we will assume that the user who downloads our project will install PostgreSQL on Port 5432.

Using pgAdmin 4, we created a server called "Guess_it" and established a connection to this port.

"Guess_it" server details on pgAdmin 4:
<img width="1725" alt="06  pgAdmin 4 connection" src="https://user-images.githubusercontent.com/71230219/156137043-6c4db8dc-e03e-4b2e-953e-72b04e535cfa.png">

We created two SQL files to create schemas under the default database for PostgreSQL, postgres, and to seed the database.

A look at the code for schema.sql (used to create the schemas for the database):
<img width="717" alt="Screen Shot 2022-03-04 at 11 20 12 AM" src="https://user-images.githubusercontent.com/71230219/156800108-76f82acc-7f33-4cc3-9031-d59e2c47ddf7.png">

In the code above, we have a set of [migrations](https://github.com/professor-forward/project-snm/tree/f/deliverable4/db/migrations), which track changes to our schema. Because we have not had a formal first release of our application, it should be sufficient for the user to use schema.sql to create and seed the database instead of running specific migration files.

A look at the code for seed.sql (used to seed the database). This code is over 3000 lines long:
<img width="1483" alt="05  Seed SQL" src="https://user-images.githubusercontent.com/71230219/156137121-a1bf029c-d6f2-4c0b-bfbd-03d6c2e0f593.png">

Our schemas and tables were created and seeded by running these .sql files:
<img width="1452" alt="Screen Shot 2022-03-04 at 11 28 42 AM" src="https://user-images.githubusercontent.com/71230219/156801477-20ddd9f7-a667-46fb-b5bc-b798235ae4c2.png">

<img width="1453" alt="Screen Shot 2022-03-04 at 11 29 27 AM" src="https://user-images.githubusercontent.com/71230219/156801629-5e4548e4-2d67-437d-bd52-32b50b4c0363.png">

[Click here to view the full schema.sql file.](https://github.com/professor-forward/project-snm/blob/f/deliverable4/db/schema.sql)

[Click here to view the full seed.sql file (the code is over 3000 lines long).](https://github.com/professor-forward/project-snm/blob/f/deliverable4/db/seed.sql)

For more details about seeding the application, please refer to the [Seeding Application with Sample Data Section](#seeding-application-with-sample-data) of this README.

Here is some background on our project to understand how the server and database technology are being used in it, and how the client interacts with the server and database.

Our project is "Guess It". "Guess It" is a word-guessing game in which you must guess an English word. If you guess a word that is alphabetically before the one you're supposed to guess, a green arrow will point up; if it comes after, a purple arrow will point down.

There are five Game Modes in "Guess It." In the first mode, "Regular Mode," the player must guess the "Word of the Day." The "Word of the Day" changes every day. The player can check the leaderboard to see how their score compares to the scores of other players. The second mode is "Random Mode." This is the non-competitive practice mode of the game. This mode does not have a leaderboard. Instead of a "Word of the Day," the player is given a randomly generated word to guess. They can play this mode as many times as they want in a day. The third mode is "Celebrity Mode," which is similar to "Random Mode," but instead of guessing a word, the player guesses a celebrity's name. The fourth mode is "Education Mode," which is similar to "Random Mode," but all of the words you must guess are scientific in nature. The fifth mode is "Number Mode," which is similar to "Random Mode," but instead of guessing a word, you guess a number.

As shown in schema.sql and seed.sql, we are storing all of the words that need to be guessed by the player in our PostgreSQL database, in respective tables that correspond to their Game Modes. "Regular Mode" and "Random Mode" share a table; while, all other Modes (except for "Number Mode") have their own respective tables. "Number Mode" is excluded from our database, as this Game Mode did not require the use of our database. There is also a table for leaderboard entries.

How the schema and tables are organized in the database:<br>
<img width="320" alt="Screen Shot 2022-03-04 at 11 29 54 AM" src="https://user-images.githubusercontent.com/71230219/156801725-9c0aafee-0534-4025-a70c-22791717b017.png">

When the client starts playing the game, our code uses PHP to retrieve words from the database; this allows us to ensure that only one particular word is to be guessed for "Regular Mode" on a particular day and that a random word is always selected for the other modes.

Our code also uses PHP to add data into the database. When the player wins a round of "Regular Mode," they are prompted to enter their name into the leaderboard; their entry is then added to the table for leaderboard entries, which is an action by the client that alters the database via the application's server connection.

Entries from the leaderboard table are also dynamically selected and displayed on the client-end using PHP.

PHP configuration file used to establish the client's connection to the database: 
<img width="1459" alt="Screen Shot 2022-04-02 at 7 39 31 AM" src="https://user-images.githubusercontent.com/71230219/161381388-64db081a-a866-46a6-80e9-f6736b44e3b8.png">

[Click to view config file.](https://github.com/professor-forward/project-snm/blob/f/deliverable4/app/php/config.php)

PHP file used to retrieve words from the database; notice that words are picked from a certain table based on only the Game Mode selected:
<img width="1127" alt="Screen Shot 2022-03-04 at 11 33 32 AM" src="https://user-images.githubusercontent.com/71230219/156802290-a8095e41-6117-428b-899a-36010c180868.png">

[Click to view retrieve_word file.](https://github.com/professor-forward/project-snm/blob/f/deliverable4/app/php/retrieve_word.php)

PHP file used to add data to the leaderboard table in the database.

<img width="1360" alt="Screen Shot 2022-03-04 at 11 33 11 AM" src="https://user-images.githubusercontent.com/60792590/161450123-cd23ce9c-66b6-4130-a5eb-034950a6f004.png">

[Click to view add_data file.](https://github.com/professor-forward/project-snm/blob/f/deliverable4/app/php/add_data.php)

PHP file used to view data from the leaderboard table in the database; the data is displayed onscreen (on leaderboard.php) in a HTML table using Bootstrap elements:

<img width="932" alt="Screen Shot 2022-03-04 at 11 33 59 AM" src="https://user-images.githubusercontent.com/60792590/161450083-b775f0fb-af7b-4371-8e36-1877a766018d.png">

[Click to view view_data file.](https://github.com/professor-forward/project-snm/blob/f/deliverable4/app/php/view_data.php)

Note that the previous two PHP files make use of PHP classes, LeaderboardEntry and TableInfo, respectively.
<img width="818" alt="Screen Shot 2022-03-04 at 11 35 46 AM" src="https://user-images.githubusercontent.com/71230219/156802661-ba5c6651-4ed2-47b3-832b-ce55ea6cb3da.png">
<img width="1291" alt="Screen Shot 2022-03-04 at 11 36 02 AM" src="https://user-images.githubusercontent.com/71230219/156802715-23fdbc3a-4e32-4e5c-b5d0-75a907f8ca88.png">
[Click to view LeaderboardEntry.](https://github.com/professor-forward/project-snm/blob/f/deliverable4/app/php/LeaderboardEntry.php)

[Click to view TableInfo.](https://github.com/professor-forward/project-snm/blob/f/deliverable4/app/php/TableInfo.php)

One JavaScript file in our project, play, in particular, works in tandem with these PHP files to ensure that the game is functioning properly:

<img width="1470" alt="Screen Shot 2022-04-02 at 7 42 02 AM" src="https://user-images.githubusercontent.com/71230219/161381472-3414c37d-2198-40ea-892f-efb8f4afb422.png">

[Click to view full play file (the screenshot above only shows part of the code).](https://github.com/professor-forward/project-snm/blob/f/deliverable4/app/js/play.js)

To see our PHP and PostgreSQL integration in action, please refer to the [Screenshots of available features using JavaScript section](#screenshots-of-available-features-using-javascript) of this README, which includes a demo of our project.

There are other JavaScript files included in our project, as well.

The JavaScript file, checkbox, is used to control whether a timer, limited guesses or both are toggled ON.
<img width="1112" alt="Screen Shot 2022-04-02 at 7 44 17 AM" src="https://user-images.githubusercontent.com/71230219/161381532-498f1169-64cb-4240-a3ef-c076ea75ab97.png">
[Click to view full checkbox file (the screenshot above only shows part of the code).](https://github.com/professor-forward/project-snm/blob/f/deliverable4/app/js/checkbox.js)

The JavaScript file, leader, is used to help implement the Leaderboard; in particular, the date on the "Leaderboard" page.
<img width="996" alt="Screen Shot 2022-04-02 at 7 46 03 AM" src="https://user-images.githubusercontent.com/71230219/161381593-4644328d-8d6f-4336-983e-80b92e488f71.png">
[Click to view full leader file.](https://github.com/professor-forward/project-snm/blob/f/deliverable4/app/js/leader.js)

The JavaScript file, main, is used to help implement features on the "Mainpage," such as the timer/limited guesses appearing after they are toggled ON and hint generation.
<img width="1162" alt="Screen Shot 2022-04-02 at 7 47 20 AM" src="https://user-images.githubusercontent.com/71230219/161381663-47171928-ccbb-4546-84c0-bd59a33b648d.png">
[Click to view full main file (the screenshot above only shows part of the code).](https://github.com/professor-forward/project-snm/blob/f/deliverable4/app/js/main.js)

The JavaScript file, mode, is used to register which mode was selected.
<img width="747" alt="Screen Shot 2022-04-02 at 7 48 49 AM" src="https://user-images.githubusercontent.com/71230219/161381721-ac8832e6-d4e8-4650-b3bb-e9b2dc8d0aad.png"><br>
[Click to view full mode file.](https://github.com/professor-forward/project-snm/blob/f/deliverable4/app/js/mode.js)

In terms of HTML and CSS implementations, please refer to our [UI Design System document](https://github.com/professor-forward/project-snm/blob/f/deliverable4/docs/ui_design_system.pdf) for a detailed breakdown of the HTML and CSS elements (including Bootstrap elements) that we used in our application. This document also includes HTML mockups for each of our application's pages.

The PHP files containing HTML components that the client accesses are:  
* [index.php](https://github.com/professor-forward/project-snm/blob/f/deliverable4/app/index.php): The first page the player encounters when playing “Guess It.” Here, the player can change the game mode.
  * [mainpage.css](https://github.com/professor-forward/project-snm/blob/f/deliverable4/app/css/mainpage.css): The CSS file for index.php
* [mainpage.php](https://github.com/professor-forward/project-snm/blob/f/deliverable4/app/mainpage.php): The page where the player plays "Guess It."
  * [styles.css](https://github.com/professor-forward/project-snm/blob/f/deliverable4/app/css/styles.css): The CSS file for mainpage.php
* [instructions.php](https://github.com/professor-forward/project-snm/blob/f/deliverable4/app/instructions.php): The page where the player views the instructions on how to play "Guess It."
  * [instructions.css](https://github.com/professor-forward/project-snm/blob/f/deliverable4/app/css/instructions.css): The CSS file for instructions.php
* [leaderboard.php](https://github.com/professor-forward/project-snm/blob/f/deliverable4/app/leaderboard.php): The page where the player views the leaderboard for the Regular Mode.
  * [leaderboard.css](https://github.com/professor-forward/project-snm/blob/f/deliverable4/app/css/leaderboard.css): The CSS file for leaderboard.php
* [settings.php](https://github.com/professor-forward/project-snm/blob/f/deliverable4/app/settings.php): The page where the player can change the toggle settings for "Guess It."
  * [settings.css](https://github.com/professor-forward/project-snm/blob/f/deliverable4/app/css/settings.css): The CSS file for settings.php


## Software Documentation (installing, testing and developing the app)

For software documentation on how to install the app, please refer to the [Installation section](https://github.com/professor-forward/project-snm/tree/f/deliverable4#installation) of the project README.

For software documentation on how to test the app, please refer to the [Testing section](https://github.com/professor-forward/project-snm/tree/f/deliverable4#testing) of the project README.

For software documentation on how to develop the app, please refer to the [How to Start Developing section](https://github.com/professor-forward/project-snm/tree/f/deliverable4#how-to-start-developing) of the project README.

In [Deliverable 3](https://github.com/professor-forward/project-snm/tree/f/deliverable3), we created a helper `./deploy.sh` script to deploy the project and a helper `./upgrade.sh` script to upgrade the project once it has already been deployed. For information regarding how to run these scripts and how these scripts function, please refer to the [Deployment section](https://github.com/professor-forward/project-snm/blob/f/deliverable4/README.md#deployment) and the [Upgrades section](https://github.com/professor-forward/project-snm/blob/f/deliverable4/README.md#upgrades) of the project README.

## Adherance to UI Design System
Please refer to our updated and refined [UI Design System document](https://github.com/professor-forward/project-snm/blob/f/deliverable4/docs/ui_design_system.pdf) to view all HTML, CSS and UI design elements included in our project, as well as mockups. Any UI design elements from Bootstrap are indicated as such in this document.

For Deliverable 4, we made a few updates to our UI Design System. 

### Updated Bootstrap Modal Designs
All Bootstrap modal designs were updated. Button names have been changed to better reflect page names as they appear in the UI Design System document.

All modals can no longer be closed by the user if the user clicks on any section of the screen not covered by the modal - a feature that modals lacked in Deliverable 3.

The "Winner" (Version 1) and "Loser" Bootstrap modals in our UI Design System feature hyperlinks, and when the user clicks on one of them, they are redirected to a Wikipedia article for the word/celebrity stated in the hyperlink. We changed how these hyperlinks open in the user's browser. Instead of redirecting the user to the Wikipedia article in the current browser tab, the hyperlink now opens in a new tab.

The "Winner Modal (Version 1)" before Deliverable 4:<br>
<img width="502" alt="Screen Shot 2022-03-27 at 6 03 59 AM" src="https://user-images.githubusercontent.com/71230219/160276476-c8ef6c89-8456-46f4-baea-54fa930121f2.png"><br>
The "Winner Modal (Version 1)" after Deliverable 4:<br>
<img width="502" alt="Screen Shot 2022-04-02 at 8 09 18 AM" src="https://user-images.githubusercontent.com/71230219/161382452-c2d5900c-ad5c-4a9b-baf5-29bafa31fe61.png"><br>
Text in this modal has changed; the hyperlink has been decapitalized and the "Main Page" button has been changed to the "Index" button.

The "Winner Modal (Version 2)" before Deliverable 4:<br>
<img width="502" alt="Screen Shot 2022-04-02 at 9 12 31 PM" src="https://user-images.githubusercontent.com/71230219/161407021-43ec9709-4bbe-40f2-9396-8ac2da08d04d.png"><br>
The "Winner Modal (Version 2)" after Deliverable 4:<br>
<img width="502" alt="Screen Shot 2022-04-02 at 9 14 14 PM" src="https://user-images.githubusercontent.com/71230219/161407033-f1ee4f79-7d9c-4722-8b09-a56109225057.png"><br>
Text was added to the modal.

The "Loser Modal" before Deliverable 4:<br>
<img width="502" alt="Screen Shot 2022-03-27 at 6 04 14 AM" src="https://user-images.githubusercontent.com/71230219/160276479-65499954-01f6-482e-a789-cf934921aac6.png"><br>
The "Loser Modal" after Deliverable 4:<br>
<img width="502" alt="Screen Shot 2022-04-02 at 8 09 56 AM" src="https://user-images.githubusercontent.com/71230219/161382490-aa4f83cc-5dd3-49fc-bf7b-753084672b0b.png"><br>
Text in this modal has changed; the hyperlink has been decapitalized and the "Main Page" button has been changed to the "Index" button.

The "Already Played Modal" before Deliverable 4:<br>
<img width="502" alt="Screen Shot 2022-04-02 at 8 14 13 AM" src="https://user-images.githubusercontent.com/71230219/161382657-dcbdd2c5-cfa8-4230-9042-5102936911c3.png"><br>
The "Already Played Modal" after Deliverable 4:<br>
<img width="502" alt="Screen Shot 2022-04-02 at 8 13 56 AM" src="https://user-images.githubusercontent.com/71230219/161382645-764981f3-5e96-4191-b29d-58bd2c3518a5.png"><br>
Text in this modal has changed; the hyperlink has been decapitalized and the "Random Word" button has been changed to the "Index" button.

We added a new modal element to the UI Design System: a Bootstrap modal that appears when the player has won a round of "Regular Mode" and submitted their name to the leaderboard. The modal contains a hyperlink to the word that the player successfully guessed (in the screenshot below, this word is "runny"); if the player clicks on the hyperlink, a Wikipedia page for that word will open in a new browser tab. The player has the choice to return to the [Index](https://github.com/professor-forward/project-snm/blob/f/deliverable4/app/index.php) by clicking the button on the modal labelled "Index" or to view the [Leaderboard](https://github.com/professor-forward/project-snm/blob/f/deliverable4/app/leaderboard.php) by clicking the button on the modal labelled "Leaderboard". This new modal, like the others in our UI Design System, can not be closed by clicking on any section of the screen not covered by it; the user must choose between clicking on the "Mainpage" button and the "Leaderboard" button to proceed.

The new "Winner Modal (Version 3)" that was added in this deliverable:<br>
<img width="502" alt="Screen Shot 2022-04-02 at 8 13 14 AM" src="https://user-images.githubusercontent.com/71230219/161382624-9ec1de9d-b89c-467f-acd6-7bf571c5b657.png">

### Updated Hint Toast Design
The text in the hint toast has changed from referring to the length of a word to the length of what the player's guess should be.

A Hint Toast before Deliverable 4:<br>
<img width="502" alt="Screen Shot 2022-04-02 at 8 19 24 AM" src="https://user-images.githubusercontent.com/71230219/161382956-86f7737b-bd76-4954-a504-e550860d7d78.png"><br>
A Hint Toast after Deliverable 4:<br>
<img width="502" alt="Screen Shot 2022-04-02 at 8 18 30 AM" src="https://user-images.githubusercontent.com/71230219/161382894-dead0d35-fe36-466d-aacd-ee8fbaf02f67.png">

### Updated Instructions Page
"Educational Mode" has been changed to "Education Mode" on the Instructions/How to Play page.

Instructions/How to Play page before Deliverable 4:<br>
<img width="502" alt="Screen Shot 2022-04-02 at 8 26 07 AM" src="https://user-images.githubusercontent.com/71230219/161383203-e102d25d-a273-4e60-8874-32c923ea9a87.png"><br>
Instructions/How to Play page after Deliverable 4:<br>
<img width="502" alt="Screen Shot 2022-04-02 at 8 25 26 AM" src="https://user-images.githubusercontent.com/71230219/161383170-0ac92945-3077-47c1-bde5-43cce0fe7362.png">

## Seeding application with sample data
We created a SQL file, seed.sql, to seed the application in [Deliverable 3](https://github.com/professor-forward/project-snm/blob/f/deliverable3/db/seed.sql). We did not make any modifications to seed.sql for this deliverable, besides correcting a typo in the sample data ("Robert Pattison" was corrected to "Robert Pattinson").

A look at the code for seed.sql (used to seed the database). This code is over 3000 lines long:
<img width="1483" alt="05  Seed SQL" src="https://user-images.githubusercontent.com/71230219/156137121-a1bf029c-d6f2-4c0b-bfbd-03d6c2e0f593.png">

[Click here to view the full seed.sql file (the code is over 3000 lines long).](https://github.com/professor-forward/project-snm/blob/f/deliverable4/db/seed.sql)

We also have a set of migrations, which track changes to our schema and were all created in [Deliverable 3](https://github.com/professor-forward/project-snm/tree/f/deliverable3/db/migrations). Because we have not had a formal first release of our application, it should be sufficient for the user to use schema.sql to create and seed.sql to seed the database instead of running specific migration files. In other words, we did not create any additional migrations for Deliverable 4.


## Screenshots of available features
A video demo of our project (this video has audio):

https://user-images.githubusercontent.com/71230219/161360460-3466f7cd-6068-45cf-88a9-636f4e6a56e6.mp4

The video demo as a set of screenshots (screenshots of available features).

"Index" page (the first page you view when you launch the application):
<img width="1420" alt="Screen Shot 2022-04-02 at 6 02 14 AM" src="https://user-images.githubusercontent.com/71230219/161378135-4a3efced-3771-4b57-a4f6-3d907503566f.png">

Viewing the "How to Play" page (after clicking the Question Mark icon on the "Index" page):
<img width="1420" alt="Screen Shot 2022-04-02 at 6 03 14 AM" src="https://user-images.githubusercontent.com/71230219/161378173-233c130f-b41c-40df-b0d1-3977d22d1b53.png">

Returning to the "Index" page (after clicking the Back Arrow icon on the "How to Play" page) and highlighting the Regular Mode Button:
<img width="1420" alt="Screen Shot 2022-04-02 at 6 04 20 AM" src="https://user-images.githubusercontent.com/71230219/161378216-3fbb08bf-c62c-4207-a4eb-845b9f8c784b.png">

Playing the Game in "Regular Mode" (after clicking the Regular Mode Button on the "Index" page). From this "Mainpage," the player can click on the Back Arrow icon to return to the "Index" page, on the Question Mark icon to view the "How to Play" page, on the Trophy icon to view the "Leaderboard" page, on the Lightbulb icon to view a hint, and on the Gears icon to view the "Settings" page:
<img width="1420" alt="Screen Shot 2022-04-02 at 6 05 48 AM" src="https://user-images.githubusercontent.com/71230219/161378274-49333dde-ae04-488b-bc67-217117194d56.png">

Viewing the "Leaderboard" page (after clicking the Trophy icon on the "Index" page):
<img width="1420" alt="Screen Shot 2022-04-02 at 6 12 40 AM" src="https://user-images.githubusercontent.com/71230219/161378543-dd160e3f-4a01-431e-b7ad-232e41e0fea7.png">

Viewing a Hint (after returning to the "Index" page by clicking on the Back Arrow icon on the "Leaderboard" page and clicking on the Lightbulb icon on the "Mainpage"):
<img width="1420" alt="Screen Shot 2022-04-02 at 6 13 45 AM" src="https://user-images.githubusercontent.com/71230219/161378577-670bfe18-5e53-4d3f-9765-9a032ca1b685.png">

Viewing the "Settings" page (after clicking the Gears icon on the "Mainpage"):
<img width="1420" alt="Screen Shot 2022-04-02 at 7 18 22 AM" src="https://user-images.githubusercontent.com/71230219/161380750-154a2a00-c827-4b60-bcbd-b73c49e5bf0e.png">

Returning to the "Index" page (after clicking the Change Game Mode Button on the "Settings" page):
<img width="1420" alt="Screen Shot 2022-04-02 at 6 04 20 AM" src="https://user-images.githubusercontent.com/71230219/161378216-3fbb08bf-c62c-4207-a4eb-845b9f8c784b.png">

Inputting "apple" as a guess on the "Mainpage" (after clicking the Regular Mode Button on the "Index" page):
<img width="1420" alt="Screen Shot 2022-04-02 at 7 19 38 AM" src="https://user-images.githubusercontent.com/71230219/161380788-504e71c9-74af-429c-aa60-5763e77c876d.png">

Guessing "apple;" the Purple Arrow indicates the word the player needs to guess is alphabetically after "apple" (clicking the enter Button after the steps in the previous screenshot):
<img width="1420" alt="Screen Shot 2022-04-02 at 7 19 58 AM" src="https://user-images.githubusercontent.com/71230219/161380801-0a52d9cd-73ea-4f06-afe2-138ced54f963.png">

Inputting "zoo" as a guess on the "Mainpage:"
<img width="1420" alt="Screen Shot 2022-04-02 at 7 20 38 AM" src="https://user-images.githubusercontent.com/71230219/161380829-52692dd8-74b9-4c1a-b6de-eff516af2986.png">

Guessing "zoo;" the Green Arrow indicates the word the player needs to guess is alphabetically before "zoo" (clicking the enter Button after the steps in the previous screenshot):
<img width="1420" alt="Screen Shot 2022-04-02 at 7 20 58 AM" src="https://user-images.githubusercontent.com/71230219/161380838-fa1cc05c-8e85-4810-8f11-45dc763e37c4.png">

Inputting "runny" as a guess on the "Mainpage:"
<img width="1420" alt="Screen Shot 2022-04-02 at 6 25 22 AM" src="https://user-images.githubusercontent.com/71230219/161378996-77cfa8ea-746c-4100-9a9e-0773701bbc37.png">

"runny" was the correct guess. The player is prompted to enter their name for a Leaderboard entry:
<img width="1420" alt="Screen Shot 2022-04-02 at 6 27 54 AM" src="https://user-images.githubusercontent.com/71230219/161379083-a2e5ba18-0070-43ec-b77f-253d9ab65787.png">

Inputting "Alan" as the player name for the Leaderboard entry:
<img width="1420" alt="Screen Shot 2022-04-02 at 6 28 40 AM" src="https://user-images.githubusercontent.com/71230219/161379104-4781bac6-5929-4866-9230-1832f3b798d4.png">

Viewing the "Winner" modal after pressing OK on the prompt from the previous screenshot. From this modal, the player can return to the "Index" by clicking on the Index Button, can view the "Leaderboard" by clicking the Leaderboard Button, and can view the Wikipedia article for the word that needed to be guessed by clicking the provided hyperlink (in this case, the word, "runny," which is underlined and blue):
<img width="1420" alt="Screen Shot 2022-04-02 at 6 29 05 AM" src="https://user-images.githubusercontent.com/71230219/161379121-b83574c9-81a9-493a-921e-7de0593297ef.png">

Viewing the "Leaderboard" and the newly added Leaderboard entry after clicking the Leaderboard Button on the modal (from the previous screenshot):
<img width="1420" alt="Screen Shot 2022-04-02 at 6 32 01 AM" src="https://user-images.githubusercontent.com/71230219/161379184-d8fa627c-1e1e-4eb0-ad83-f4a551e93e1b.png">

Returning to the "Index" page (after clicking the Back Arrow icon on the "Leaderboard" page):
<img width="1420" alt="Screen Shot 2022-04-02 at 6 04 20 AM" src="https://user-images.githubusercontent.com/71230219/161378216-3fbb08bf-c62c-4207-a4eb-845b9f8c784b.png">

Playing the Game in "Regular Mode" (after clicking the Regular Mode Button on the "Index" page). The player views a modal that tells them they can not play "Regular Mode" again for the day, since they have already won it. The player can return to the "Index" page by clicking on the Index Button on this modal:
<img width="1420" alt="Screen Shot 2022-04-02 at 6 34 44 AM" src="https://user-images.githubusercontent.com/71230219/161379276-8c41f589-b26e-48ee-b473-7953f27d4ee9.png">

Returning to the "Index" page (after clicking the Index Button on the modal from the previous screenshot):
<img width="1420" alt="Screen Shot 2022-04-02 at 6 35 59 AM" src="https://user-images.githubusercontent.com/71230219/161379320-f89beeab-0819-4fcd-9e6d-1f19bb2fec26.png">

Playing the Game in "Random Mode" (after clicking the Random Mode Button on the "Index" page). As in the case of playing "Regular Mode," from this "Mainpage," the player can click on the Back Arrow icon to return to the "Index" page, on the Question Mark icon to view the "How to Play" page, on the Trophy icon to view the "Leaderboard" page, on the Lightbulb icon to view a hint, and on the Gears icon to view the "Settings" page:
<img width="1420" alt="Screen Shot 2022-04-02 at 6 37 46 AM" src="https://user-images.githubusercontent.com/71230219/161379394-a96cd805-502f-4436-8de9-d8640402090d.png">

Viewing the "Settings" page (after clicking the Gears icon on the "Mainpage"). The "Settings" page for "Random Mode" appears differently than the "Settings" page for "Regular Mode." All other pages in this mode appear the same as they do in "Regular Mode:"
<img width="1420" alt="Screen Shot 2022-04-02 at 6 38 53 AM" src="https://user-images.githubusercontent.com/71230219/161379447-6486a2e7-d833-4a50-a0e1-e1d60958834e.png">

Adding a two-minute timer to the game (selecting the Timer toggle ON and then clicking the Apply Button):
<img width="1420" alt="Screen Shot 2022-04-02 at 6 41 05 AM" src="https://user-images.githubusercontent.com/71230219/161379516-b04f423a-018f-49d4-9635-db9027725bcd.png">
<img width="1143" alt="Screen Shot 2022-04-02 at 6 41 45 AM" src="https://user-images.githubusercontent.com/71230219/161379542-c45e19cd-e262-49e5-9548-063ad19b13c0.png">

Returning to the "Settings" page (after clicking the Gears icon on the "Mainpage"), removing the timer from the game, and adding 10 limited guesses to the game (selecting the Limited Guesses toggle ON, selecting the Timer toggle OFF, and then clicking the Apply Button):
<img width="1420" alt="Screen Shot 2022-04-02 at 6 42 24 AM" src="https://user-images.githubusercontent.com/71230219/161379565-6bbb9b92-777a-4209-914f-abab03638bfd.png">
<img width="1420" alt="Screen Shot 2022-04-02 at 6 44 14 AM" src="https://user-images.githubusercontent.com/71230219/161379615-270d13a1-5c56-42c7-9e36-8abfe46fd850.png">

Returning to the "Settings" page (after clicking the Gears icon on the "Mainpage"), adding both the timer from the game and 10 limited guesses to the game (selecting the Limited Guesses toggle ON, selecting the Timer toggle ON, and then clicking the Apply Button):
<img width="1420" alt="Screen Shot 2022-04-02 at 6 44 51 AM" src="https://user-images.githubusercontent.com/71230219/161379639-51cde743-16c4-422f-bdf0-c3e57bc7daa4.png">
<img width="1420" alt="Screen Shot 2022-04-02 at 6 45 21 AM" src="https://user-images.githubusercontent.com/71230219/161379662-b560af99-1515-4394-ae5a-ce7605103b30.png">

Returning to the "Settings" page (after clicking the Gears icon on the "Mainpage"), removing the timer from the game and the 10 limited guesses from the game (selecting the Limited Guesses toggle OFF, selecting the Timer toggle OFF, and then clicking the Apply Button):
<img width="1420" alt="Screen Shot 2022-04-02 at 6 45 40 AM" src="https://user-images.githubusercontent.com/71230219/161379672-0c7d6aeb-24fa-4b2c-bc0e-ed5a482b9a2d.png">

Making some guesses ("zoo" and "apple" - as seen in the screenshots for "Regular Mode") and then the guess, "exchange:"
<img width="1420" alt="Screen Shot 2022-04-02 at 6 47 24 AM" src="https://user-images.githubusercontent.com/71230219/161379736-34dee764-2313-4b1d-b064-cc1dfc9ca40b.png">

Viewing the "Winner" modal (after pressing the enter Button for the player's correct guess). From this modal, the player can return to the "Index" by clicking on the Index Button and can view the Wikipedia article for the word that needed to be guessed by clicking the provided hyperlink (in this case, the word, "exchange," which is underlined and blue):
<img width="1420" alt="Screen Shot 2022-04-02 at 6 48 52 AM" src="https://user-images.githubusercontent.com/71230219/161379815-9c2f3106-0a54-42f5-9e03-b1c51a390737.png">

Viewing the Wikipedia page for "exchange" in a new tab (after clicking the hyperlink in the modal from the previous screenshot):
<img width="1420" alt="Screen Shot 2022-04-02 at 6 53 47 AM" src="https://user-images.githubusercontent.com/71230219/161379993-a0ac5234-0af7-4240-ac63-426b412639ba.png">

Returning to the "Index" page (after clicking the Index Button on the "Winner" modal):
<img width="1420" alt="Screen Shot 2022-04-02 at 6 35 59 AM" src="https://user-images.githubusercontent.com/71230219/161379320-f89beeab-0819-4fcd-9e6d-1f19bb2fec26.png">

Playing the Game in "Celebrity Mode" (after clicking the Celebrity Mode Button on the "Index" page). As in the case of playing "Random Mode," from this "Mainpage," the player can click on the Back Arrow icon to return to the "Index" page, on the Question Mark icon to view the "How to Play" page, on the Trophy icon to view the "Leaderboard" page, on the Lightbulb icon to view a hint, and on the Gears icon to view the "Settings" page; all of these pages appear and function the same as they do in "Random Mode:"
<img width="1420" alt="Screen Shot 2022-04-02 at 6 37 46 AM" src="https://user-images.githubusercontent.com/71230219/161379394-a96cd805-502f-4436-8de9-d8640402090d.png">

Viewing the "Settings" page (after clicking the Gears icon on the "Mainpage") and adding 10 limited guesses to the game (selecting the Limited Guesses toggle ON, selecting the Timer toggle OFF, and then clicking the Apply Button):
<img width="1420" alt="Screen Shot 2022-04-02 at 6 42 24 AM" src="https://user-images.githubusercontent.com/71230219/161379565-6bbb9b92-777a-4209-914f-abab03638bfd.png">
<img width="1420" alt="Screen Shot 2022-04-02 at 6 44 14 AM" src="https://user-images.githubusercontent.com/71230219/161379615-270d13a1-5c56-42c7-9e36-8abfe46fd850.png">

Using all of the player's 10 guesses to guess that the celebrity name that needs to be guessed is "Taylor Swift."
<img width="1420" alt="Screen Shot 2022-04-02 at 6 58 40 AM" src="https://user-images.githubusercontent.com/71230219/161380149-289232ee-a1f5-4956-8e8d-bc5cfb42ecff.png">

Since the player has used all 10 of their guesses and has failed to guess the celebrity name, the "Loser" modal appears. From this modal, the player can return to the "Index" by clicking on the Index Button and can view the Wikipedia article for the celebrity that needed to be guessed by clicking the provided hyperlink (in this case, the celebrity, "Hugh Jackman," which is underlined and blue):
<img width="1420" alt="Screen Shot 2022-04-02 at 6 59 20 AM" src="https://user-images.githubusercontent.com/71230219/161380166-cc862a9a-6214-4845-a54d-349b8bb70de3.png">

Viewing the Wikipedia page for "Hugh Jackman" in a new tab (after clicking the hyperlink in the modal from the previous screenshot):
<img width="1420" alt="Screen Shot 2022-04-02 at 7 01 45 AM" src="https://user-images.githubusercontent.com/71230219/161380234-88b08b38-8886-4566-8d9d-0fa340ce3309.png">

Returning to the "Index" page (after clicking the Index Button on the "Loser" modal):
<img width="1420" alt="Screen Shot 2022-04-02 at 6 35 59 AM" src="https://user-images.githubusercontent.com/71230219/161379320-f89beeab-0819-4fcd-9e6d-1f19bb2fec26.png">

Playing the Game in "Education Mode" (after clicking the Education Mode Button on the "Index" page). As in the case of playing "Random Mode," from this "Mainpage," the player can click on the Back Arrow icon to return to the "Index" page, on the Question Mark icon to view the "How to Play" page, on the Trophy icon to view the "Leaderboard" page, on the Lightbulb icon to view a hint, and on the Gears icon to view the "Settings" page; all of these pages appear and function the same as they do in "Random Mode:"
<img width="1420" alt="Screen Shot 2022-04-02 at 6 37 46 AM" src="https://user-images.githubusercontent.com/71230219/161379394-a96cd805-502f-4436-8de9-d8640402090d.png">

Viewing the "Settings" page (after clicking the Gears icon on the "Mainpage") and adding a two-minute timer to the game (selecting the Timer toggle ON and then clicking the Apply Button):
<img width="1420" alt="Screen Shot 2022-04-02 at 6 41 05 AM" src="https://user-images.githubusercontent.com/71230219/161379516-b04f423a-018f-49d4-9635-db9027725bcd.png">

Failing to guess the word within the two minutes given by the timer; in the screenshot, the timer has exceeded:
<img width="1420" alt="Screen Shot 2022-04-02 at 7 06 05 AM" src="https://user-images.githubusercontent.com/71230219/161380379-563fcbc3-bc15-4336-a363-5bcd44363610.png">

Since the player has failed to guess the celebrity name within the two-minute limit, the "Loser" modal appears. From this modal, the player can return to the "Index" by clicking on the Index Button and can view the Wikipedia article for the word that needed to be guessed by clicking the provided hyperlink (in this case, the word, "artifact," which is underlined and blue):
<img width="1420" alt="Screen Shot 2022-04-02 at 7 08 44 AM" src="https://user-images.githubusercontent.com/71230219/161380458-b7f730ea-57ab-44bd-806d-7b3699e3df2e.png">

Viewing the Wikipedia page for "artifact" in a new tab (after clicking the hyperlink in the modal from the previous screenshot):
<img width="1420" alt="Screen Shot 2022-04-02 at 7 10 01 AM" src="https://user-images.githubusercontent.com/71230219/161380495-8b32ac85-f6bd-4fd7-9816-d8d68aeaca7b.png">

Returning to the "Index" page (after clicking the Index Button on the "Loser" modal):
<img width="1420" alt="Screen Shot 2022-04-02 at 6 35 59 AM" src="https://user-images.githubusercontent.com/71230219/161379320-f89beeab-0819-4fcd-9e6d-1f19bb2fec26.png">

Playing the Game in "Number Mode" (after clicking the Number Mode Button on the "Index" page). As in the case of playing "Random Mode," from this "Mainpage," the player can click on the Back Arrow icon to return to the "Index" page, on the Question Mark icon to view the "How to Play" page, on the Trophy icon to view the "Leaderboard" page, on the Lightbulb icon to view a hint, and on the Gears icon to view the "Settings" page; all of these pages appear and function the same as they do in "Random Mode:"
<img width="1420" alt="Screen Shot 2022-04-02 at 6 37 46 AM" src="https://user-images.githubusercontent.com/71230219/161379394-a96cd805-502f-4436-8de9-d8640402090d.png">

Viewing the "Settings" page (after clicking the Gears icon on the "Mainpage") and adding both the timer from the game and 10 limited guesses to the game (selecting the Limited Guesses toggle ON, selecting the Timer toggle ON, and then clicking the Apply Button):
<img width="1420" alt="Screen Shot 2022-04-02 at 6 44 51 AM" src="https://user-images.githubusercontent.com/71230219/161379639-51cde743-16c4-422f-bdf0-c3e57bc7daa4.png">

Making some guesses ("10," "200" and "999999999") and then the guess, "84660919:"
<img width="1420" alt="Screen Shot 2022-04-02 at 7 12 29 AM" src="https://user-images.githubusercontent.com/71230219/161380581-92e5ce9b-d3b3-4beb-9469-7012357d635f.png">

Viewing the "Winner" modal (after pressing the enter Button for the player's correct guess). From this modal, the player can return to the "Index" by clicking on the Index Button:
<img width="1420" alt="Screen Shot 2022-04-02 at 7 14 57 AM" src="https://user-images.githubusercontent.com/71230219/161380641-842ee30b-f5b3-43e6-9ea1-3311dab91808.png">

Returning to the "Index" page (after clicking the Index Button on the "Winner" modal):
<img width="1420" alt="Screen Shot 2022-04-02 at 6 35 59 AM" src="https://user-images.githubusercontent.com/71230219/161379320-f89beeab-0819-4fcd-9e6d-1f19bb2fec26.png">


## Application v1.0 (quality versus quantity)
At the time of [Deliverable 3](https://github.com/professor-forward/project-snm/tree/f/deliverable3) submission, the core functionality of the application was up and running. We made a few refinements to the application, which were mainly updates to modal and hint toast designs for our application and fixes to glitches (e.g. Number Mode not functioning properly, the timer not resetting properly, the word that needs to be guessed appearing in the console, removing unnecessary files from the project). Please refer to the [Adherance to UI Design System Section](#adherance-to-ui-design-system) of this document and the [Deliverable 4 Commit Log](https://github.com/professor-forward/project-snm/commits/f/deliverable4) for more details on the refinements we made. Besides updates to the UI Design System and bug fixes, no major features (that were not already implemented in Deliverable 3) were implemented into the application during Deliverable 4.


## Git usage (commit messages, all students involved)
All three group members made commits for this deliverable.

Sample commits to show all three group members participated in this deliverable:
<img width="996" alt="Screen Shot 2022-04-02 at 8 30 49 AM" src="https://user-images.githubusercontent.com/71230219/161383402-562e2aeb-0f3a-4662-bdd3-758a2124fd0b.png"><br>

<img width="996" alt="Screen Shot 2022-04-02 at 8 30 08 AM" src="https://user-images.githubusercontent.com/71230219/161383373-4ecdbde2-c501-4120-b7f0-6bd9a1c4dd56.png"><br>

<img width="996" alt="Screen Shot 2022-04-02 at 8 30 30 AM" src="https://user-images.githubusercontent.com/71230219/161383392-f092c1c3-5401-4aea-9f60-a528d548b10c.png">
