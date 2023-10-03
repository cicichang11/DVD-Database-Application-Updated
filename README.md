# DVD-Database-Application-Updated
This is a PHP and MySQL web application that allows users to catalog and manage a DVD collection.

## Features
- Search for DVDs by title, genre, release year, etc.
- View DVD details including title, release date, genre, rating, etc.
- Add new DVD entries to the database
- Edit existing DVD entries
- Delete DVD entries
- Responsive design that works on mobile and desktop screens

## Technologies Used
- PHP 7.3
- MySQL
- HTML5
- CSS3
- Bootstrap 4

## Files
**index.php**

- Home page with links to Search and Add pages

**search_form.php**

- Search form that allows users to search for DVDs
- Queries MySQL for select dropdown options

**search_results.php**

- Displays search results in a table
- Links to DVD details and delete pages

**details.php**

- Shows all details for a selected DVD

**add_form.php**

- Form to add a new DVD to the database

**add_confirmation.php**

- Confirms DVD was added and redirects user

**edit_form.php**

- Pre-populates form to edit DVD details

**edit_confirmation.php**

- Confirms DVD edits and redirects user

**delete.php**

- Deletes a DVD record and redirects user

## Database
The MySQL database consists of the following tables:

- dvd_titles - Stores DVD titles and release dates
- genres - Stores genres like drama, comedy, etc.
- labels - Stores DVD labels
- ratings - Stores ratings like G, PG, R
- formats - Stores DVD formats like DVD, Blu-Ray, 4K, etc.
- sounds - Stores sound types like stereo, surround, etc.

Foreign keys are used to link the genre, label, rating, format, and sound tables to the main dvd_titles table.

## Installation

1. Clone or download the code
2. Import the dvd_database.sql file into MySQL
3. Configure your database connection settings in db_credentials.php
4. Place files on your server
5. Visit index.php to get started

## Future Enhancements

- User accounts and management
- DVD cover images
- Advanced search capabilities
- Pagination of search results
- Ability to mark DVDs as owned/wishlist
- REST API

  
