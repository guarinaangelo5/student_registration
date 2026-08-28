# Student Registration System

## ITST 302 – Client-Server Technologies

### Week 4 Laboratory Activity – Mini Project 03

**Project:** Student Registration System
**Framework:** Laravel 13
**Language:** PHP 8.5
**Database:** MySQL
**Frontend:** Blade Templates + Bootstrap 5
**Storage:** Laravel Storage
**Repository:** `student_registration`

---

## 1. Introduction

The **Student Registration System** is a web-based application developed using Laravel for the Week 4 Laboratory Activity in **ITST 302 – Client-Server Technologies**.

The system allows users to register students by entering important personal and academic information such as Student ID, name, email address, mobile number, date of birth, gender, program, year level, address, and profile picture.

The application demonstrates how Laravel handles client requests, validates user input, stores information in a MySQL database, processes uploaded files, and displays registered student information.

Data validation is important because it prevents incomplete, invalid, or duplicate information from being stored in the database. In real-world enterprise applications, registration systems are commonly used by universities, companies, hospitals, banks, government agencies, and other organizations.

---

## 2. Objectives

This project aims to:

* Develop HTML forms using Laravel Blade.
* Process client requests using Laravel controllers.
* Implement server-side validation.
* Display validation error messages.
* Display success flash messages.
* Upload and store student profile pictures.
* Store student information in a MySQL database.
* Display registered student information.
* Implement student editing functionality.
* Understand the Laravel request lifecycle.
* Practice Git and GitHub version control.
* Document the software development process.

---

## 3. System Features

The Student Registration System includes the following features:

### Student Registration

Users can register a new student by providing:

* Student ID
* First Name
* Middle Name
* Last Name
* Email Address
* Mobile Number
* Date of Birth
* Gender
* Program
* Year Level
* Address
* Profile Picture

### Form Validation

The system validates submitted information before saving it to the database.

Validation includes:

* Required fields
* Unique Student ID
* Unique email address
* Valid email format
* Numeric mobile number
* Valid date of birth
* Required gender
* Required program
* Required year level
* Required address
* Image file validation
* Maximum profile picture file size

### Profile Picture Upload

Students can upload a profile picture during registration.

Uploaded images are stored using Laravel Storage in:

```text
storage/app/public/profile-pictures
```

A symbolic link is created using:

```bash
php artisan storage:link
```

The database stores only the path of the uploaded image.

### Student Profile

After registration, the system displays the student's information and uploaded profile picture.

### Edit Student

Users can edit student information and update the student's profile picture.

### Flash Messages

The application displays success notifications after successful operations.

Example:

```text
Student registered successfully!
```

---

## 4. Technologies Used

| Technology      | Purpose                    |
| --------------- | -------------------------- |
| Laravel 13      | Backend framework          |
| PHP 8.5         | Programming language       |
| MySQL           | Database                   |
| Blade           | Template engine            |
| Bootstrap 5.3   | User interface             |
| Laravel Storage | File management            |
| Git             | Version control            |
| GitHub          | Source code repository     |
| VS Code         | Development environment    |
| XAMPP/MySQL     | Local database environment |

---

## 5. Laravel Request Lifecycle

The registration process follows the Laravel request lifecycle:

```text
+----------------------+
|       Browser        |
|  Registration Form   |
+----------+-----------+
           |
           v
+----------------------+
|        Route         |
| POST /students       |
+----------+-----------+
           |
           v
+----------------------+
|     Controller       |
| StudentController    |
+----------+-----------+
           |
           v
+----------------------+
|      Validation      |
| Required / Unique /  |
| Email / Image Rules  |
+----------+-----------+
           |
      +----+----+
      |         |
    Valid     Invalid
      |         |
      v         v
+-----------+  +----------------+
|   Model   |  | Display Errors |
|  Student  |  | to the User    |
+-----+-----+  +----------------+
      |
      v
+----------------------+
|       MySQL          |
|   Students Table     |
+----------+-----------+
           |
           v
+----------------------+
|    Laravel Storage   |
|   Profile Picture    |
+----------+-----------+
           |
           v
+----------------------+
|    Student Profile   |
|   Success Message    |
+----------------------+
```

---

## 6. Validation Rules

The system uses Laravel server-side validation.

Example validation rules:

