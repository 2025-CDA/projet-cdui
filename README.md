je mappel amine

# Project Setup and Usage

This document provides instructions on how to install the project's dependencies and run it in a development environment.

## 💻 Installation

Follow these steps for the initial one-time setup of the project.

1.  **Install PHP Dependencies:**
    Use Composer to install all the required PHP packages.
    ```bash
    composer install
    ```

2.  **Install JavaScript Dependencies:**
    Install all the required JavaScript packages.
    ```bash
    npm install
    ```
    *(If you do have `pnpm`, you can use `pnpm install` instead).*
    <br><br>
3.  **Create the Database:**
    This command will create the database if it doesn't already exist.
    ```bash
    symfony console doctrine:database:create
    ```

4.  **Run Database Migrations:**
    This command will apply all necessary database schema changes.
    ```bash
    symfony console doctrine:migrations:migrate
    ```

## 🚀 Running the Application for Development

There are two primary ways to run the application for development.

### Workflow

This is the minimum required to run the application. You will need **two separate terminals**.

*   **Terminal 1: Start the Symfony Server**
    This command starts your PHP application server.
    ```bash
    npm run serve
    ```
    *(This command runs `symfony serve -no-tls` by default to ensure the server runs without `https` but `http`, it avoids conflict with react server).*
<br><br>
*   **Terminal 2: Build and Watch Assets**
    This command watches for changes in your `assets/` folder and rebuilds the files into the `public/build` directory when you save a change.
    ```bash
    npm run dev
    ```
    > **Note:** With this setup, you will need to **manually refresh your browser** to see any frontend changes.

---
