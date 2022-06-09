# Welcome To Jumia Application
## _JUMIA_

[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://github.com/Ramadona1001/JumiaTask)

Task Description 
Jumia wants to build a fleet-management system (bus-booking system) Having:
1- Egypt cities as stations [Cairo, Giza, AlFayyum, AlMinya, Asyut...] 
2- Predefined trips between 2 stations that cross over in-between stations. 
ex: Cairo to Asyut trip that crosses over AlFayyum -firstly- then AlMinya. 
3- Bus for each trip, each bus has 12 available seats to be booked by users, each seat has an 
unique id. 
4- Users can book an available trip seat. 
 
For example we have Cairo-Asyut trip that crosses over AlFayyum -firstly- then AlMinya: 
any user can book a seat for any of these criteria 
(Cairo to AlFayyum), (Cairo to AlMinya), (Cairo to Asyut), 
(AlFayyum to AlMinya), (AlFayyum to Asyut) or  
(AlMinya to Asyut)  
if there is an available seat, taking into consideration if the bus is full from Cairo to 
AlMinya, the user cannot book any seat from AlFayyum but he can book from AlMinya. 
 
We require the following: 
Implement a solution for this case using a Relational-Database and Laravel web app that 
provides 2 APIs for any consumer(ex: web app, mobile app,...) 
● User can book a seat if there is an available seat. 
● User can get a list of available seats to be booked for his trip by sending start and end 
stations. 

## How To Install
```sh
- Rename .env.example to .env
- Make Database with name jumia_db .
- Change Database name in .env file with ads_app ,change username & password of database
- Run Command php artisan install:jumia
- Upload JumiaCollection
```

## Tech

- Laravel ^8.75
- PHP ^7.3|^8.0
- It using HMVC (Modules) in app folder
- Each Folder of HMVC contains (Controllers,Repository,Resources,Routes,Database)
