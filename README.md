# Customs-Supervision-System

Customs-Supervision-System is a web application developed for the Customs office to manage all port shipping systems. The application is built using HTML, CSS, Bootstrap, JavaScript, jQuery for the frontend, and raw PHP for the backend. This guide will help you set up and run the project on your computer.
## Prerequisites

Before you proceed, make sure you have the following installed on your computer:

1. **XAMPP** - A web server solution package that includes Apache, MySQL, and PHP.
2. **Visual Studio Code (VS Code)** - A code editor.

## Getting Started

1. Clone the project to your local machine using the following command:

bash

    git clone https://github.com/Rafiqul-jakir/Customs-Supervision-System.git

2. Start XAMPP and ensure the Apache and MySQL services are running.

3. Open the Customs-Supervision-System folder in VS Code.

4. Import the database:
    - Open your web browser and go to ***http://localhost/phpmyadmin***.
    - Create a new database named ***'customs_supervision_system'***.
    - Navigate to the new database and click on the ***"Import"*** tab.
    - Click on ***"Choose File"*** and select the ***'database.sql'*** file from the project's root directory.
    - Click "Go" to import the database structure and data.

5. Configure the database connection:
    - In the project folder, locate the ***'config.php'*** file inside the backend directory.
    - Update the database credentials if necessary (username, password, database name).

## Running the Application

1. Launch your web browser and go to ***http://localhost/Customs-Supervision-System*** to access the application.

## Application Features

- **User Authentication:** Secure login and registration system for Customs office staff to access the application.
- **Shipping Records Management:** Easily manage and track shipping records, including incoming and outgoing shipments.
- **Cargo Inspection Tracking:** Track the inspection status of cargos and generate inspection reports.
- **Vessel Information:** Store and retrieve information about vessels arriving at the port.
- **Customs Duties and Tariffs:** Manage and update customs duties and tariffs for different types of goods.
- **Invoice Generation:** Generate invoices and receipts for customs duties and fees.
- **Search and Filters:** Search and filter functionalities to quickly find specific shipping records or information.
- **User Roles and Permissions:** Assign different roles to users with appropriate permissions for enhanced security.
- **Dashboard and Analytics:** Visualize data and shipping statistics through interactive charts and graphs.
- **Notifications:** Receive real-time notifications for important events and updates.
- **Export and Import Data:** Import and export data in various formats for data backups or migration.


## Support and Contribution

If you encounter any issues or have suggestions for improvements, please create an issue in the GitHub repository. Pull requests for bug fixes, enhancements, or new features are always welcome!

## Contact

For any questions, feedback, or suggestions, please feel free to reach out to us:

- **Name:** Rafiqul Islam
- **Email:** rafiquljakir@gmail.com
- **Website:** https://rafiqul-jakir.github.io/Resume/
