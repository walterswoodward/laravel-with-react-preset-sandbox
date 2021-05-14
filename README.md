# Laravel (with React Preset) Sandbox
## Setup
source: https://www.positronx.io/how-to-install-react-js-in-laravel-with-bootstrap/
1. Create Repository
   1. Create Github repository named: `laravel-with-react-preset-sandbox`
   2. In your local environment, install a new laravel project (with composer): `composer create-project laravel/laravel --prefer-dist laravel-with-react-preset-sandbox`
   3. cd into project folder: `cd laravel-with-react-preset-sandbox`
   4. Initialize folder as git repository: `git init`
   5. Add a remote `origin` with address to previously `laravel-with-react-preset-sandbox` repository: `git add origin <Github Address>`
   6. Stage all changes: `git add .`
   7. Commit all changes: `git commit -m "init"`
   8. Change `master` branch name to `main`: `git branch -M main`
2. Install React Preset (assumes you have Node.js and NPM installed globally already)
   1. `composer require laravel/ui`
   2. `php artisan ui react`
   3. `npm install`
   4. `npm run dev`
## API Endpoints (in progress)
* GET `/videos/`: Retrieve all videos
* GET `/videos/{id}`: Retrieve the video that matches the `id`
* POST `/videos`: Create a new video and insert it into the database
* PUT `/videos/{id}`: Update an existing video that matches the `id`
* DELETE `/videos/{id}`: Delete the video with the given `id`
