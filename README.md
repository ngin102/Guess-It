# Guess It!
**[Click here to view a demo (video and screenshots) of the game.](#demo)**
<img width="1420" alt="Guess It! Mainpage" src="https://github.com/ngin102/guess-it/assets/71230219/0ece5f96-7ea5-403e-a17e-e965ad7dcd28">

## Introduction
“Guess It!” is a game where you need to guess an English word. While you make guesses, the website will tell you whether the word is alphabetically before or after the word you guessed. “Guess It!” has multiple modes for players to choose from.

This is the repository for Version 2 of the game (this version of "Guess It!" has an updated look and layout).

### Team members
| Team member  | Email Address       |
|--------------|---------------------|
| Samuel Brie  | sbrie013@uottawa.ca |
| Nicholas Gin | ngin102@uottawa.ca  |
| Marija Bolic | mboli027@uottawa.ca |

## Documentation
* **[UI Design System](docs/ui_design_system.pdf)**: A document containing the set of standards for the colour palette, fonts, icons, buttons, UI components and form elements for "Guess It!"
	- [Icons](app/icons): Icons used in the UI.
* **[Installation](#installation)**: How to install "Guess It!" on your device. **A helper `./setup.sh` script is provided to get necessary components working. This script requires [Homebrew](https://brew.sh) to prepare necessary components for the project; install Homebrew before running the script. All installation instructions and the helper script were made based on a Linux environment. All scripts should execute natively on Linux and macOS, but a Windows Subsystem for Linux is required for their use on Windows.**
* **[How to Start Developing](#how-to-start-developing)**: Steps taken to ensure that the application runs properly in the development environment.
* **[Deployment](#deployment)**: Deploying the project using the provided helper `./deploy.sh` script.
* **[Upgrades](#upgrades)**: Upgrading the project using the provided helper `./upgrade.sh` script.
* **[Testing](#testing)**: Running the project unit tests. The unit tests can run independently or using the provided helper `./tests.sh` script. 
* **[How to Play](#how-to-play)**: How to play "Guess It!"
* **[Demo](#demo)**: A demo of "Guess It!" – including a video demo.
	- **[Screenshots (of available features)](#screenshots)**: The video demo as a set of screenshots.

## Installation
**A helper `./setup.sh` script is provided to get components required to run "Guess It" working. <br>
This script requires [Homebrew](https://brew.sh) to prepare necessary components for the project; install Homebrew before running the script.**
<br>

**Also note that all installation instructions and the helper script were made based on a Linux environment, as instructed in the project outline. All scripts should execute natively on Linux and MacOS, but a Windows Subsystem for Linux is required for their use on Windows.**

You will need the following technologies installed:
* [PHP 8.2.6+](#php)
* [PHPUnit 10.1.3+](#phpunit)
* [Postgres 14.7+](#postgres) 


The video below shows the helper `./setup.sh` script executing successfully (click the image to open the video). At the end of the video, we check that all required technologies were installed by checking the version of each technology in the terminal.

[![Setup Script](https://img.youtube.com/vi/gfKfA8aALCU/0.jpg)](https://youtu.be/gfKfA8aALCU "Setup Script Running")


### PHP
To run this project, you need PHP and a command line.
The project was tested on `PHP 8.2.6`.

The helper script uses the command `brew install php` to install PHP.

Check which version of PHP you have installed on your device using the following command:
```bash
php --version
```

The output of this command should be similar to: 
```
PHP 8.2.6 (cli) (built: Jan 21 2022 04:34:05) (NTS)
Copyright (c) The PHP Group
Zend Engine v4.1.2, Copyright (c) Zend Technologies
    with Zend OPcache v8.1.2, Copyright (c), by Zend Technologies
```

You can start the connection to the localhost using the helper `./server.sh` script.


### PHPUnit
To run the php tests included with the project, you will also need to install [PHPUnit](https://phpunit.de).
The PHPUnit tests were tested on `PHP 10.1.3`.

The helper script uses the command `brew install phpunit` to install PHPUnit.

Check which version of PHPUnit you have installed on your device using the following command:
```bash
phpunit --version
```

The output of this command should be similar to: 
```
PHPUnit 10.1.3 by Sebastian Bergmann and contributors.
```

### Postgres

The application requires a postgres database.
You must install the database locally.

The helper script uses the command `brew install postgresql` to install Postgres.

The project was tested on `PostgreSQL 14.7 (Homebrew)`

Check which version of Postgres you have installed on your device using the following command:
```bash
psql --version
```

The output of this command should be similar to:

```bash
psql (PostgreSQL) 14.7 (Homebrew)
```

#### Seeding the Postgres Database

You can seed your database with:

```bash
./bin/db/create
```

The output should look similar to
```
CREATE DATABASE
CREATE SCHEMA
CREATE TABLE
CREATE TABLE
CREATE TABLE
CREATE TABLE
CREATE TABLE
INSERT 0 6
INSERT 0 2777
INSERT 0 121
INSERT 0 166
INSERT 0 377
```

You should then be able to access the database using `psql` (use the following command):

```
psql postgres
```

You can interact with the database via SQL.
For example:
```
psql (14.2)
Type "help" for help.

postgres=# \dt guess_it.*
                  List of relations
  Schema  |        Name         | Type  |    Owner    
----------+---------------------+-------+-------------
 guess_it | celebrity_mode      | table | nicholasgin
 guess_it | educational_mode    | table | nicholasgin
 guess_it | leaderboard         | table | nicholasgin
 guess_it | regular_random_mode | table | nicholasgin
 guess_it | schema_migrations   | table | nicholasgin
(5 rows)

```

There is also a set of [migrations](https://github.com/professor-forward/project-snm/tree/f/deliverable4/db/migrations), which track changes to our schema. Because there has not been a formal first release of our application previous to Deliverable 4, it is sufficient to use 
```./bin/db/create``` to add these migrations to the database.

The video below shows the execution of `./bin/db/create` and then the execution of the `./server.sh` script (click the image to open the video).
If the database is created and seeded and the server is running, you can then visit `http://localhost:4000` to see the application running. The video also features a version of the application in which, every time the player selects "Regular Mode", an alert with the "Word of the Day" appears. This feature was only used for testing and was removed from the final application (the version of the application that is now implemented and found in this repository); no other functionality (demonstrated in the video) differs between this "testing" version and the final version of the application.

[![Create and Server Script](https://img.youtube.com/vi/f7IIqScnFBQ/0.jpg)](https://youtu.be/f7IIqScnFBQ "Create and Server Script Running")


## How to Start Developing
To start developing, ensure that you have installed all necessary components to get "Guess It" running. Please view the [Installation Section](#installation) of this document.

To run the application for the purposes of the development environment:
* Change the directory to the project-snm repository (the development environment), wherever you have it saved on your device.
* Run the `./bin/db/create` script to build and seed the database required for this application to function properly.
* Run the `./server.sh` script to start the server connection to the localhost, which allows you to view the application running from a browser. Visit `http://localhost:4000` to see the application running.

If you are developing tests for the application, please view the [Testing Section](#testing) of this document for information about how to run PHPUnit Tests and JS Tests [manually](#manually-running-the-tests) and using a [helper script](#helper-script).

The video below shows the execution of `./bin/db/create` and then the execution of the `./server.sh` script. The video also features a version of the application in which, every time the player selects "Regular Mode", an alert with the "Word of the Day" appears. This feature was only used for testing and was removed from the final application (the version of the application that is now implemented and found in this repository); no other functionality (demonstrated in the video) differs between this "testing" version and the final version of the application.

[![Create and Server Script](https://img.youtube.com/vi/f7IIqScnFBQ/0.jpg)](https://youtu.be/f7IIqScnFBQ "Create and Server Script Running")

## Deployment
**A helper `./deploy.sh` script is provided to deploy the project.**

To run the helper script:
* Change the directory to the project-snm repository (the development environment), wherever you have it saved on your device.
* Run the `./deploy.sh` script.

After completing the two steps above, the script will automatically zip up the contents of the development environment and then unzip them in a temp folder, which will be created on the **Desktop** of your device. The script will then check that you have all necessary components installed using `./setup.sh` before initializing/re-initializing the database by running `./bin/db/create` and starting the server connection to the localhost from the temp folder using `./server.sh`.

You can then visit `http://localhost:4000` to see the application running.

The video below shows how `./deploy.sh` runs (click the image to open the video). All necessary components that are needed to run the project were already installed on the device this script was demoed on in the video; the video reflects this in the terminal. If these components were not already installed, the script would go through the process of installing all of them. The video also features a version of the application in which, every time the player selects "Regular Mode", an alert with the "Word of the Day" appears. This feature was only used for testing and was removed from the final application (the version of the application that is now implemented and found in this repository); no other functionality (demonstrated in the video) differs between this "testing" version and the final version of the application.

[![Deploy Script](https://img.youtube.com/vi/huNU17In57k/0.jpg)](https://youtu.be/huNU17In57k "Deploy Script Running")


## Upgrades
**A helper `./upgrade.sh` script is provided to upgrade the project once it has already been deployed.** 

This script should only be used after the project has been [deployed](#deployment), as it requires the Desktop temp folder, which is created by the deployment script.

To run the helper script:
* Change the directory to the project-snm repository (the development environment), wherever you have it saved on your device.
* Run the `./upgrade.sh` script.

After completing the two steps above, the script will automatically zip up the contents of the development environment and then unzip them in the Desktop temp folder (the previous Desktop temp folder and its contents are replaced with this new one). The script will then check that you have all necessary components installed using `./setup.sh` before initializing/re-initializing the database by running `./bin/db/create` and starting the server connection to the localhost from the temp folder using `./server.sh`. If the server connection to the localhost was already established before this script was run, then the initial connection is kept and you can access the upgraded project files as you would have had the connection been re-established; the terminal will indicate that a new server connection can not be established (there is no need for a new server connection).

You can then visit `http://localhost:4000` to see the application running.

The video below shows how `./upgrade.sh` runs; we demo a change being made to the project (in the development environment) and how this change is reflected in the files in the temp folder once the script is called (click the image to open the video). All necessary components that are needed to run the project were already installed on the device this script was demoed on in the video; the video reflects this in the terminal. If these components were not already installed, the script would go through the process of installing all of them.
The video below also shows the execution of `./upgrade.sh` such that the connection to the localhost is still running when the script is executed; the terminal indicates that a new connection can not be established, but this does not impact the project files being upgraded and your ability to run the upgraded project files without restarting the connection.


[![Upgrades Script](https://img.youtube.com/vi/vmy0PBGDmOU/0.jpg)](https://youtu.be/vmy0PBGDmOU "Upgrades Script Running")



## Testing
### Helper Script
**A helper `./tests.sh` script is provided to run the PHPUnit tests automatically for you. This script requires that you first initiate the server connection to the localhost from the project directory in which you are running these tests; it is recommended that you run the tests from the development environment.**

To run the helper script:
* Change the directory to the project-snm repository (the development environment), wherever you have it saved on your device.
* Run the helper script, `./tests.sh`.

The script will then check that you have all necessary components installed using `./setup.sh` before running the tests. 

The video below shows the helper script successfully running (click the image to open the video). 

[![Tests Script](https://img.youtube.com/vi/eH4jihvtNMo/0.jpg)](https://youtu.be/eH4jihvtNMo "Tests Script Running")


### Manually Running the Tests
You can manually run the six PHPUnit tests using [PHPUnit](https://phpunit.de). These are the tests found in the [phpUnit folder within the tests folder](tests/phpUnit).

These tests can be run using the following command (after changing the directory to the project repository):
```bash
phpunit ./tests/phpUnit/
```

The output should show something similar to

```
PHPUnit 9.5.16 by Sebastian Bergmann and contributors.

......                                                              6 / 6 (100%)

Time: 00:00.001, Memory: 22.31 MB

OK (6 tests, 6 assertions)
```

## How to Play
"Guess It!" is a word-guessing game in which you must guess an English word. If you guess a word that is alphabetically before the one you're supposed to guess, a green arrow will point up. If it comes after, a red arrow will point down. Keep guessing until you "Guess It!"

#### Game Modes
#### Regular Mode
Guess the "Word of the Day." The "Word of the Day" changes every day. Check the leaderboard to see how your score compares to the scores of other players.
        
#### Random Mode
This is the non-competitive practice mode of the game. This mode does not have a leaderboard. Instead of a "Word of the Day," you will be given a randomly generated word to guess. You can play this mode as many times as you want in a day. You can add a timer, a guess limit, or both to challenge yourself!

#### Celebrity Mode
Similar to Random Mode, but instead of guessing a word, you guess a celebrity's name. We hope you'll (Tom) Cruise through this one.

#### Education Mode
Similar to Random Mode, but all of the words you must guess are scientific in nature. We, too, enjoy learning.

#### Number Mode
Similar to Random Mode, but instead of guessing a word, you guess a number.

#### Hint
If the game is too difficult for you and you need some assistance, don't worry, you can get a hint! Hints are available for all Game Modes.


## Demo
A video demo of our project (**this video has audio**; click on the image to open the video):

[![Demo](https://img.youtube.com/vi/D-zZ0QyAfnU/0.jpg)](https://youtu.be/D-zZ0QyAfnU "Guess It! Demo")

### Screenshots
The video demo as a set of screenshots (screenshots of available features).

"Index" page (the first page you view when you launch the application):
<img width="1420" alt="Index page" src="https://github.com/ngin102/guess-it/assets/71230219/af9e0983-ff7a-4d6e-851a-d1f35f46c9be">

Viewing the "How to Play" page (after clicking the Question Mark icon on the "Index" page):
<img width="1420" alt="How to Play page" src="https://github.com/ngin102/guess-it/assets/71230219/509615cc-414d-42a9-b93f-4fef7deb8494">

Returning to the "Index" page (after clicking the Back Arrow icon on the "How to Play" page) and highlighting the Regular Mode Button:
<img width="1420" alt="Index page (after clicking the Back Arrow icon on the How to Play page) and highlighting the Regular Mode Button" src="https://github.com/ngin102/guess-it/assets/71230219/83334dd1-f67a-4dd9-9d1b-7479a41e5131">

Playing the Game in "Regular Mode" (after clicking the Regular Mode Button on the "Index" page). From this "Mainpage," the player can click on the Back Arrow icon to return to the "Index" page, on the Question Mark icon to view the "How to Play" page, on the Trophy icon to view the "Leaderboard" page, on the Lightbulb icon to view a hint, and on the Gears icon to view the "Settings" page:
<img width="1033" alt="Guess It! Mainpage" src="https://github.com/ngin102/guess-it/assets/71230219/43a8aa17-e754-4361-bd1a-43e3b9dd14b2">

Viewing the "Leaderboard" page (after clicking the Trophy icon on the "Index" page):
<img width="1420" alt="Leaderboard page" src="https://github.com/ngin102/guess-it/assets/71230219/ef67cb16-6692-40cf-b8e5-1c16bf855fcf">

Viewing a Hint (after returning to the "Mainpage" by clicking on the Back Arrow icon on the "Leaderboard" page and clicking on the Lightbulb icon on the "Mainpage"):
<img width="1420" alt="Viewing a Hint on the Mainpage" src="https://github.com/ngin102/guess-it/assets/71230219/18a1b70f-2101-43d8-ae67-82e685f48542">

Viewing the "Settings" page (after clicking the Gears icon on the "Mainpage"):
<img width="1420" alt="Settings page" src="https://github.com/ngin102/guess-it/assets/71230219/7441c540-801f-4d92-9ad2-150a6cec6b62">

Returning to the "Index" page (after clicking the Change Game Mode Button on the "Settings" page):
<img width="1420" alt="Index page" src="https://github.com/ngin102/guess-it/assets/71230219/af9e0983-ff7a-4d6e-851a-d1f35f46c9be">

Inputting "Apple" as a guess on the "Mainpage" (after clicking the Regular Mode Button on the "Index" page):
<img width="1420" alt="Inputting Apple as a guess" src="https://github.com/ngin102/guess-it/assets/71230219/1a78e5b9-ca0a-41eb-95ce-b3fe64164cc3">

Guessing "Apple;" the Red Arrow indicates the word the player needs to guess is alphabetically after "apple" (clicking the enter Button after the steps in the previous screenshot):
<img width="1420" alt="Red arrow appears after inputting Apple" src="https://github.com/ngin102/guess-it/assets/71230219/e5136e43-1138-483d-ad4f-837708fb176f">

Inputting "Zoo" as a guess on the "Mainpage:"
<img width="1420" alt="Inputting Zoo as a guess" src="https://github.com/ngin102/guess-it/assets/71230219/e937a7d4-47c5-4c57-b56c-473810cdd712">
 
Guessing "Zoo;" the Green Arrow indicates the word the player needs to guess is alphabetically before "zoo" (clicking the enter Button after the steps in the previous screenshot):
<img width="1420" alt="Green arrow appears after inputting Zoo" src="https://github.com/ngin102/guess-it/assets/71230219/baf6c1c8-b3d0-4ff8-b136-2c63831f3005">

Inputting "Parabola" as a guess on the "Mainpage:"
<img width="1420" alt="Inputting Parabola as a guess" src="https://github.com/ngin102/guess-it/assets/71230219/992c931a-efc0-4d32-b0de-9bde19c44116">

"Parabola" was the correct guess. The player is prompted to enter their name for a Leaderboard entry:
<img width="1420" alt="Leaderboard prompt" src="https://github.com/ngin102/guess-it/assets/71230219/948da8a3-418d-4369-bf2d-9ceb140ceb94">

Inputting "Alan" as the player name for the Leaderboard entry:
<img width="1420" alt="Inputting Alan for Leaderboard entry" src="https://github.com/ngin102/guess-it/assets/71230219/1c59f436-129b-4047-ad34-cf44a67a9c18">

Viewing the "Winner" modal after pressing OK on the prompt from the previous screenshot. From this modal, the player can return to the "Index" by clicking on the Index Button, can view the "Leaderboard" by clicking the Leaderboard Button, and can view the Wikipedia article for the word that needed to be guessed by clicking the provided hyperlink (in this case, the word, "parabola," which is underlined and blue):
<img width="1420" alt="Winnder modal" src="https://github.com/ngin102/guess-it/assets/71230219/adcc14c5-f5f0-40e0-91e3-df1a6ff00a09"> 

Viewing the "Leaderboard" and the newly added Leaderboard entry after clicking the Leaderboard Button on the modal (from the previous screenshot):!
<img width="1420" alt="Leaderboard" src="https://github.com/ngin102/guess-it/assets/71230219/c6b2be87-c6ec-4287-a46a-e1790945fea9">

Returning to the "Index" page (after clicking the Back Arrow icon on the "Leaderboard" page):
<img width="1420" alt="Index page" src="https://github.com/ngin102/guess-it/assets/71230219/83334dd1-f67a-4dd9-9d1b-7479a41e5131">

Playing the Game in "Regular Mode" (after clicking the Regular Mode Button on the "Index" page). The player views a modal that tells them they can not play "Regular Mode" again for the day, since they have already won it. The player can return to the "Index" page by clicking on the Index Button on this modal:
<img width="1420" alt="Can not play modal" src="https://github.com/ngin102/guess-it/assets/71230219/3de45baa-3896-423c-a03a-0ea03ffd3a11">

Returning to the "Index" page (after clicking the Index Button on the modal from the previous screenshot):
<img width="1420" alt="Index page" src="https://github.com/ngin102/guess-it/assets/71230219/83334dd1-f67a-4dd9-9d1b-7479a41e5131">

Playing the Game in "Random Mode" (after clicking the Random Mode Button on the "Index" page). As in the case of playing "Regular Mode," from this "Mainpage," the player can click on the Back Arrow icon to return to the "Index" page, on the Question Mark icon to view the "How to Play" page, on the Trophy icon to view the "Leaderboard" page, on the Lightbulb icon to view a hint, and on the Gears icon to view the "Settings" page:
<img width="1420" alt="Random Mode" src="https://github.com/ngin102/guess-it/assets/71230219/6c92e2a5-8bf5-4f06-918b-3ce13f7f4a25">

Viewing the "Settings" page (after clicking the Gears icon on the "Mainpage"). The "Settings" page for "Random Mode" appears differently than the "Settings" page for "Regular Mode." All other pages in this mode appear the same as they do in "Regular Mode:"
<img width="1420" alt="Random Mode Settings" src="https://github.com/ngin102/guess-it/assets/71230219/db6d6c59-a77a-4a59-a4bb-466c09749188">

Adding a two-minute timer to the game (selecting the Timer toggle ON and then clicking the Apply Button):
<img width="1420" alt="Timer toggle ON" src="https://github.com/ngin102/guess-it/assets/71230219/c0f490c8-6563-4271-8745-e2e20685d4ee">
<img width="1420" alt="Random Mode with two-minute timer" src="https://github.com/ngin102/guess-it/assets/71230219/9cbfff29-1096-4ce8-86ab-e671c44415a6">

Returning to the "Settings" page (after clicking the Gears icon on the "Mainpage"), removing the timer from the game, and adding 10 limited guesses to the game (selecting the Limited Guesses toggle ON, selecting the Timer toggle OFF, and then clicking the Apply Button):
<img width="1420" alt="Limited Guesses toggle ON" src="https://github.com/ngin102/guess-it/assets/71230219/22854498-41ac-4844-ad46-2f242add9894">
<img width="1420" alt="Random Mode with limited guesses" src="https://github.com/ngin102/guess-it/assets/71230219/ed4e8865-1a57-4895-a453-984932896daa">

Returning to the "Settings" page (after clicking the Gears icon on the "Mainpage"), adding both the timer from the game and 10 limited guesses to the game (selecting the Limited Guesses toggle ON, selecting the Timer toggle ON, and then clicking the Apply Button):
<img width="1420" alt="Timer and Limited Guesses toggles ON" src="https://github.com/ngin102/guess-it/assets/71230219/fabb60f0-75fc-46a6-bb60-5a04e0bfdfd9">
<img width="1420" alt="Random Mode with Timer and Limited Guessees" src="https://github.com/ngin102/guess-it/assets/71230219/466378ae-35e6-4bc2-bbc9-aa03eaf16ca6">

Returning to the "Settings" page (after clicking the Gears icon on the "Mainpage"), removing the timer from the game and the 10 limited guesses from the game (selecting the Limited Guesses toggle OFF, selecting the Timer toggle OFF, and then clicking the Apply Button):
<img width="1420" alt="Limited Guesses toggle OFF, Timer toggle OFF" src="https://github.com/ngin102/guess-it/assets/71230219/718b048e-1220-4b30-a8ea-8fca02b260a7">
<img width="1420" alt="Random Mode" src="https://github.com/ngin102/guess-it/assets/71230219/6c92e2a5-8bf5-4f06-918b-3ce13f7f4a25">

Making some guesses ("Zoo" and "Apple" - as seen in the screenshots for "Regular Mode") and then the guess, "Dad:"
<img width="1420" alt="Random Mode guesses: Zoo, Apple, Dad" src="https://github.com/ngin102/guess-it/assets/71230219/b48b93dd-60ca-4a77-b25e-257ad7a5a8b5">

Viewing the "Winner" modal (after pressing the enter Button for the player's correct guess). From this modal, the player can return to the "Index" by clicking on the Index Button and can view the Wikipedia article for the word that needed to be guessed by clicking the provided hyperlink (in this case, the word, "exchange," which is underlined and blue):
<img width="1420" alt="Screen Shot 2022-04-02 at 6 48 52 AM" src="https://user-images.githubusercontent.com/71230219/161379815-9c2f3106-0a54-42f5-9e03-b1c51a390737.png">

Viewing the Wikipedia page for "dad" in a new tab (after clicking the hyperlink in the modal from the previous screenshot):
<img width="1420" alt="Random Mode Winner Modal" src="https://github.com/ngin102/guess-it/assets/71230219/fe3e3763-0960-4af3-b69f-43472dd8e74f">

Returning to the "Index" page (after clicking the Index Button on the "Winner" modal):
<img width="1420" alt="Index page" src="https://github.com/ngin102/guess-it/assets/71230219/83334dd1-f67a-4dd9-9d1b-7479a41e5131">

Playing the Game in "Celebrity Mode" (after clicking the Celebrity Mode Button on the "Index" page). As in the case of playing "Random Mode," from this "Mainpage," the player can click on the Back Arrow icon to return to the "Index" page, on the Question Mark icon to view the "How to Play" page, on the Trophy icon to view the "Leaderboard" page, on the Lightbulb icon to view a hint, and on the Gears icon to view the "Settings" page; all of these pages appear and function the same as they do in "Random Mode:"
<img width="1420" alt="Celebrity Mode" src="https://github.com/ngin102/guess-it/assets/71230219/a0ab5412-cb3d-4281-b837-e71941a8c5b2">

Viewing the "Settings" page (after clicking the Gears icon on the "Mainpage") and adding 10 limited guesses to the game (selecting the Limited Guesses toggle ON, selecting the Timer toggle OFF, and then clicking the Apply Button):
<img width="1420" alt="Limited Guesses toggle ON" src="https://github.com/ngin102/guess-it/assets/71230219/22854498-41ac-4844-ad46-2f242add9894">
<img width="1420" alt="Celebrity Mode with limited guesses" src="https://github.com/ngin102/guess-it/assets/71230219/ed4e8865-1a57-4895-a453-984932896daa">

Using all of the player's 10 guesses to guess that the celebrity name that needs to be guessed is "Taylor Swift."
<img width="1420" alt="Celebrity Mode guesses" src="https://github.com/ngin102/guess-it/assets/71230219/6aba8063-a90d-4ed0-b04f-f8bbb02a0a98">

Since the player has used all 10 of their guesses and has failed to guess the celebrity name, the "Loser" modal appears. From this modal, the player can return to the "Index" by clicking on the Index Button and can view the Wikipedia article for the celebrity that needed to be guessed by clicking the provided hyperlink (in this case, the celebrity, "Stanley Kubrick," which is underlined and blue):
<img width="1420" alt="Celebrity Mode Loser Modal" src="https://github.com/ngin102/guess-it/assets/71230219/50b9fb38-c786-4f57-aca2-de47bb72d9f3">

Viewing the Wikipedia page for "stanley kubrick" in a new tab (after clicking the hyperlink in the modal from the previous screenshot):
<img width="1420" alt="Stanley Kubrik Wikipedia page" src="https://github.com/ngin102/guess-it/assets/71230219/e222c774-728d-422e-ad8b-734b1603b9e8">

Returning to the "Index" page (after clicking the Index Button on the "Loser" modal):
<img width="1420" alt="Index page" src="https://github.com/ngin102/guess-it/assets/71230219/83334dd1-f67a-4dd9-9d1b-7479a41e5131">

Playing the Game in "Education Mode" (after clicking the Education Mode Button on the "Index" page). As in the case of playing "Random Mode," from this "Mainpage," the player can click on the Back Arrow icon to return to the "Index" page, on the Question Mark icon to view the "How to Play" page, on the Trophy icon to view the "Leaderboard" page, on the Lightbulb icon to view a hint, and on the Gears icon to view the "Settings" page; all of these pages appear and function the same as they do in "Random Mode:"
<img width="1420" alt="Education Mode" src="https://github.com/ngin102/guess-it/assets/71230219/a0ab5412-cb3d-4281-b837-e71941a8c5b2">

Viewing the "Settings" page (after clicking the Gears icon on the "Mainpage") and adding a two-minute timer to the game (selecting the Timer toggle ON and then clicking the Apply Button):
<img width="1420" alt="Timer toggle ON" src="https://github.com/ngin102/guess-it/assets/71230219/c0f490c8-6563-4271-8745-e2e20685d4ee">
<img width="1420" alt="Random Mode with two-minute timer" src="https://github.com/ngin102/guess-it/assets/71230219/9cbfff29-1096-4ce8-86ab-e671c44415a6">

Failing to guess the word within the two minutes given by the timer; in the screenshot, the timer has exceeded:
<img width="1420" alt="Educational Mode, Timer exceeded" src="https://github.com/ngin102/guess-it/assets/71230219/f28a84a3-8138-4e5b-bc10-152d7f460549">

Since the player has failed to guess the educational word within the two-minute limit, the "Loser" modal appears. From this modal, the player can return to the "Index" by clicking on the Index Button and can view the Wikipedia article for the word that needed to be guessed by clicking the provided hyperlink (in this case, the word, "chlorine," which is underlined and blue):
<img width="1420" alt="Educational Mode Loser Modal" src="https://github.com/ngin102/guess-it/assets/71230219/83722eda-8f8e-4b60-8095-0fc0e2beabad">

Viewing the Wikipedia page for "chlorine" in a new tab (after clicking the hyperlink in the modal from the previous screenshot):
<img width="1420" alt="Chlorine Wikipedia page" src="https://github.com/ngin102/guess-it/assets/71230219/01a62755-8fdd-488a-b983-bf3ce9ec8555">

Returning to the "Index" page (after clicking the Index Button on the "Loser" modal):
<img width="1420" alt="Index page" src="https://github.com/ngin102/guess-it/assets/71230219/83334dd1-f67a-4dd9-9d1b-7479a41e5131">

Playing the Game in "Number Mode" (after clicking the Number Mode Button on the "Index" page). As in the case of playing "Random Mode," from this "Mainpage," the player can click on the Back Arrow icon to return to the "Index" page, on the Question Mark icon to view the "How to Play" page, on the Trophy icon to view the "Leaderboard" page, on the Lightbulb icon to view a hint, and on the Gears icon to view the "Settings" page; all of these pages appear and function the same as they do in "Random Mode:"
<img width="1420" alt="Index page" src="https://github.com/ngin102/guess-it/assets/71230219/83334dd1-f67a-4dd9-9d1b-7479a41e5131">

Viewing the "Settings" page (after clicking the Gears icon on the "Mainpage") and adding both the timer from the game and 10 limited guesses to the game (selecting the Limited Guesses toggle ON, selecting the Timer toggle ON, and then clicking the Apply Button):
<img width="1420" alt="Timer and Limited Guesses toggles ON" src="https://github.com/ngin102/guess-it/assets/71230219/fabb60f0-75fc-46a6-bb60-5a04e0bfdfd9">
<img width="1420" alt="Random Mode with Timer and Limited Guessees" src="https://github.com/ngin102/guess-it/assets/71230219/466378ae-35e6-4bc2-bbc9-aa03eaf16ca6">

Making some guesses ("10," "200" and "999999999999999") and then the guess, "54632907:"
<img width="1420" alt="Number Mode guesses" src="https://github.com/ngin102/guess-it/assets/71230219/92c7b520-f2aa-439f-b8b3-a874ff285506">

Viewing the "Winner" modal (after pressing the enter Button for the player's correct guess). From this modal, the player can return to the "Index" by clicking on the Index Button:
<img width="1420" alt="Number Mode Winner Modal" src="https://github.com/ngin102/guess-it/assets/71230219/69c4542a-4a63-4dd5-83c2-e14b0dbf7b49">

Returning to the "Index" page (after clicking the Index Button on the "Winner" modal):
<img width="1420" alt="Index page" src="https://github.com/ngin102/guess-it/assets/71230219/83334dd1-f67a-4dd9-9d1b-7479a41e5131">
