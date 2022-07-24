This is just Pricing rules Proof Of Concept

Steps after Cloning or download the project from github

1.Go to the folder application using "cd" command on your cmd or terminal

2.Copy .env.example file to .env on the root folder. You can type copy .env.example .env if using command prompt Windows or cp .env.example .env if using terminal,   Ubuntu

3.Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration. (I'm using MYSQL for this project)

4.Run php artisan key:generate (if warning is showed that failed opening required ...autoload.php, kindly run this command "composer update --no-scripts")

5.Run php artisan migrate

6.Run php artisan db:seed

7.Run php artisan serve


To make sure if you db connection is connected you can go to this URL: "http://127.0.0.1:8000/test", it will show "Successfully Connected to DB"

Since this is just proof of concept I've just use the incremental ID from laravel as below.


![image](https://user-images.githubusercontent.com/68442862/180648822-e79dcde1-49cb-4517-8230-53dd793b1789.png)


The Pricing Rule table will be storing the discount when the requirement was fulfilled. 

Since there will have two situations like Buy 1 Free 1 and price drop to certain amount when more the quantity more than certain value, the field Type will differenciate this two situation (Bundle or None).

Bundle meaning is used when situation for example (Buy 1 Free 1) only the certain discount will applied when the numbers is able to divide by the minimum quantity (remainder will use the normal price)
None meaning is used when situation like Roti Kosong will drop to certain amount when the quantity is more than or equals the minimum quantity

I'm using REST CLIENT in Visual studio to do the POST Request in Visual studio (you can refer to route.rest in the project). If you are trying to use POSTMAN or other application you can refer the json content inside it. 
