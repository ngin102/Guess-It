import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.io.PrintWriter;
import java.lang.*;

public class file_creator {
	public static void main(String[] args) {
        try {
            // replace path with path to word list
            BufferedReader br = new BufferedReader(new FileReader("/Users/nicholasgin/Desktop/project-snm/db/wordlist_leaderboard.txt"));
            PrintWriter writer = new PrintWriter("./db_wordlist_leaderboard.txt", "UTF-8");
        
            // read until end of file
            String line;
            int num = 0; //change num to 1 for leaderboard
            int guess = 1;
            int month = 3;
            int day = 1;
            while ((line = br.readLine()) != null) {
                //without date column
                //writer.println("(" + num + ", '" + line + "'),");
                //with date column
                //writer.println("(" + num + ", '" + line + "', NULL),");

                //for leaderboard

                writer.println("(" + num + ", '" + line + "', " + guess + ", '2022-" + String.format("%02d", month) + "-" + String.format("%02d", day) + "'),");
                
                if (num % 4 == 0){
                    day++;
                }

                if (month == 4 && day == 30){
                    month++;
                    day = 1;
                }

                if (day == 31){
                    month++;
                    day = 1;
                }

                if (guess == 10){
                    guess = 1;
                }
                else {
                    guess++;
                }

                num++;
            }
            writer.close();
            // close the reader
            br.close();
                
        } catch (IOException ex) {
            ex.printStackTrace();
        }
    }
}