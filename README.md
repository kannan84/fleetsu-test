# fleetsu-test

How do I run it?

After downloading the code, from the root folder of the project, run the following commands to install the php dependencies, import some data, and run a local php server.

You need at least php 5.5.9* with mysql extension enabled and Composer

composer install 

mysql telematics < database/telematics.sql


Jquery templating enabled

REST API endpoints

GET /devices

  id(Optional)

POST /devices

  label
  
  last_reported (UTC time Format YYYY-MM-DD HH:MM:SS)

POST /transactions
  
  label(Device Label)

  lat
  
  lng

  reported_at (UTC time Format YYYY-MM-DD HH:MM:SS)
  
GMaps integration to show the last reported location for the device on details page
