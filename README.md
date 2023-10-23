# Requirements
1. Install install latest *Composer*

Link : https://getcomposer.org/download/

2. Install latest version of *PHP*

Link : https://www.php.net/downloads.php

3. Install latest version of *XAMPP*

Link : https://www.apachefriends.org/download.html

**Note** : If you have trouble, try re-installing your programs.


# Setting Up
1. Run this line into your CLI to install the vendor dependencies
```
composer install
```

**Note** : If it doesn't work then run 

```
composer install --ignore-platform-req=ext-fileinfo
```

2. Run XAMPP and start the services: *Apache* and *MySQL* and run this line into your CLI

```
php artisan migrate
```

**Note** : Only run this line once. Skip this if you've already migrated.

3. Run this line into your CLI to start your application

```
php artisan serve
```

4. It will generate a link to http://127.0.0.1:8000/.

**Note** : You may have to click `GENERATE APP KEY` when you go to the link the first time.

5. Stop the application and run this line into your CLI to install node_modules dependencies

```
npm install
```

6. Run this to build vite.config.js

```
npm run build
```

7. Go to Step 3 to start your application and that's it!

# Collaborators
- Eleazar Biong
- Joveryn Petere Pagunsan
- Carl Jayrico Palima
