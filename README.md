
## Run Locally

1. Clone the Laravel/Vue backend project from GitHub.
```bash
  git clone https://github.com/Makie2020/todoList-app.git
```

2. Go to the project directory
```bash
  cd todoList-app
```
3. Run npm install composer to install Composer.
```bash
  npm install composer
```

4. Install dependencies
```bash
   run composer install
```
5. Make a copy of the .env.template file change the name to .env and then configure the .env.template file with your database settings 

6. Run php artisan migrate:fresh --seed to migrate and seed the database
```bash
   php artisan migrate:fresh --seed
```

7. Start the server
```bash
  php artisan serve
```

8. Navigate to the project directory and run npm install to install dependencies.
```bash
   npm install 
```
9. Start the VUE server
```bash
  npm run dev
```
10. Access the application in your browser at http://localhost:8000.

11. If it shows an error with App Key click the button the generate a APP Key. 