```php
$request->validate([
    'student_id' => 'required|unique:students,student_id',
    'first_name' => 'required|string|max:100',
    'middle_name' => 'nullable|string|max:100',
    'last_name' => 'required|string|max:100',
    'email' => 'required|email|unique:students,email',
    'mobile_number' => 'required|numeric',
    'date_of_birth' => 'required|date',
    'gender' => 'required',
    'program' => 'required|string|max:255',
    'year_level' => 'required',
    'address' => 'required|string',
    'profile_picture' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
]);
```

### Importance of the Validation Rules

**Required fields**

Required validation prevents incomplete student records.

**Unique Student ID**

The Student ID must be unique to prevent duplicate student records.

**Unique Email**

Email addresses must be unique so that the same email cannot be registered multiple times.

**Email Validation**

The email rule checks whether the submitted value follows a valid email format.

**Numeric Validation**

The mobile number must contain numeric values.

**Image Validation**

The profile picture must be an actual image file and must use an accepted image format.

**File Size Restriction**

The maximum file size is limited to 2MB to prevent unnecessarily large uploads.

---

## 7. File Upload

The application uses Laravel Storage for profile picture management.

The uploaded file is stored in:

```text
storage/app/public/profile-pictures
```

The symbolic link between the public directory and storage directory is created using:

```bash
php artisan storage:link
```

The database stores the file path instead of storing the actual image file.

Example:

```text
profile-pictures/example-image.jpg
```

The uploaded image can then be displayed using Laravel's public storage path.

---

## 8. Database Design

The application uses a MySQL database containing a `students` table.

### Students Table

| Column          | Data Type | Description               |
| --------------- | --------- | ------------------------- |
| id              | BIGINT    | Primary key               |
| student_id      | VARCHAR   | Unique student identifier |
| first_name      | VARCHAR   | Student first name        |
| middle_name     | VARCHAR   | Student middle name       |
| last_name       | VARCHAR   | Student last name         |
| email           | VARCHAR   | Student email             |
| mobile_number   | VARCHAR   | Student mobile number     |
| date_of_birth   | DATE      | Student date of birth     |
| gender          | VARCHAR   | Student gender            |
| program         | VARCHAR   | Student academic program  |
| year_level      | VARCHAR   | Student year level        |
| address         | TEXT      | Student address           |
| profile_picture | VARCHAR   | Uploaded image path       |
| created_at      | TIMESTAMP | Record creation date      |
| updated_at      | TIMESTAMP | Record update date        |

### Primary Key

The `id` column is the primary key of the `students` table.

### Constraints

The database uses constraints such as:

* Primary key for `id`
* Unique constraint for `student_id`
* Unique constraint for `email`
* Required fields for important student information

---

## 9. Entity Relationship Diagram

The system contains a `students` entity that stores student registration information.

The ER Diagram will be included in:

```text
documentation/ERD.png
```

Basic structure:

```text
+-----------------------------+
|          STUDENTS           |
+-----------------------------+
| PK id                       |
|    student_id (UNIQUE)      |
|    first_name               |
|    middle_name              |
|    last_name                |
|    email (UNIQUE)           |
|    mobile_number             |
|    date_of_birth            |
|    gender                   |
|    program                  |
|    year_level               |
|    address                  |
|    profile_picture          |
|    created_at               |
|    updated_at               |
+-----------------------------+
```

---

## 10. Registration Flowchart

The registration process follows this flow:

```text
+----------------------------+
| User Opens Registration    |
| Page                       |
+-------------+--------------+
              |
              v
+----------------------------+
| Fill Out Student Form      |
+-------------+--------------+
              |
              v
+----------------------------+
| Submit Registration Form   |
+-------------+--------------+
              |
              v
+----------------------------+
| Laravel Validation         |
+-------------+--------------+
              |
              v
       +------+------+
       | Valid Data? |
       +------+------+
          |       |
        YES       NO
          |       |
          v       v
+-------------+  +----------------+
| Upload      |  | Display        |
| Profile     |  | Validation     |
| Picture     |  | Errors         |
+------+------+  +----------------+
       |
       v
+-------------+
| Save Student|
| to Database |
+------+------+
       |
       v
+-------------+
| Flash       |
| Success     |
| Message     |
+------+------+
       |
       v
+-------------+
| Student     |
| Profile     |
+-------------+
```

