## Setup Instructions

import the database database_backup/queue_mail

### 1. Clone the repository

git clone https://github.com/Harikrishnanpt/QueueMail.git
cd QueueMail

2. Install dependencies

composer install

3. Configure environment variables
  *create a .env file and change database details as yours
  *update the mail credentials
  *run the command   :  php artisan key:generate

4. Start the  server

php artisan serve

5. Start the queue worker

In a separate terminal window, run the queue worker to process queued email jobs:

php artisan queue:work --queue=emails --tries=3

6. Test the email queue API

Send a POST request to the /send-email endpoint:

Example:

POST http://127.0.0.1:8000/api/send-email
Content-Type: application/json

Request body :

{
  "email": "test@mail.com",
  "subject": "test",
  "message": "testing"
}

