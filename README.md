Chiyo PHP Framework
===================

Chiyo PHP Framework (**Chiyo Framework** or **Chiyo** for short) is a small PHP framework which's purpose is to enable the developer to build a web application in a few minutes.

## Requirements
Chiyo requires an Apache Web Server running a current version of PHP (currently *5.6.3*).

## Current Features
* URL Rewrite and Handling
* Logging System
* Simple Navigation System
* App Configuration File (`/config/app.php`)
* Database Configuration File (`/config/db.php`)

## Features Currently In Progress
* *none*

## TODOs & Planned Features
* Messaging System: *The application should be able to report messages back to the user, like errors with processing an order or successfully completing one. Some CSS has already been done for it.*
* Database Connection: *The application should be able to contact a database (e.g. MySQL) for storing data.*
* User System: *Users should be able to login to and logout from the application.*
* User Account Management: *It should be able to list all registered users, add new ones, edit or remove existing, except the initial user.*
* Rights System: *There should be a rights system that allows the developer to prevent certain groups of users to do specific things.*
* File Manager: *A file manager should be available, where users can upload and download files using an Explorer-like system with folders*
* AJAX Transmission: *The framework should transfer data for lists (like a list of users) over an AJAX request. This should enable the application to support features like paging a list without implementing a complex system using PHP itself.*
* Write Documentation (-.-)

A simple TODO List can be found in the `/docs` folder.

## Ideas
* Fixed Navigation Bar: *The navigation bar to the right could be fixed so only the pages content scrolls up and down.*
* Navigation Folders: *The navigation bar should be able to handle folders so certain items can be grouped. The folders should be collapsible and the state should be stored across the browser session. (Maybe using JavaScript for this?)*

## License

The MIT License (MIT)

Copyright (c) 2015 rGunti

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
~~~