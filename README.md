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

<br>

## 💻 Git Commands Reminder
<br>

# Basic workflow
```
git add .
git commit -m "commit comment"
git push
# Push and create the branch on remote if it doesn't exist (sets upstream)
git push -u origin yourBranch
```

`git config --global push.autoSetupRemote true`
<br>
**Highly Recommended :**
*If you use this command (only once) you don't have to use the command:*
<br>
`git push -u origin yourBranch`
<br>
*anymore, instead you can just use:*
<br>
`git push`
<br>
*and the upstream will be setup automatically to your new branch*

# Create / switch local branches
```
git branch branchname          # create (stay on current branch)
git checkout branchname        # switch to an existing branch
git checkout -b branchname     # create AND switch in one command
```

# Common sync sequence
```
git checkout dev
git pull
git checkout yourBranch
git merge origin/dev
```

or one line:
`git pull origin dev`
<br><br>
*git pull origin dev tells Git: "Go to the origin remote, get the latest version of the dev branch, and merge it directly into the branch I am on right now (yourBranch)."*

# Branch naming convention
Name-Feature
<br>
Example: Amine-Feature


ieziezaiaze