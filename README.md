# Guess It!
**[Click here to view a demo (video and screenshots) of our project.](#demo)**
<img width="1033" alt="Guess It! Mainpage" src="https://github.com/ngin102/guess-it/assets/71230219/43a8aa17-e754-4361-bd1a-43e3b9dd14b2">

## Introduction
“Guess It!” is a game where you need to guess an English word. While you make guesses, the website will tell you whether the word is alphabetically before or after the word you guessed. “Guess It!” has multiple modes for players to choose from.

### Team members
| Team member  | Email Address       |
|--------------|---------------------|
| Samuel Brie  | sbrie013@uottawa.ca |
| Nicholas Gin | ngin102@uottawa.ca  |
| Marija Bolic | mboli027@uottawa.ca |

## Documentation
* **[UI Design System](docs/ui_design_system.pdf)**: A document containing the set of standards for the colour palette, fonts, icons, buttons, UI components and form elements for "Guess It!"
	- [Icons](app/icons): Icons used in the UI.
* **[Installation](#installation)**: How to install "Guess It!" on your device. **A helper `./setup.sh` script is provided to get necessary components working. This script requires [Homebrew](https://brew.sh) to prepare necessary components for the project; install Homebrew before running the script. All installation instructions and the helper script were made based on a Linux environment. All scripts should execute natively on Linux and MacOS, but a Windows Subsystem for Linux is required for their use on Windows.**
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
* [PHP 8.1.2+](#php)
* [PHPUnit 9.5.16+](#phpunit)
* [Postgres 14.2+](#postgres) 


The video below shows the helper `./setup.sh` script executing successfully. At the end of the video, we check that all required technologies were installed by checking the version of each technology in the terminal.
[![Setup Script](https://img.youtube.com/vi/o4hFMYfEZEQ/0.jpg)](https://youtu.be/o4hFMYfEZEQ "Setup Script Running")


### PHP
To run this project, you need PHP and a command line.
The project was tested on `PHP 8.1.2`.

The helper script uses the command `brew install php` to install PHP.

Check which version of PHP you have installed on your device using the following command:
```bash
php --version
```

The output of this command should be similar to: 
```
PHP 8.1.2 (cli) (built: Jan 21 2022 04:34:05) (NTS)
Copyright (c) The PHP Group
Zend Engine v4.1.2, Copyright (c) Zend Technologies
    with Zend OPcache v8.1.2, Copyright (c), by Zend Technologies
```

You can start the connection to the localhost using the helper `./server.sh` script.


### PHPUnit
To run the php tests included with the project, you will also need to install [PHPUnit](https://phpunit.de).
The PHPUnit tests were tested on `PHP 9.5.16`.

The helper script uses the command `brew install phpunit` to install PHPUnit.

Check which version of PHPUnit you have installed on your device using the following command:
```bash
phpunit --version
```

The output of this command should be similar to: 
```
PHPUnit 9.5.16 by Sebastian Bergmann and contributors.
```

### Postgres

The application requires a postgres database.
You must install the database locally.

The helper script uses the command `brew install postgresql` to install Postgres.

The project was tested on `PostgreSQL 14.2`

Check which version of Postgres you have installed on your device using the following command:
```bash
psql --version
```

The output of this command should be similar to:

```bash
psql (PostgreSQL) 14.2
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
INSERT 0 369
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

The video below shows the execution of `./bin/db/create` and then the execution of the `./server.sh` script.
If the database is created and seeded and the server is running, you can then visit `http://localhost:4000` to see the application running. The video also features a version of the application in which, every time the player selects "Regular Mode", an alert with the "Word of the Day" appears. This feature was only used for testing and was removed from the final application (the version of the application that is now implemented and found in this repository); no other functionality (demonstrated in the video) differs between this "testing" version and the final version of the application.


[![Create and Server Script](https://img.youtube.com/vi/d4lq2iZ0378/0.jpg)](https://youtu.be/d4lq2iZ0378 "Create and Server Script Running")


## How to Start Developing
To start developing, ensure that you have installed all necessary components to get "Guess It" running. Please view the [Installation Section](#installation) of this document.

To run the application for the purposes of the development environment:
* Change the directory to the project-snm repository (the development environment), wherever you have it saved on your device.
* Run the `./bin/db/create` script to build and seed the database required for this application to function properly.
* Run the `./server.sh` script to start the server connection to the localhost, which allows you to view the application running from a browser. Visit `http://localhost:4000` to see the application running.

If you are developing tests for the application, please view the [Testing Section](#testing) of this document for information about how to run PHPUnit Tests and JS Tests [manually](#manually-running-the-tests) and using a [helper script](#helper-script).

The video below shows the execution of `./bin/db/create` and then the execution of the `./server.sh` script. The video also features a version of the application in which, every time the player selects "Regular Mode", an alert with the "Word of the Day" appears. This feature was only used for testing and was removed from the final application (the version of the application that is now implemented and found in this repository); no other functionality (demonstrated in the video) differs between this "testing" version and the final version of the application.

[![Create and Server Script](https://img.youtube.com/vi/d4lq2iZ0378/0.jpg)](https://youtu.be/d4lq2iZ0378 "Create and Server Script Running")

## Deployment
**A helper `./deploy.sh` script is provided to deploy the project.**

To run the helper script:
* Change the directory to the project-snm repository (the development environment), wherever you have it saved on your device.
* Run the `./deploy.sh` script.

After completing the two steps above, the script will automatically zip up the contents of the development environment and then unzip them in a temp folder, which will be created on the **Desktop** of your device. The script will then check that you have all necessary components installed using `./setup.sh` before initializing/re-initializing the database by running `./bin/db/create` and starting the server connection to the localhost from the temp folder using `./server.sh`.

You can then visit `http://localhost:4000` to see the application running.

The video below shows how `./deploy.sh` runs. All necessary components that are needed to run the project were already installed on the device this script was demoed on in the video; the video reflects this in the terminal. If these components were not already installed, the script would go through the process of installing all of them. The video also features a version of the application in which, every time the player selects "Regular Mode", an alert with the "Word of the Day" appears. This feature was only used for testing and was removed from the final application (the version of the application that is now implemented and found in this repository); no other functionality (demonstrated in the video) differs between this "testing" version and the final version of the application.


[![Deploy Script](https://img.youtube.com/vi/lpdlDQssooA/0.jpg)](https://youtu.be/lpdlDQssooA "Deploy Script Running")


## Upgrades
**A helper `./upgrade.sh` script is provided to upgrade the project once it has already been deployed.** 

This script should only be used after the project has been [deployed](#deployment), as it requires the Desktop temp folder, which is created by the deployment script.

To run the helper script:
* Change the directory to the project-snm repository (the development environment), wherever you have it saved on your device.
* Run the `./upgrade.sh` script.

After completing the two steps above, the script will automatically zip up the contents of the development environment and then unzip them in the Desktop temp folder (the previous Desktop temp folder and its contents are replaced with this new one). The script will then check that you have all necessary components installed using `./setup.sh` before initializing/re-initializing the database by running `./bin/db/create` and starting the server connection to the localhost from the temp folder using `./server.sh`. If the server connection to the localhost was already established before this script was run, then the initial connection is kept and you can access the upgraded project files as you would have had the connection been re-established; the terminal will indicate that a new server connection can not be established (there is no need for a new server connection).

You can then visit `http://localhost:4000` to see the application running.

The video below shows how `./upgrade.sh` runs; we demo a change being made to the project (in the development environment) and how this change is reflected in the files in the temp folder once the script is called. All necessary components that are needed to run the project were already installed on the device this script was demoed on in the video; the video reflects this in the terminal. If these components were not already installed, the script would go through the process of installing all of them.
The video below also shows the execution of `./upgrade.sh` such that the connection to the localhost is still running when the script is executed; the terminal indicates that a new connection can not be established, but this does not impact the project files being upgraded and your ability to run the upgraded project files without restarting the connection.


[![Upgrade Script](https://img.youtube.com/vi/9ctGmzYPMAY/0.jpg)](https://youtu.be/9ctGmzYPMAY "Upgrade Script Running")



## Testing
### Helper Script
**A helper `./tests.sh` script is provided to run the PHPUnit tests automatically for you. This script requires that you first initiate the server connection to the localhost from the project directory in which you are running these tests; it is recommended that you run the tests from the development environment.**

To run the helper script:
* Change the directory to the project-snm repository (the development environment), wherever you have it saved on your device.
* Initiate the server on the localhost (this can be done using the `./server.sh` script).
* Run the helper script, `./tests.sh`.

The script will then check that you have all necessary components installed using `./setup.sh` before running the tests. 

The video below shows the helper script successfully running. 

[![Tests Script](https://img.youtube.com/vi/F6BOB-6pHig/0.jpg)](https://youtu.be/F6BOB-6pHig "Tests Script Running")


### Manually Running the Tests
#### Running the PHPUnit Tests
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
"Guess It" is a word-guessing game in which you must guess an English word. If you guess a word that is alphabetically before the one you're supposed to guess, a green arrow will point up; if it comes after, a purple arrow will point down. Keep guessing until you "Guess It!"

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
A video demo of our project **(this video has audio)**:

[![Demo](https://img.youtube.com/vi/dW0wHRrURuY/0.jpg)](https://youtu.be/dW0wHRrURuY "Guess It Demo")

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
