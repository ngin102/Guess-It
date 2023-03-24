# project-snm
**This is an archived version of our README for Deliverable 2. Some links may no longer work.**

## Team members
* Samuel Brie 	---     7660408    ---  sbrie013@uottawa.ca

* Nicholas Gin  ---    300107597   ---  ngin102@uottawa.ca

* Marija Bolic  ---    300118922   ---  mboli027@uottawa.ca

## Deliverable 2

### The document containing everything (UI Design System)
#### [Document](app/Deliverable_2.docx)

### The start of our game
#### [Mainpage](app/mainpage.html)

### Icons
#### [Icons](app/icons)

### CSS
#### [CSS](app/CSS)
		
## Project Description
Our project is a game called “Guess It,” that is similar in scope to “Wordle” (an example shown in class).

“Guess It” is a game where you need to guess an English word. While you make guesses, the website will tell you whether the word is alphabetically before or after the word you guessed. “Guess It” has multiple modes for players to choose from.

### Modes
#### Regular Mode
There will be a regular mode (the main version of the game). In this mode, the player will try to guess the “Word-of-the-day” within an unlimited amount of guesses (every person who plays the game on that day will have to guess the same word). Upon correctly guessing the “Word-of-the-day,” the player can enter a leaderboard where their name and the number of guesses they took to correctly guess the “Word-of-the-day” are displayed publicly. There will be a separate leaderboard for each day (every “Word-of-the-day” will have its own leaderboard).
	
#### Random Mode
This is a non-competitive, practice mode of the game; there is no leaderboard for this mode. Instead of guessing a “Word-of-the-day,” players of this mode will be given a randomly-generated word that they will have to guess. Since there is no “Word-of-the-day,” this mode can be played an unlimited number of times within a day; each time this mode is played, a new word will be randomly generated for the player to guess.

#### Random Mode (Timer Version)
This is the same as “Random Mode,” but with a constraint so that there is only a limited amount of time to guess the randomly-generated word. We can have 3 levels of easy, medium and hard and a custom set time. If the amount of time given to guess the word is exceeded, the word will be revealed to the player.

#### Celebrity Mode
This is the same as “Random Mode,” but instead of guessing a word from the English dictionary, the player guesses a celebrity’s name. 

#### Educational Mode
See "Celebrity Mode," but instead of guessing celebrity names, the player guesses “science” words.

#### Number Mode
See "Celebrity Mode," but instead of guessing a celebrity’s name, the player guesses a number. Why struggle when you can easily win?

#### Leaderboard
There will be a leaderboard to compare scores for the regular mode with other players.

#### Hint
Within any mode, if the game is too difficult and you need a little help, a visual/description or even some letters can be given to the user as a hint.

#### Definition of guessed word
When the word is correctly guessed, a definition of the word is shown to help expand the player's vocabulary. 

#### Possible implementations
These are modes we are not currently prioritizing, but are possible implementations: multi-language, hardmode, different numbers of tries.

#### Disclaimer: We have a lot of modes and it may become very difficult to implement all of them. This description may change as the semester goes. 
