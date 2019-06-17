# KiGa
## Quick Overview
#### Our Project
Our project trys to improve the communication between the employees of the Kindergarden and the parents. Also if you think that our website is poorly designed then please ignore the design because we are no web-stylist, because we think more functionally then stylish.

It is written in php, html and css and an MySQL Database is used.

### You will need:

- Docker & Docker-Compose
- Web Browser like Chrome


### How to use
 - Just install yourself docker-compose
 - Go into projectkiga
 - type into Terminal 'docker compose up -d'
 - go on localhost/phpmyadmin
 - drop the Database kigaDB
 - import the /projectkiga/Database/kigaDB.sql file
 - Now you are set to go. ;D

## What our website can do
 - Employee login:
    - Christine, password: wert
 - Parent login:
    - Klaus, group Blue, wert
    - Peter, group Red, same password

As an employee you can write new Messages edit them and also delete them. At writing a new one you can decide between if is public for everyone or not and then you can decide for which group this message is relevant.

Also you can register new Accounts where you can decide if it is an employee or not and if not then which group their kid is in.

 As an parent you can see the public messages and also the messages that are dedicated to their group.
