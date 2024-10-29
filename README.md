# Busto Apsikeitimas

Busto Apsikeitimas is a web application for temporary home swapping. It enables users to list their properties, search for exchange opportunities, and arrange temporary stays in each other's homes for vacations or other purposes.

## Table of Contents

-   [Features](#features)
-   [Tech Stack](#tech-stack)
-   [Installation](#installation)
-   [Usage](#usage)
-   [License](#license)
-   [Contributing](#Contributing)

## Features

Current Features:

-   User Registration and Authentication: Secure sign-up and login system for users to create and manage their accounts.
-   Property Listing: Users can list their homes or apartments for exchange, including detailed descriptions, photos, and availability calendars.
-   Search: Functionality allowing users to find suitable exchange properties based on location, dates, number of guests.
-   Messaging System: Communication system for users to discuss exchange details and arrangements.
-   Booking and Confirmation: Streamlined process for users to request, accept, or decline exchange offers.
-   Responsive Design: Mobile-friendly interface for easy access on various devices.
-   User Ratings and Reviews: System for users to rate and review their exchange experiences, building trust within the community.

Planned Future Enhancements:

-   Interactive Maps: Integration with map services to show property locations and nearby attractions.
-   Multilingual Support: Interface available in multiple languages to cater to international users.
-   Notification System: Email and in-app notifications for exchange requests, messages, etc.

## Tech Stack

-   Laravel
-   PHP
-   MySQL
-   Livewire
-   TailwindCSS
-   Alpine.js
-   Reverb

## Installation

1. Clone the repository:

```
git clone https://github.com/yourusername/bustoApsikeitimas.git
```

2. Navigate to the project directory:

```
cd bustoApsikeitimas
```

3. Install PHP dependencies:

```
composer install
```

4. Install NPM dependencies:

```
npm install
```

5. Copy the .env.example file to .env:

```
cp .env.example .env
```

6. Install Reverb

```
php artisan reverb:install
```

7. Configure your environment variables in the .env file, especially the database and Reverb settings:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password

REVERB_APP_ID=your_reverb_app_id
REVERB_APP_KEY=your_reverb_app_key
REVERB_APP_SECRET=your_reverb_app_secret
REVERB_HOST=your_reverb_host
REVERB_PORT=your_reverb_port
```

8. Generate an application key:

```
php artisan key:generate
```

9. Run database migrations:

```
php artisan migrate
```

10. (Optional) Seed the database:

```
php artisan db:seed
```

11. Compile assets:

```
npm run dev
```

12. Start the development server:

```
php artisan serve
```

13. In a separate terminal, start the Reverb server:

```
php artisan reverb:start
```

## Usage

To get started with Busto Apsikeitimas, follow these steps:

1. User Registration and Login:

    - Navigate to the registration page and create an account.
    - Log in using your credentials.

2. Creating a Property Listing:

    - From your navbar, click on "My Houses".
    - Fill in the details about your property, including description, location, available dates, and amenities.
    - Upload photos of your property.

3. Searching for Properties:

    - Use the search feature to find properties based on location, dates, and number of guests.
    - Apply filters to refine your search results.

4. Requesting a Home Exchange:

    - When you find a suitable property, click on "Send Swap Offer".
    - Select your property which you offering and add message.
    - Wait for the property owner to respond to your request.

5. Messaging:

    - Use the built-in messaging system to communicate with other users.
    - Discuss exchange details, ask questions, or clarify arrangements.

6. Managing Bookings:

    - From your navbar, click on "My Swaps" and manage your incoming and outgoing exchange requests.
    - Accept, decline exchange requests.

7. Leaving Reviews:

    - After completing an exchange, leave a review for the property and the host.
    - Share your experience to help build trust within the community.

## License

This project is licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.
