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
- 9:
  - `select crn, AVG(grade) from grades group by crn;`
- 10:
  - `select crn, count(*) from grades group by crn;`

# Credits
Blackboard/LMS: blackboard_logo_white.png and favicon.png

Cobweb Background: Unsplash
