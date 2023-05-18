:db_name = db_clinic_api
:user = root 

// First Create Database in Mysql

// Download The Repository 
-Change .env.example to .env 
-In .env (change DB_DATABASE=laravel to db_clinic_api)
// In Editor / Terminal 
- Please Write   	(1) Composer Install
			(2) php artisan key:generate
			(2) php artisan migrate
			(3) php artisan db:seed
			(4) php artisan serve

// In Postman Import my Collection API to test the API (need to install Postman's Desktop Agent)

			    //-------------//
				--Reminder -- 
// input Breed and Status values in integer (Relationships Between 3 tables for more purposes)
// If You want to create new breed and status, you can also create in DatabaseSeeder .


// Thanks For Your Attentions //