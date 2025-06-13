# My PHP MVC Application

This is a simple PHP MVC (Model-View-Controller) application designed to demonstrate the MVC architecture in PHP.

## Project Structure

```
my-php-mvc-app
├── app
│   ├── controllers
│   │   ├── BaseController.php
│   │   └── HomeController.php
│   ├── models
│   │   └── BaseModel.php
│   └── views
│       ├── layouts
│       │   └── main.php
│       └── home
│           └── index.php
├── config
│   ├── app.php
│   └── database.php
├── public
│   ├── index.php
│   ├── css
│   │   └── style.css
│   └── js
│       └── script.js
├── routes
│   └── web.php
├── .htaccess
└── README.md
```

## Installation

1. Clone the repository to your local machine.
2. Navigate to the project directory.
3. Set up your database configuration in `config/database.php`.
4. Start a local server (e.g., XAMPP, MAMP).
5. Access the application via your browser at `http://localhost/my-php-mvc-app/public`.

## Usage

- The application follows the MVC pattern, where:
  - **Models** handle data and business logic.
  - **Views** are responsible for the presentation layer.
  - **Controllers** manage user input and interact with models and views.

- The default route is handled by `HomeController`, which renders the home page view.

## Contributing

Feel free to fork the repository and submit pull requests for any improvements or features.

## License

This project is open-source and available under the MIT License.