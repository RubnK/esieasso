# ESIEAsso

**Authors : [@RubnK](https://github.com/RubnK)**

ESIEAsso is a student project aimed at creating a web platform to connect students and associations within ESIEA. The website allows each association to have a dedicated showcase page, manage its members, and update information. Additionally, associations can publish events, which are displayed on a list and a calendar. Users can register on the platform, apply to join an association, and access a variety of features.


## Table of content

- [Features](#Features)
- [Requirements](#Prerequisites)
- [Setup](#Setup)
- [Database tables](#Database-tables)
- [Contributing](#Contributing)

## Features

- **Account Management**: Users can create accounts, log in, and validate their accounts through email confirmation.
- **Association Roles**: Associations have specific roles, allowing them to manage their information and members (particularly applicable to the General Board).
- **Event Creation**: Associations can create and publish events, showcasing them on a list and calendar.
- **Membership Application**: Users can apply to join an association through the platform.
- **Event Listing**: A comprehensive list of events is available for users to explore.

## Prerequisites
Ensure that you have PHP and a MySQL-compatible database (e.g., MySQL, MariaDB) installed on your server.

## Setup

1. Clone the repository:

   ```bash
   git clone https://github.com/RubnK/ESIEAsso.git
    ```
2. Navigate to the project directory:
    ```bash
    cd esieasso
    ```
3. Set up a local development server (e.g., using XAMPP or MAMP).
4. Create a MySQL database.
5. mport the esieasso.sql file into your database to set up the required tables and sample data.
6. Update the `models/connexion_db.php` file with your database connection details.

## Database tables

- `associations` : Informations about associations
- `evenements` : Informations about events
- `join_asso` : Record of candidates to associations
- `roles_asso` : Record of associations' roles
- `users` : Record of users
- `user_role_asso` : Association between user and role in association

## Contributing
Feel free to contribute to the project by submitting issues or pull requests.