The completed flowchart will be saved in:

```text
documentation/Registration-Flowchart.png
```

---

## 11. Project Structure

The main Laravel project structure is:

```text
week04-student-registration/
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── StudentController.php
│   │
│   └── Models/
│       └── Student.php
│
├── database/
│   └── migrations/
│       ├── create_students_table.php
│       ├── add_profile_picture_to_students_table.php
│       └── add_required_fields_to_students_table.php
│
├── documentation/
│   ├── ERD.png
│   ├── Registration-Flowchart.png
│   └── Laravel-Request-Lifecycle.png
│
├── resources/
│   └── views/
│       └── students/
│           ├── create.blade.php
│           ├── edit.blade.php
│           ├── index.blade.php
│           ├── profile.blade.php
│           └── show.blade.php
│
├── routes/
│   └── web.php
│
├── screenshots/
│
├── storage/
│   └── app/
│       └── public/
│           └── profile-pictures/
│
├── .env.example
├── composer.json
├── package.json
└── README.md
```

---

## 12. Routes

The application uses Laravel routes for student management.

| Method    | Route                      | Purpose                   |
| --------- | -------------------------- | ------------------------- |
| GET       | `/students`                | Display students          |
| GET       | `/students/create`         | Display registration form |
| POST      | `/students`                | Save student              |
| GET       | `/students/{student}`      | Display student profile   |
| GET       | `/students/{student}/edit` | Display edit form         |
| PUT/PATCH | `/students/{student}`      | Update student            |
| DELETE    | `/students/{student}`      | Delete student            |

---

## 13. Controller

The main controller is:

```text
app/Http/Controllers/StudentController.php
```

The controller handles:

* Displaying registered students
* Showing the registration form
* Validating submitted data
* Uploading profile pictures
* Saving student information
* Displaying student profiles
* Editing student records
* Updating profile pictures

Main controller methods include:

```php
index()
create()
store()
show()
edit()
update()
destroy()
```

---

## 14. Flash Messages

The application uses Laravel session flash messages to inform users when an operation is successful.

Example:

```php
return redirect()
    ->route('students.index')
    ->with('success', 'Student registered successfully!');
```

The message is displayed on the student listing page.

Example:

```text
Student registered successfully!
```

Flash messages improve user experience by clearly informing users about the result of their actions.

---

## 15. Problems Encountered

### Problem 1 – Database Field Error

During registration, the application initially produced an error because the database contained a required `name` field that was not being supplied by the registration form.

**Error:**

```text
SQLSTATE[HY000]: General error: 1364
Field 'name' doesn't have a default value
```

### Solution

The database structure and Laravel model/controller were updated so that the student information matched the fields being submitted by the form.

---

### Problem 2 – Course Field Error

Another database error occurred because the database contained a required `course` column while the registration system used the `program` field.

**Error:**

```text
SQLSTATE[HY000]: General error: 1364
Field 'course' doesn't have a default value
```

### Solution

The database migration was updated to remove the unnecessary `course` column and use `program` consistently throughout the application.

---

### Problem 3 – Profile Picture Storage

The profile picture initially required proper Laravel public storage configuration so uploaded images could be displayed by the browser.

### Solution

The Laravel storage symbolic link was created using:

```bash
php artisan storage:link
```

The command successfully connected:

```text
public/storage
```

to:

```text
storage/app/public
```

---

### Problem 4 – Validation Errors During Editing

The edit form initially displayed validation errors such as:

```text
The first name field is required.
The last name field is required.
The mobile number field is required.
```

### Solution

The edit form fields were corrected so their `name` attributes matched the validation rules and controller fields.

---

## 16. Testing

The following functions were tested:

* Student registration
* Required field validation
* Unique Student ID validation
* Unique email validation
* Email validation
* Mobile number validation
* Date of birth validation
* Gender validation
* Program validation
* Year level validation
* Address validation
* Profile picture validation
* Profile picture upload
* Student profile display
* Student information editing
* Profile picture update
* Flash success messages
* MySQL database storage

---

## 17. Screenshots

The project documentation includes screenshots of the following:

