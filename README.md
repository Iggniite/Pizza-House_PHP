# 🍕 Pizza House - PHP & MySQL Based Online Pizza Ordering System

This is a simple yet complete online pizza ordering web application built using **core PHP**, **MySQL**, and **Bootstrap**. It includes features like a menu page, shopping cart, checkout process, user login/register system, and an admin panel to manage orders and menu items. It’s an ideal project for beginners who want to understand how dynamic web apps work using PHP and MySQL.

---

## ✅ Key Features

- Browse pizza menu with images and prices
- User registration and login/logout system
- Admin panel to manage pizzas and view all orders
- Responsive layout using Bootstrap 4/5
- Basic session management with PHP
- Secure password hashing for user accounts

---

## 🧰 Technologies Used

- **Frontend**: HTML5, CSS3, Bootstrap, JavaScript
- **Backend**: PHP (procedural), MySQL (with MySQLi)
- **Database**: MySQL (phpMyAdmin / XAMPP)
- **Server**: Local Apache server via XAMPP or WAMP

---

## 💻 How to Set Up and Run on Localhost (Step-by-Step)

### 1. Clone the Repository

```bash
git clone https://github.com/Iggniite/Pizza-House_PHP.git
```

Or download the ZIP and extract it to your local machine.

---

### 2. Install XAMPP (or WAMP/MAMP)

- Download and install **XAMPP** from https://www.apachefriends.org
- Open the XAMPP Control Panel
- Start **Apache** and **MySQL**

---

### 3. Move Project to `htdocs` Folder

- Copy the extracted folder `Pizza-House_PHP` to:

  ```
  C:\xampp\htdocs\Pizza-House_PHP
  ```

---

### 4. Create the Database

1. Open your browser and go to:  
   `http://localhost/phpmyadmin`

2. Click **New**, and create a database called:  
   `pizza_house`

3. Click on the `pizza_house` database → Click **Import** tab

4. Upload the file `pizza_house.sql` from the project folder

5. Click **Go** to import tables

---

### 5. Configure Database Connection

Find the file `config.php` or `db.php` in the root folder (or `/includes/`) and update the credentials:

```php
$host = "localhost";
$user = "root";
$password = "";
$database = "pizza_house";
$conn = mysqli_connect($host, $user, $password, $database);
```

> ❗ Leave password blank for XAMPP default. If you're using WAMP/MAMP or have custom credentials, update accordingly.

---

### 6. Run the Project

Open your browser and navigate to:

```
http://localhost/Pizza-House_PHP/
```

You should now see the homepage with pizza listings!

---

## 🔐 Admin Panel

To access the admin panel:

```
http://localhost/Pizza-House_PHP/admin/
```

### Example Admin Credentials:

- **Username**: `admin`
- **Password**: `admin123`

> You can change these in the database manually via phpMyAdmin under the `users` or `admin` table.

---

## 🗂️ Project Folder Structure

```
Pizza-House_PHP/
│
├── index.php              → Homepage with pizza list
├── menu.php               → Pizza detail / dynamic menu
├── cart.php               → Cart view and quantity management
├── checkout.php           → Order form and submit
├── login.php              → User login
├── register.php           → User signup
├── logout.php             → Logout script
├── config.php             → Database connection
├── pizza_house.sql        → MySQL DB dump
│
├── /admin/                → Admin login and dashboard
│   ├── index.php
│   ├── dashboard.php
│   └── manage_pizza.php
│
├── /includes/             → Common header/footer/navbar
│
├── /assets/
│   ├── /img/              → Pizza images
│   ├── /css/              → Stylesheets
│   └── /js/               → Scripts
```

---

## 🧪 How the System Works (User Flow)

1. **User** lands on the homepage → views available pizzas
2. Adds pizzas to the **cart**
3. Goes to **checkout** and either registers or logs in
4. Places an order → Order gets saved to DB as "Pending"
5. **Admin** logs into dashboard and views all orders
6. Admin can update order status (e.g., Completed, Cancelled)
7. Users can later log in to view their past orders

---

## 🛠️ Troubleshooting Tips

- ❌ *"Cannot connect to MySQL"*: check DB credentials and server status
- ❌ *"404 Page Not Found"*: make sure the folder is inside `htdocs`
- 🌀 Blank pages? → Enable `display_errors = On` in `php.ini`
- 🗂 Session not working? → Ensure `session_start();` is called at the top of pages
- 🐘 Make sure PHP is installed correctly and running via XAMPP/WAMP

---

## 📄 License

This project is open-source and free to use for educational or personal purposes.  
Feel free to modify, learn from, or enhance it.

---

## 🙋‍♂️ Author
S P 
GitHub: [@Iggniite](https://github.com/Iggniite)  


---

Happy coding! 🍕👨‍💻
