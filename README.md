## Setup Instructions

import the database queue_mail 

### 1. Clone the repository

git clone https://github.com/Harikrishnanpt/QueueMail.git
cd QueueMail

2. Install dependencies

composer install

3. Configure environment variables

 update the mail credentials in .env

4. Create queue tables

Run migrations to create the required database tables for the queue:

php artisan queue:table
php artisan queue:failed-table
php artisan migrate

5. Start the  server

php artisan serve

6. Start the queue worker

In a separate terminal window, run the queue worker to process queued email jobs:

php artisan queue:work --queue=emails --tries=3

7. Test the email queue API

Send a POST request to the /send-email endpoint:

POST http://127.0.0.1:8000/api/send-email
Content-Type: application/json

Request body :

{
  "email": "",
  "subject": "",
  "message": ""
}

git config user.name "Harikrishnan pt"
git config user.email "harikrishnanpt.work@gmail.com"
