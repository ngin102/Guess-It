# Deliverable 3
## Introduction
This document outlines the work our group completed on the project for Deliverable 3.

| Description  |
|--------------|
| [Server Technology integrated (e.g. PHP, Elixir, Go) including library and frameworks](#server-side-language-integrated-and-database-technology-integrated)|
| [Database Technology integrated (e.g. MySQL, Postgres, Redis, etc)](#server-side-language-integrated-and-database-technology-integrated)|
| [Automated test framework in place](#automated-test-framework-in-place) |
| [Deployment / Upgrade Scripts working](#deployment-and-upgrade-scripts-working) |
| [Refined HTML/CSS + UI Design System](#refined-htmlcss-and-ui-design-system) |
| [Front-end (mock) interactivity using JavaScript](#front-end-mock-interactivity-using-javascript) |
| [README.md updated with installation / deployment instructions](#readmemd-updated-with-installation-and-deployment-instructions) |

### Deliverable Branch

All changes for Deliverable 3 were made on the f/deliverable3 branch before a pull request was made and the changes made on this branch were merged with the main branch: https://github.com/professor-forward/project-snm/tree/f/deliverable3/


## Server Side Language Integrated and Database Technology Integrated
Note that any code screenshots may not currently reflect the code as they appear in our repository for this project; the code may have been updated or modified.

The server technology and database technology that were integrated into the project were PHP and PostgreSQL, respectively.

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

In the code above, we have a set of [migrations](https://github.com/professor-forward/project-snm/tree/f/deliverable3/db/migrations), which track changes to our schema. Because we have not had a formal first release of our application, it should be sufficient for the user to use schema.sql to create and seed the database instead of running specific migration files.

A look at the code for seed.sql (used to seed the database). This code is over 3000 lines long:
<img width="1483" alt="05  Seed SQL" src="https://user-images.githubusercontent.com/71230219/156137121-a1bf029c-d6f2-4c0b-bfbd-03d6c2e0f593.png">


Our schemas and tables were created and seeded by running these .sql files:
<img width="1452" alt="Screen Shot 2022-03-04 at 11 28 42 AM" src="https://user-images.githubusercontent.com/71230219/156801477-20ddd9f7-a667-46fb-b5bc-b798235ae4c2.png">

<img width="1453" alt="Screen Shot 2022-03-04 at 11 29 27 AM" src="https://user-images.githubusercontent.com/71230219/156801629-5e4548e4-2d67-437d-bd52-32b50b4c0363.png">

[Click here to view the full schema.sql file. Note this file may have been updated.](https://github.com/professor-forward/project-snm/blob/f/deliverable3/db/schema.sql)

[Click here to view the full seed.sql file (the code is over 3000 lines long). Note this file may have been updated.](https://github.com/professor-forward/project-snm/blob/f/deliverable3/db/seed.sql)

Here is some background on our project to understand how the server and database technology are being used in it.

Our project is "Guess It". "Guess It" is a word-guessing game in which you must guess an English word. If you guess a word that is alphabetically before the one you're supposed to guess, a green arrow will point up; if it comes after, a purple arrow will point down.

There are five Game Modes in "Guess It." In the first mode, "Regular Mode," the player must guess the "Word of the Day." The "Word of the Day" changes every day. The player can check the leaderboard to see how their score compares to the scores of other players. The second mode is "Random Mode." This is the non-competitive practice mode of the game. This mode does not have a leaderboard. Instead of a "Word of the Day," the player is given a randomly generated word to guess. They can play this mode as many times as they want in a day. The third mode is "Celebrity Mode," which is similar to "Random Mode," but instead of guessing a word, the player guesses a celebrity's name. The fourth mode is "Educational Mode," which is similar to "Random Mode," but all of the words you must guess are scientific in nature. The fifth mode is "Number Mode," which is similar to "Random Mode," but instead of guessing a word, you guess a number.

As shown in schema.sql and seed.sql, we are storing all of the words that need to be guessed by the player in our PostgreSQL database, in respective tables that correspond to their Game Modes. "Regular Mode" and "Random Mode" share a table; while, all other Modes (except for "Number Mode") have their own respective tables. "Number Mode" is excluded from our database, as this Game Mode did not require the use of our database. There is also a table for leaderboard entries.

How the schema and tables are organized in the database:<br>
<img width="320" alt="Screen Shot 2022-03-04 at 11 29 54 AM" src="https://user-images.githubusercontent.com/71230219/156801725-9c0aafee-0534-4025-a70c-22791717b017.png">

Our code uses PHP to retrieve words from the database when the player starts playing the game; this allows us to ensure that only one particular word is to be guessed for "Regular Mode" on a particular day and that a random word is always selected for the other modes.

Our code also uses PHP to add data into the database. When the player wins a round of "Regular Mode," they are prompted to enter their name into the leaderboard; their entry is then added to the table for leaderboard entries.

Entries from the leaderboard table are also dynamically selected and displayed using PHP.

PHP configuration file used to establish connection to the database: 
<img width="806" alt="Screen Shot 2022-03-04 at 11 31 32 AM" src="https://user-images.githubusercontent.com/71230219/156801988-0f54b126-92c1-497e-a845-453a5bf0f6ca.png">

[Click to view config file. Note this file may have been updated.](https://github.com/professor-forward/project-snm/blob/f/deliverable3/app/php/config.php)

PHP file used to retrieve words from the database; notice that words are picked from a certain table based only the Game Mode selected:
<img width="1127" alt="Screen Shot 2022-03-04 at 11 33 32 AM" src="https://user-images.githubusercontent.com/71230219/156802290-a8095e41-6117-428b-899a-36010c180868.png">

[Click to view retrieve_word file. Note this file may have been updated.](https://github.com/professor-forward/project-snm/blob/f/deliverable3/app/php/retrieve_word.php)

PHP file used to add data to the leaderboard table in the database.

<img width="1360" alt="Screen Shot 2022-03-04 at 11 33 11 AM" src="https://user-images.githubusercontent.com/71230219/156802218-a07d2197-8847-476b-a8ae-c507943ed348.png">

[Click to view add_data file. Note this file may have been updated.](https://github.com/professor-forward/project-snm/blob/f/deliverable3/app/php/add_data.php)

PHP file used to view data from the leaderboard table in the database; the data is displayed onscreen in a table using Bootstrap elements:

<img width="932" alt="Screen Shot 2022-03-04 at 11 33 59 AM" src="https://user-images.githubusercontent.com/71230219/156802384-3391c7ec-a29b-4809-9c66-9c9e2a529186.png">

[Click to view view_data file. Note this file may have been updated.](https://github.com/professor-forward/project-snm/blob/f/deliverable3/app/php/view_data.php)

Note that the previous two PHP files make use of PHP classes, LeaderboardEtnry and TableInfo, respectively.
<img width="818" alt="Screen Shot 2022-03-04 at 11 35 46 AM" src="https://user-images.githubusercontent.com/71230219/156802661-ba5c6651-4ed2-47b3-832b-ce55ea6cb3da.png">
<img width="1291" alt="Screen Shot 2022-03-04 at 11 36 02 AM" src="https://user-images.githubusercontent.com/71230219/156802715-23fdbc3a-4e32-4e5c-b5d0-75a907f8ca88.png">
[Click to view LeaderboardEntry. Note this file may have been updated.](https://github.com/professor-forward/project-snm/blob/f/deliverable3/app/php/LeaderboardEntry.php)

[Click to view TableInfo. Note this file may have been updated.](https://github.com/professor-forward/project-snm/blob/f/deliverable3/app/php/TableInfo.php)


One JavaScript file in our project, play, in particular, works in tandem with these PHP files to ensure that the game is functioning properly:

<img width="740" alt="Screen Shot 2022-03-04 at 11 34 26 AM" src="https://user-images.githubusercontent.com/71230219/156812505-3c0bbc0a-fabd-48cf-865b-12dd3f8f149e.png">

[Click to view full play file (the screenshot above only shows part of the code). Note this file may have been updated.](https://github.com/professor-forward/project-snm/blob/f/deliverable3/app/js/play.js)

To see our PHP and PostgreSQL integration in action, please refer to the [Front-end (mock) interactivity using JavaScript section](#front-end-mock-interactivity-using-javascript) of this README, which includes a demos of our project.

## Automated Test Framework in Place
We created two sets of unit tests for this project: [PHPUnit tests](https://github.com/professor-forward/project-snm/blob/f/deliverable3/tests/phpUnit) and [JS tests (using Playwright)](https://github.com/professor-forward/project-snm/blob/f/deliverable3/tests/playwright).
There are six PHPUnit tests and two JS tests, totalling eight tests.

For information regarding how to run these tests manually or how to use the provided helper `./tests.sh` script to run these tests together, please refer to the [Testing section](https://github.com/professor-forward/project-snm/blob/f/deliverable3/README.md#testing) of the project README.

## Deployment and Upgrade Scripts Working
We created a helper `./deploy.sh` script to deploy the project and a helper `./upgrade.sh` script to upgrade the project once it has already been deployed.

For information regarding how to run these scripts and how these scripts function, please refer to the [Deploy section](https://github.com/professor-forward/project-snm/blob/f/deliverable3/README.md#deploy) and the [Upgrade section](https://github.com/professor-forward/project-snm/blob/f/deliverable3/README.md#upgrade) of the project README.

For more info on other scripts we created for installation purposes, like `./setup.sh` and `./server.sh`, please refer to the [Installation section](https://github.com/professor-forward/project-snm/blob/f/deliverable3/README.md#installation) of the project README.

## Refined HTML/CSS and UI Design System
We updated our UI Design System by adding more colours to our colour palette and incorporating elements from Bootstrap into our project.

Please refer to our updated and refined [UI Design System document](https://github.com/professor-forward/project-snm/blob/f/deliverable3/docs/ui_design_system.pdf) to view all HTML, CSS and UI design elements included in our project. Any UI design elements from Bootstrap are indicated as such in this document.

## Front-end (mock) interactivity using JavaScript
Now, a demo of our game (playing the game). As this is not the final deliverable of the project, there are still bugs and glitches that need to be fixed in our game, but it is mostly functional for this deliverable.

The following screenshots only demo "Regular Mode," since each Game Mode operates almost identically to one another (except with different words from the database or numbers). "Regular Mode" also adds entries into the leaderboard table, while the other Game Modes do not.

After selecting that we are playing "Regular Mode":
<img width="1002" alt="13" src="https://user-images.githubusercontent.com/71230219/156138710-686c30d4-db29-4540-a955-cb062026dfb0.png">

About to guess that the word is "Hello":
<img width="1158" alt="Screen Shot 2022-03-01 at 7 09 30 PM" src="https://user-images.githubusercontent.com/71230219/156270386-d2d584d5-5d92-4dcd-992b-bfd65ac2bc19.png">


The word we need to guess is alphabetically after "Hello":
<img width="1107" alt="Screen Shot 2022-03-01 at 7 09 37 PM" src="https://user-images.githubusercontent.com/71230219/156270402-16e6a8a7-8c75-428a-9f21-ce6abcdc4538.png">


After guessing that the word is "Zoo"; we see that the word we need to guess is alphabetically before "Zoo":
<img width="1054" alt="Screen Shot 2022-03-01 at 7 09 50 PM" src="https://user-images.githubusercontent.com/71230219/156270433-1c6b53b5-b7ac-4dd1-aa6d-219b95647f7e.png">


After correctly guessing that the word we needed to guess is "Remote"; we are prompted that we have won the game and are tasked with adding an entry into the leaderboard. We input that the player's name is "Bill":
<img width="1036" alt="Screen Shot 2022-03-01 at 7 13 54 PM" src="https://user-images.githubusercontent.com/71230219/156272850-1f1fd10d-5091-4296-a5f0-dfb52c42fb55.png">

After clicking "OK" on the prompt in the previous screenshot, we are redirected to the leaderboard page where see Bill's entry into the leaderboard:
<img width="1476" alt="19" src="https://user-images.githubusercontent.com/71230219/156139522-de1c3a3e-10fe-40d9-9ec8-d11bb2293590.png">

We can see that the leaderboard entry has been added to the leaderboard table in the database via pgAdmin 4. Bill's entry is the second entry in the table:
<img width="1350" alt="20" src="https://user-images.githubusercontent.com/71230219/156139582-66331726-e3fd-477d-8202-9ec0b0ed3535.png">
Note that the first entry in the table did not appear on the leaderboard page while we were playing the game, as it is associated with a different date than Bill's entry. The leaderboard page in the game will only display entries into the leaderboard that were made the same day the player is playing the game; the other entry in the table is from a date earlier than Bill's entry (and our demo).

A video demo of our application:

https://user-images.githubusercontent.com/71230219/156798460-3273658e-1483-4779-bcb1-41a62f2d9cb7.mov


## README.md Updated With Installation and Deployment Instructions
[Click to see updated README with installation and deployment instructions.](https://github.com/professor-forward/project-snm/blob/f/deliverable3/README.md)



