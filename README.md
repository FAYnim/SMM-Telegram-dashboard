# SMM Bot Admin Dashboard

![Version](https://img.shields.io/badge/version-1.0-blue.svg)
![PHP](https://img.shields.io/badge/PHP-7.4+-777BB4.svg?logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-Supported-4479A1.svg?logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3.svg?logo=bootstrap&logoColor=white)

A comprehensive web-based Admin Dashboard for managing the SMM/PTC Telegram Bot. Designed to replace manual Telegram callback button operations with a centralized, visual, and efficient management interface. 

## 🚀 Features

- **📊 Dashboard Overview:** Get a complete overview with KPI cards, charts (User Registration Trends, Transaction Volume), and recent activities.
- **👥 User Management:** Full CRUD operations for users, including suspend/activate and detailed profile views (wallet info, social accounts, campaigns).
- **🛡️ Admin Management:** Manage admin access with granular permissions (Super Admin, Task Verify, Deposit Verify, etc.).
- **💰 Financial Management:** Approve or reject deposits and withdrawals with automated wallet balance updates and Telegram notifications.
- **📢 Campaign & Task Verification:** Verify new campaigns, manage task proofs, and oversee project progress effortlessly.
- **⚙️ Settings Management:** Centralized settings for Payment Methods, Withdrawal limits, Campaign pricing, and Referral rewards.
- **🔍 Audit Trail:** Super admins can track all admin actions with a comprehensive and filterable audit log.

## 🛠️ Tech Stack

### Backend
- **Core:** PHP 7.4+ (Native, No Framework)
- **Database:** MySQL / MariaDB (Shared with the Telegram bot)

### Frontend
- **Languages:** HTML5, CSS3, Vanilla JavaScript
- **UI Framework:** Bootstrap 5.3
- **Data Visualization:** Chart.js 4.x
- **Icons:** Font Awesome 6.x / Bootstrap Icons

## 📁 Project Structure

```text
dashboard/
├── index.php              # Entry point -> Redirects to login/dashboard
├── config/                # Dashboard-specific configuration
├── data/                  # Data directories (e.g. proof images, logs)
├── src/                   
│   ├── api/               # API Endpoints (Auth, Users, Deposits, Campaigns, etc.)
│   ├── css/               # Custom stylesheets
│   ├── include/           # Reusable components (Header, Sidebar, Footer, Auth)
│   └── js/                # Frontend JavaScript (Main, Charts, DataTables)
├── login.php              # Admin Login
├── home.php               # Dashboard Overview
├── users.php              # User Management
├── campaigns.php          # Campaign Management
├── tasks.php              # Task Verification
├── deposits.php           # Deposit Verification
├── withdrawals.php        # Withdrawal Processing
├── settings.php           # General Settings
└── audit-log.php          # Audit Logs (Super Admin only)
```

## ⚙️ Prerequisites

- PHP 7.4 or higher
- MySQL / MariaDB server
- Web Server (Apache HTTP Server or NGINX)
- Existing SMM Telegram Bot database structure

## 🚀 Installation & Setup

1. **Clone or Extract the Dashboard Source Code:**
   Place the project files in an independent directory defined by a specific subdomain (e.g., `admin.yourdomain.com`).

2. **Database Configuration:**
   - The dashboard relies on the same database as your Telegram bot.
   - Run the provided `dashboard-schema.sql` (if any dashboard-specific tables are missing, such as `smm_admin_sessions` and admin passwords).
   - Ensure your database credentials are correctly set up in the configuration files (usually inherited from `../config/db-config.php`).

3. **Web Server Setup (Apache/Nginx):**
   - Point your Virtual Host document root to the unzipped `dashboard/` folder.
   - Ensure the server supports `.htaccess` or configure equivalent URL rewriting rules in Nginx.

4. **Initial Login:**
   - Admin access is restricted to accounts existing within the `smm_admins` table.
   - For first-time setup, ensure at least one active admin account is properly initialized with a password (via script, SQL insertion, or initial login flow).

## 🔒 Security Measures

- **Authentication:** Passwords securely hashed using `bcrypt` (`password_hash()`).
- **Authorization:** Role-based access control checking `isAdmin()` and granular permissions per endpoint/page.
- **Attack Prevention:** 
  - Implementation of CSRF tokens.
  - Prepared statements used for robust SQL injection prevention.
  - Rate limiting enforced on login attempts.
- **Headers:** Strict security headers implemented (Nosniff, X-Frame-Options DENY, XSS Protection).

## 🔄 Telegram Integration

The dashboard seamlessly integrates with your existing `TelegramBot.php` to dispatch notifications to users during specific admin events:
- Approved/Rejected Deposits and Withdrawals.
- Approved/Rejected Tasks and Campaigns.
- Account Suspensions.