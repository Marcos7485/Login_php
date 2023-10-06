Project Documentation:
This documentation provides an overview of the structure and functionality of the project, detailing the key files and classes used in the application. The project is intended to be a web application that allows users to register, log in, and manage their profiles.

Main Files
config.php
Functionality: This file stores global variables, such as keys and private passwords used in the project. It is common in PHP projects to have a centralized configuration file to manage these variables.
Directory Structure
Functionality: The core/ directory is an essential part of the directory structure of this project. It contains various subdirectories and key files that play a fundamental role in the operation of the application. Here is a detailed description of each element:
core/classes/:
In this subfolder, you'll find PHP classes that encapsulate the essential functionality of the application. These classes provide methods and programming logic for different aspects of the application, such as the database, email sending, general functions, and user management.

core/controllers/:
Here, controllers that handle different actions and requests that users can make in the application are stored. The main controller (Main.php) is responsible for managing actions such as displaying the home page, user panel, user registration, and login.

core/views/:
This subfolder contains HTML views that define the user interface of the application. Each view file corresponds to a specific page or section of the application and is used to display information and content to the user.

core/rotas.php:
The rotas.php file plays a crucial role in managing routes and mapping URL requests to specific controllers and methods. It defines the available routes in the application and specifies how incoming requests should be handled.

DATABASE/:
Inside this folder, there is a backup of the database used by the application. This backup can be essential for data recovery in case of failures or data loss.

assets/:
Here, static files used in the application, such as stylesheets (CSS) and JavaScript files (JS), are stored. These files are responsible for formatting and adding functionality to the user interface.

src/:
The src/ folder contains all multimedia files used in the application. This includes images, videos, or other resources used to enhance the visual content of the application.

vendor/:
This folder is specific to Composer, a PHP dependency management tool. It stores third-party libraries and dependencies used in the project. Composer facilitates the incorporation and updating of external libraries into the project.

index.php
Functionality: This file initiates a PHP session to maintain information between different user requests. It also requires the config.php file to load configurations and environment variables and vendor/autoload.php to load project dependencies (third-party libraries installed via Composer). Additionally, it requires the core/rotas.php file to define the routes and controllers of the application.
Routes and Controllers
core/rotas.php
Functionality: This file defines the application's routes in an array called $rotas. Each array key is the name of a route, and the associated value is a string following the format 'controller@method.' This is used to map a route to a specific controller and method in the code. It also sets a default action as 'inicio' (start) and handles the execution of actions based on the provided URL.
Controllers in core/controllers/
Functionality: Controllers, such as Main.php, handle different actions of the application, such as displaying the home page, user panel, user registration, and login. Each controller defines methods to perform these actions and uses the Layout function to load the corresponding views.
Utility Classes
core/classes/Database.php
Functionality: This class encapsulates database access functionality. It provides methods for performing CRUD operations (select, insert, update, delete) on the database, as well as a generic method for executing custom SQL queries. The class handles database connection and disconnection internally.
core/classes/EnviarEmail.php
Functionality: This class encapsulates email sending functionality. It uses the PHPMailer library to send emails, including confirmation messages to new users. It provides methods for sending emails for various purposes.
core/classes/Functions.php
Functionality: This class provides various useful functions commonly used in a web application, including view management, login verification, URL redirection, encryption, and random string generation. These functions can be used in a PHP application to perform common tasks more efficiently.
core/classes/Users.php
Functionality: This class encapsulates user-related functionalities in the application. It provides methods to check the existence of an email address in the database, register new users, validate email addresses, verify login credentials, and retrieve user information.
Views
Views in core/views/
Functionality: These views represent the HTML pages displayed to the user. Each view is associated with a controller and contains the corresponding user interface. Some important views include new_user.php for user registration, sign_in.php for login, and user_panel.php for displaying user information.
Views in core/views/layouts/
Functionality: These views represent common layouts used in different parts of the application. For example, html_header.php defines the basic structure of a web page with a header, and html_footer.php creates a footer displaying information about the developer.
Static Files
Files in public/assets/
Functionality: These files contain styles (CSS) and scripts (JavaScript) used in the application. They include app.css for custom styles and libraries like bootstrap.min.css and bootstrap.min.js.
Multimedia
Files in src/
Functionality: These multimedia files are used in the application for elements such as images and videos.
Conclusions
This PHP project has been structured in an organized manner, utilizing controllers, utility classes, and views to manage different functionalities of the application, including user registration, login, profile management, and email sending. Additionally, third-party libraries like PHPMailer and Bootstrap have been used to enhance the functionality and design of the application. The documentation provided here serves as a reference for understanding the structure and functionality of the project.
