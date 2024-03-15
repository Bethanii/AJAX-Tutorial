## Overview
The application consists of an HTML form where users can specify their search criteria, including maximum age, maximum words per minute (WPM), and sex. Upon submission, an AJAX request is sent to the server-side PHP script, which then queries a MySQL database based on the provided criteria. The results are returned and displayed on the same page without requiring a page reload.
### Features
•	User Input Form: Allows users to enter search criteria such as maximum age, maximum WPM, and sex (male or female).  
•	AJAX Request: Utilizes JavaScript to send an asynchronous request to the server, passing the user's input as query parameters.  
•	PHP Backend: The server-side script connects to a MySQL database, sanitizes the input to prevent SQL injection, constructs the query based on the input, and fetches the matching records.  
•	Dynamic Result Display: The fetched records are displayed in a dynamically generated HTML table below the form, showcasing the power of AJAX for updating the web page content on the fly.  
## Usage
1.	Form Submission: The user fills in the form fields and selects their desired criteria.
2.	AJAX Functionality: Upon clicking the "Query MySQL" button, the JavaScript function ajaxFunction() is triggered, which sends the input values to the PHP script without reloading the page.
3.	Database Query: The PHP script receives the input, constructs a safe SQL query, and executes it against the MySQL database.
4.	Result Display: The script formats the query results into an HTML table
