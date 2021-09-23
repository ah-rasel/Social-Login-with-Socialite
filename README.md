
# Test Project
This is the test project for login system in laravel (frontend + backend). I have tried my best to get the frontend login page as close as i can.
I have just worked on the login page to make it more like what was given to me and I have configured social login for Google and Facebook . All the other pages/routes , such as Register page, forget password page are by default from laravel jetstream .

## Installation Steps

### Clone the repo

> composer install

> copy .env.example .env

> php artisan key:generate

> npm install && npm run dev

> php artisan migrate:fresh

## For Social Login
> you need to configure the "CLIENT_ID" and "CLIENT_SECRET" for google