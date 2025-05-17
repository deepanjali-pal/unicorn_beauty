# unicorn_beauty

## How to Start and Run the Project

### Prerequisites
- PHP (with mysqli extension)
- MySQL server
- Web browser

### 1. Clone or Download the Repository
```
git clone <repo-url>
cd unicorn_beauty
```

### 2. Set Up the Database
- Make sure MySQL is running.
- Import the database schema:
```
mysql -u root -p < setup_database.sql
```
- (Change `root` to your MySQL username if different.)

### 3. Start the PHP Built-in Server
```
php -S localhost:8000
```

### 4. Open the App in Your Browser
Go to:
```
http://localhost:8000/index.html
```
Or directly to the booking page:
```
http://localhost:8000/booking.html
```

### 5. Booking Form
- Fill out the booking form on `booking.html`.
- On submission, you will see a success or error message.

### 6. Project Structure
- `index.html` - Home page
- `booking.html` - Booking form
- `index.php` - Handles booking form submission
- `style.css` - Styles
- `setup_database.sql` - Database schema
- Other HTML files for About, Feedback, Services, etc.

---
**Note:**
- Do not use VS Code Live Server for PHP files. Use the PHP built-in server as shown above.
- Make sure your MySQL credentials in `index.php` match your local setup.