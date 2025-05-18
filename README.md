# Unicorn Beauty

## 🚀 How to Run This Project (Step-by-Step)

### 1. Prerequisites
- **PHP** (with mysqli extension)
- **MySQL** (database server)
- **Web browser** (like Chrome, Firefox, Edge)

### 2. Download or Clone the Project
```
git clone <repo-url>
cd unicorn_beauty
```
Or just download and unzip the project folder.

### 3. Set Up the Database
- Make sure MySQL is running.
- Open a terminal in the project folder.
- Run this command to create the database and tables:
```
mysql -u root -p < setup_database.sql
```
- (If your MySQL username is not `root`, change it accordingly.)

### 4. Start the PHP Server
- In the project folder, run:
```
php -S localhost:8000
```
- Leave this terminal window open while you use the site.

### 5. Open the Website
- In your browser, go to:
```
http://localhost:8000/index.html
```
- For booking: `http://localhost:8000/booking.html`
- For feedback: `http://localhost:8000/feedback.html`

### 6. Use the Forms
- **Booking:** Fill out the booking form and submit. You'll see a success or error message.
- **Feedback:** Fill out the feedback form and submit. You'll see a thank you message.

### 7. Where is the Data?
- All bookings go into the `booking_ub` table in your MySQL database.
- All feedback goes into the `feedback_ub` table.

---
**Tips:**
- Don't use VS Code Live Server for PHP files. Always use the PHP built-in server as shown above.
- If you change your MySQL username or password, update it in `index.php` and `feedback.php`.
- If you have any issues, make sure MySQL and PHP are installed and running.

---
**Project Structure:**
- `index.html` - Home page
- `booking.html` - Booking form
- `feedback.html` - Feedback form
- `index.php` - Handles booking form submission
- `feedback.php` - Handles feedback form submission
- `style.css` - All styles
- `setup_database.sql` - Database schema
- Other HTML files for About, Services, etc.

Enjoy your Unicorn Beauty website! 🦄💅