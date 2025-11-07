# itws2110-websys-g10-lab07
WebSys Section 2 Group 10 Lab 7

# Steps to install database
1. Locate `lab7.sql`
2. Open the SQL client
   - `sudo mariadb`
3. Create the new database
   - In mariadb: `CREATE DATABASE lab7;`
4. Exit the client
   - In mariadb: `exit`
5. Import the tables from `lab7.sql`
   - `sudo mariadb -p lab7 < /path/to/lab7.sql`
   - Replacing `/path/to/` with either `./` or the full filepath
6. Done!

# Credits
Blackboard/LMS: blackboard_logo_white.png and favicon.png