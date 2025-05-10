# Taskify: Simple PHP Task Management Web Application

## Project Overview

**Taskify** is a lightweight and intuitive web-based To-Do List application designed to help users efficiently manage and track their daily tasks. This project serves as a foundational demonstration of core full-stack web development skills, showcasing the integration of client-side presentation with server-side logic and database persistence.

---

## Project Details

* **Title:** Taskify
* **Role:** Developer
* **Team Size:** 1 person
* **Duration:** 3 Days
* **Technologies Used:**
    * **Frontend:** HTML5, CSS3
    * **Backend:** PHP 7.x+
    * **Database:** MySQL
    * **Local Server Environment:** XAMPP (Apache & MySQL)

---

## Features

* **Add Tasks:** Users can easily add new tasks via a simple input form.
* **View Tasks:** All tasks are displayed in a clear, organized list, ordered by creation date (newest first).
* **Delete Tasks:** Users can remove completed or unwanted tasks with a single click (includes a confirmation prompt).
* **Modern UI:** Clean and appealing user interface inspired by modern design principles, enhancing user experience.

---

## Technical Highlights

* **CRUD Operations:** Implements fundamental Create, Read, and Delete (CRUD) operations for tasks within the MySQL database.
* **Database Interaction:** Demonstrates secure database interaction using PHP's `mysqli` extension, including prepared statements to prevent SQL injection.
* **Form Handling:** Efficient processing and validation of user input submitted via HTML forms.
* **Dynamic Content:** Renders dynamic content from the database, providing real-time updates to the task list.
* **Modular Structure:** PHP logic is separated into `index.php`, `add_task.php`, and `delete_task.php` for better organization.

---

## Database Schema

The project uses a single table named `tasks` in the `todo_app` database.

**Table: `tasks`**

| Column Name      | Data Type       | Constraints                      | Description                  |
| :--------------- | :-------------- | :------------------------------- | :--------------------------- |
| `id`             | `INT(11)`       | `PRIMARY KEY`, `AUTO_INCREMENT`  | Unique identifier for each task |
| `task_description` | `VARCHAR(255)`  | `NOT NULL`                       | The text description of the task |
| `created_at`     | `TIMESTAMP`     | `DEFAULT CURRENT_TIMESTAMP`      | Timestamp when the task was added |

You can create this table using the following SQL query in phpMyAdmin:

```sql
CREATE TABLE tasks (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    task_description VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
