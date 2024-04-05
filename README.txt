Laravel API Project Installation Guide
This guide will walk you through the steps required to set up and install the Laravel API project locally on your machine.

Prerequisites
Before you begin, ensure you have met the following requirements:

PHP >= 7.4
Composer installed globally
MySQL or any other compatible database
Node.js & NPM (optional, only if frontend assets need to be compiled)
Installation Steps
Clone the repository:
bash
Copy code
git clone https://github.com/yourusername/your-repo.git
Save to grepper
Navigate to the project directory:
bash
Copy code
cd your-repo
Save to grepper
Install Composer dependencies:
bash
Copy code
composer install
Save to grepper
Copy the environment configuration file:
bash
Copy code
cp .env.example .env
Save to grepper
Generate application key:
bash
Copy code
php artisan key:generate
Save to grepper
Configure your environment variables:
Open the .env file and set the following variables:

dotenv
Copy code
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
Save to grepper
Run database migrations and seeders:
bash
Copy code
php artisan migrate --seed
Save to grepper
Install Passport for API authentication:
bash
Copy code
php artisan passport:install
Save to grepper
Start the development server:
bash
Copy code
php artisan serve
Save to grepper
Additional Steps (Optional)
Compiling frontend assets:
If your project includes frontend assets that need to be compiled (e.g., Vue.js, React), run the following commands:

bash
Copy code
npm install
npm run dev
Save to grepper
Testing the API:
You can now access your API endpoints at http://localhost:8000. Use tools like Postman or cURL to test your API.

Conclusion
Congratulations! You have successfully set up the Laravel API project on your local machine. If you encounter any issues during the installation process, please refer to the official Laravel documentation or open an issue on the GitHub repository for assistance.