1. Registration Form
2. Validation Errors
3. Successful Registration
4. Flash Success Message
5. Uploaded Profile Picture
6. Student Profile Page
7. Database Records
8. Laravel Project Structure
9. GitHub Repository
10. Terminal Output
11. Browser Output

Screenshots will be stored inside:

```text
screenshots/
```

Suggested filenames:

```text
01-registration-form.png
02-validation-errors.png
03-success-registration.png
04-flash-message.png
05-uploaded-profile-picture.png
06-student-profile.png
07-database-records.png
08-project-structure.png
09-github-repository.png
10-terminal-output.png
11-browser-output.png
```

---

## 18. Git and GitHub

The project is maintained using Git for version control.

### Repository

**GitHub Repository:**

`https://github.com/guarinaangelo5/student_registration`

### Git Commands Used

Initialize the repository:

```bash
git init
```

Add project files:

```bash
git add .
```

Create a commit:

```bash
git commit -m "feat: initialize student registration system"
```

Connect the GitHub repository:

```bash
git remote add origin https://github.com/guarinaangelo5/student_registration.git
```

Push changes:

```bash
git push -u origin main
```

The project will maintain at least **10 meaningful commits** as required by the laboratory activity.

---

## 19. Learning Reflection

Developing the Student Registration System helped me understand the importance of proper form processing and server-side validation in web applications. Before saving information to the database, Laravel validates the submitted data to make sure that required fields are completed and that values follow the expected format. This prevents incomplete and invalid information from being stored.

One of the most important lessons I learned was how Laravel processes user input through routes, controllers, validation, models, and the database. The registration form sends a request to the Laravel route, which passes the request to the controller. The controller validates the information and uses the Student model to save the data into MySQL. After the process is completed, Laravel returns a response and displays the registered student's information.

I also learned why server-side validation is important even when client-side validation is available. Client-side validation improves the user experience because errors can be displayed immediately in the browser. However, client-side validation can be bypassed, so the server must still validate every request before processing it. Server-side validation provides an additional layer of protection and helps maintain the integrity of database records.

Another important lesson was handling uploaded files. Profile pictures cannot simply be trusted because users may upload files with invalid formats or very large sizes. Using Laravel validation rules such as `image`, `mimes`, and `max` helps restrict uploaded files. Laravel Storage also provides a structured way to manage uploaded files while allowing the database to store only the file path.

I encountered several database and validation issues during development. Some errors were caused by differences between the database column names and the fields submitted by the form. These problems helped me understand the importance of keeping the migration, model, controller, and Blade templates consistent. I also learned how to use migrations to update the database structure and how to create the Laravel storage symbolic link for uploaded images.

Overall, this project improved my understanding of Laravel's request lifecycle, validation, database integration, file handling, and Git version control. Registration systems are widely used in real-world enterprise applications, including universities, companies, hospitals, government systems, and online services. The skills learned from this project provide a useful foundation for developing larger and more secure Laravel applications in the future.

---

## 20. Future Improvements

Possible future improvements include:

* User authentication
* Admin login
* Student search and filtering
* Pagination
* Student deletion confirmation
* Export student records to PDF
* Export student records to Excel
* Dashboard statistics
* Improved profile picture management
* Role-based access control
* Activity logs
* Responsive mobile improvements

---

## 21. References

Laravel. (n.d.). *Laravel documentation*. https://laravel.com/docs

PHP Documentation Group. (n.d.). *PHP manual*. https://www.php.net/docs.php

MySQL. (n.d.). *MySQL documentation*. https://dev.mysql.com/doc/

Bootstrap. (n.d.). *Bootstrap documentation*. https://getbootstrap.com/docs/

MDN Web Docs. (n.d.). *HTML forms*. https://developer.mozilla.org/en-US/docs/Learn/Forms

---

## 22. Author

**Angelo Guarina**

ITST 302 – Client-Server Technologies

Week 4 Laboratory Activity

**Mini Project 03 – Student Registration System**

---

## 23. Project Status

**Status:** Completed / In Development for Documentation and Portfolio Submission

The core Student Registration System functionality has been implemented, including student registration, validation, MySQL database integration, profile picture upload, student profile display, editing, and GitHub version control.


### Final Project Status

The Student Registration System is completed and includes student registration, validation, profile picture upload, student profile viewing, editing, deleting, and search functionality.

The project documentation, diagrams, and screenshots are also included in this repository.
