# Concert Ticket Booking Website

This project is a web-based application designed to support the process of viewing, selecting, and booking tickets for concerts. The system provides a modern and interactive user interface while maintaining a structured and secure backend infrastructure. The primary goal is to deliver a seamless experience for users when browsing and purchasing tickets online.

## Overview

The application includes two main components:

- A **frontend** focused on visual effects and interactive elements, providing a user-friendly environment for browsing concert information and completing purchases.
- A **backend** developed with PHP and MySQL, ensuring data consistency, user management, booking logic, and secure transaction handling.

## Technologies Used

### Frontend

The frontend stack emphasizes responsiveness and visual effects, using a mix of CSS technologies:

- **CSS**: Core layout and styling framework (27.1%)
- **SCSS**: Enhanced styling capabilities using variables, nesting, and mixins (21.8%)
- **Less**: Modular styling and theme customization (20.9%)
- **JavaScript**: Handles dynamic behaviors, form validation, and user interactions (15.6%)
- **HTML**: Structured markup for content rendering (6.6%)

### Backend

- **PHP**: Implements server-side logic, handles form submissions, manages session states, and communicates with the database (5.5%)
- **Hack**: Legacy support for static typing and asynchronous features (2.5%)
- **MySQL**: Relational database system for storing user data, concert information, and booking transactions

## Key Features

- Users can browse available concerts and view detailed information for each event
- Interactive ticket selection interface with dynamic pricing and availability updates
- User registration and authentication system
- Booking confirmation with server-side validation
- Admin panel (optional) for managing concert listings and monitoring sales

## Visual Design and Effects

The frontend is enhanced with various visual effects and transitions, including:

- Smooth animations on interactions
- Transition effects between pages and modal popups
- Responsive layout adapting to different screen sizes
- Styled form components and buttons for consistent user experience

## Database Overview

The MySQL database is structured to support booking operations with three primary tables:

- `users`: Stores user credentials and profile information
- `bookings`: Links users to concerts and records the number of seats booked and booking status

## Deployment

To deploy the application:

1. Clone the repository.
2. Set up a MySQL database and import the provided schema.
3. Update database credentials in the configuration file.
4. Deploy the PHP backend using a compatible web server (Apache, Nginx with PHP-FPM, or PHP built-in server).
5. Open the application in a modern web browser to begin use.
