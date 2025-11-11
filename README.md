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

# SQL (maridb) commands
- All creations were done in phpMyAdmin
- Start
  - `use lab7;`
- 7:
  - `select * from students order by RIN;`
  - `select * from students order by last_name;`
  - `select * from students order by RCSID;`
  - `select * from students order by first_name;`
- 8:
  - ```
    select distinct s.RIN, s.first_name, s.last_name, s.addr_street, s.addr_city, s.addr_state, s.addr_zip
    from students as s
    inner join grades on s.RIN = grades.RIN
    where grades.grade > 90;
    ```
  - The `distinct` specifier removes duplicates from the output
- 9:
  - `select crn, AVG(grade) from grades group by crn;`
- 10:
  - `select crn, count(*) from grades group by crn;`

# Sources
### JSON
Editing a JSON file in PHP:
https://stackoverflow.com/questions/7895335/append-data-to-a-json-file-with-php

### SQL
- https://stackoverflow.com/questions/11641270/mysql-select-all-columns-where-one-column-is-distinct
- https://stackoverflow.com/questions/5446778/select-from-one-table-matching-criteria-in-another
- https://stackoverflow.com/questions/37615586/how-to-create-a-foreign-key-in-phpmyadmin

### Flexboxes
- https://www.w3schools.com/css/css3_flexbox_container.asp

### CSS
- Blackboard/LMS: blackboard_logo_white.png and favicon.png
- Cobweb Background: Unsplash
- Dancing Skeleton: https://pin.it/1Zf3SPvrc

# Group member efforts
- Carli - structured and wrote all JSON files, worked on site setup
- Sherlyn - HTML/CSS, spookified the site
- Keira - Set up basic site wireframe, flex boxes to display course material menu and content pane, prevented form resubmission under certain reload conditions
- Jacob - Created the database, tables, and all columns within. Created and associated the various foreign keys to be used to add links from one table to another. Exported the database and uploaded it to the repository. Added the answers to the SQL lookup questions in the README.md file
