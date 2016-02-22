# GUBotDev Website

This is the code that makes the GUBotDev website fly or crash. We typically need to rebuild due to such scenarios. This site is built upon the Laravel Framework, as Laravel is a great option for web applications that may grow in the future, such that scalibility is a breeze. 


## Running
Deploying our site from source can take some time to configure properly. You'll want to follow the following to make sure you're on the right track... Also, we suggest using Laravel Homestead for fast development and more!

If you are not using Homestead, you will need to make sure your server meets the following requirements:
- PHP >= 5.5.9
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension

Also, you will want to make sure you have [Composer](http://getcomposer.org) installed so that you can manage PHP dependencies. So, before using Laravel, make sure you have Composer installed on your machine.

Then you will want to find where you want to store the site, and then `git clone https://github.com/GUBotDev/gubotdev.com.git` from your terminal. Once it is downloaded, you will want to run `composer install` (from within the gubotdev.com folder - unless you named it otherwise) to make sure that all of the PHP dependencies are pulled in. Then, you will want to edit your .env file with settings that match your expectations. Next, make sure that you run `php artisan migrate` and then `php artisan seed` in order to run the database migrations and also to seed the database with data.

That's pretty much it (for now).