# Robot-Arm-Control-Panel-web-page

This project is a control panel for a 6-DOF robot arm where you can control each servo motor’s angle using sliders.  
It allows saving motor positions into a MySQL database, retrieving them later, or deleting them.

---

## 📂 Project Structure
- `index.php` — Main control interface and pose management.  
- `save_pose.php` — Saves a pose to the database.  
- `delete_pose.php` — Deletes a saved pose.  
- `get_run_pose.php` — Loads a saved pose for execution.  
- `db.php` — Database connection file.  

---

## 🛠 Requirements
- PHP (v7 or newer)  
- MySQL or MariaDB  
- Local server environment like XAMPP, WAMP, or Laragon  

---

### Designed to be extendable for sending commands to Arduino or any robot controller.
