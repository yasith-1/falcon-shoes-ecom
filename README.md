# 🦅 Falcon Shoes — PHP E-Commerce Learning Project

> A partially complete, hands-on PHP e-commerce project built to explore the real-world behaviour of **PHP**, **JavaScript**, **DOM manipulation**, **cookies**, and **session management** — all wired together in a functional online shoe store.

---

## 📌 Project Overview

**Falcon Shoes** is a full-stack PHP web application that simulates a real shoe e-commerce platform. While the project is still in active development, it already covers the complete lifecycle of a web request — from a user browsing products and adding items to a cart, through session-based authentication, cookie persistence, dynamic DOM updates via JavaScript, all the way to checkout and order history.

The project is primarily a **learning vehicle**: every feature is intentionally built using native PHP and Vanilla JS (no heavy frameworks) so that the interaction between server-side PHP and client-side browser behaviour remains transparent and easy to study.

---

## 🎯 Learning Objectives

This project was built to understand and demonstrate:

| Concept | What Is Explored |
|---|---|
| **PHP Core** | Superglobals (`$_GET`, `$_POST`, `$_FILES`), form handling, server-side validation, includes, and file I/O |
| **JavaScript & DOM** | Async fetch calls to PHP endpoints, real-time DOM updates without page reload, event listeners, dynamic rendering of products and cart items |
| **Cookies** | Setting and reading cookies from PHP (`setcookie()`) and JavaScript (`document.cookie`), cookie-based preference persistence (e.g. theme) |
| **Session Management** | `session_start()`, `$_SESSION` for user login state, cart state, and admin access control; `PHPSESSID` lifecycle and session destruction on logout |
| **AJAX / PHP Integration** | JavaScript `fetch()` communicating with dedicated PHP process files, JSON responses, and updating the UI based on server state |
| **Email (PHPMailer)** | Sending transactional emails (password reset, contact form) using PHPMailer with SMTP |

---

## 🏗️ Project Structure Highlights

```
falcon-shoes-ecom/
│
├── index.php / home.php          # Landing page & homepage
├── singleProductView.php         # Individual product detail page
├── cart.php                      # Shopping cart
├── orderHistory.php              # User order history
├── userProfile.php               # User profile management
│
├── adminDashboard.php            # Admin panel home
├── adminProduct.php              # Product management
├── adminStock.php                # Stock management
├── adminUser.php                 # User management
├── adminReport.php               # Sales reports with charts
│
├── *Process.php files            # All server-side logic handlers (AJAX endpoints)
│   ├── signinProcess.php         #   → Session creation on login
│   ├── signOutProcess.php        #   → Session destruction on logout
│   ├── addtoCartProcess.php      #   → Cart manipulation via session
│   ├── checkoutProcess.php       #   → Order placement
│   ├── forgotPasswordProcess.php #   → Email-based password reset
│   └── ...and more
│
├── includes/
│   ├── db.php                    # Database connection
│   └── session.php               # Session bootstrapping & access guards
│
├── connection.php                # MySQL connection setup
├── app.js / script.js            # Client-side JS — fetch calls & DOM updates
├── countdown.js                  # JS countdown timer
│
├── PHPMailer.php / SMTP.php      # Email library
└── resources/                    # Images, product photos, profile photos, videos
```

---

## ⚙️ Key Features

### 👤 User Side
- User registration, login, and logout with **PHP session management**
- Profile image upload and deletion
- Browse products by category, brand, colour, and size
- Advanced product search with live DOM updates
- Add to cart, update quantity, remove items — all via **AJAX + PHP**
- Checkout with payment options (COD, card)
- Order history and printable invoice
- Forgot password with **email reset link** (PHPMailer)
- Contact form with email notification

### 🛠️ Admin Side
- Secure admin login with separate session scope
- Product registration (with image upload), stock management
- User management (status toggling, search by name/email)
- Sales reports with **Chart.js** graphs powered by PHP data endpoints
- Product and stock reports

### 🍪 Cookies & Sessions in Action
- Login state stored in `$_SESSION` — observe it being created and destroyed
- Cart item count persisted across pages via session
- Admin vs. user access control enforced through session guards in `includes/session.php`
- Cookie usage visible in browser DevTools → Application → Cookies

---

## 🧰 Tech Stack

| Layer | Technology |
|---|---|
| Server Language | PHP 8.x |
| Database | MySQL |
| Client Scripting | Vanilla JavaScript (ES6+) |
| Styling | Bootstrap 5 + Custom CSS |
| Email | PHPMailer (SMTP) |
| Charts | Chart.js (fed by PHP JSON endpoints) |
| Server | Apache (XAMPP / WAMP / Laragon) |

---

## 🚀 Getting Started

### Prerequisites
- XAMPP, WAMP, or Laragon (Apache + PHP + MySQL)
- PHP 8.0 or higher

### Setup
```bash
# 1. Clone or copy the project into your server root
cp -r falcon-shoes-ecom/ /xampp/htdocs/falcon-shoes-ecom/

# 2. Import the database
# Open phpMyAdmin → create a new database → import the provided .sql file

# 3. Update DB credentials
# Edit connection.php and includes/db.php with your MySQL host/user/password/dbname

# 4. Visit in browser
http://localhost/falcon-shoes-ecom/index.php
```

### Admin Access
Navigate to `adminSignin.php` and use your seeded admin credentials.

---

## 📚 PHP + JS Interaction Pattern Used

Every dynamic action in this project follows this pattern:

```
[User Action in Browser]
        ↓
[JavaScript fetch() call]
        ↓
[PHP *Process.php endpoint]
   → Reads/writes $_SESSION
   → Reads/writes cookies
   → Queries MySQL
   → Returns JSON
        ↓
[JavaScript parses JSON response]
        ↓
[DOM updated without page reload]
```

This pattern is visible in: cart operations, product loading, user search, chart data, cart count badge, and more.

---

## 🔭 Status

> ⚠️ **Partially Complete** — core e-commerce flows work end-to-end. Some features (e.g. payment gateway integration, full report exports) are still under development.

---

## 🙏 Acknowledgements

- [PHPMailer](https://github.com/PHPMailer/PHPMailer) — for SMTP email
- [Bootstrap 5](https://getbootstrap.com/) — for responsive UI components
- [Chart.js](https://www.chartjs.org/) — for admin analytics charts
