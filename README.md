# Project Matching
## Technology
1. Laravel 10x (PHP v8.1.17)
    - Documentation: https://laravel.com/docs/9.x
2. Bootstrap v5.2.3
    - Documentation: https://getbootstrap.com/docs/5.2/getting-started/introduction/
## SETUP PROJECT
### Use docker
- Step 1: Create file `.env` for API, refer `.env.example`
    ```
    cp .env.example .env
    ```
- Step 2: Run command line to install vendor
    ```
    composer install
    ```
- Step 3: Run command line to generate key
    ```
    php artisan key:generate
    ```
- Step 4: Run command line to run migrate to create DB
    ```
    php artisan migrate --force
    ```
- Step 5: Run command line to add default DB
    ```
    php artisan db:seed
    ```
- Step 6: Run command line to add storage link
    ```
    php artisan storage:link
    ```
- Step 7: Run command line to install npm dependencies
    ```
    npm install
    ```
- Step 8: Run command line to npm
    ```
    npm run dev
    ```
- Run command line
    ```
    1. Log router list
        php artisan route:list
        php artisan api:routes
    2. Add component
        php artisan make:component NameComponent
    3. Add enum
        php artisan make:enum NameEnum
    4. Add Controller
        php artisan make:controller UserController
    4. Migration
        - create table: php artisan make:migration create_{table_name}_table
        - add column: php artisan make:migration add_{column_name}_to_{table_name}_table
        - add more columns: php artisan make:migration add_{column_name}_and_{column_name}_columns_to_{table_name}_table
        - change column: php artisan make:migration change_{column_name}_column_in_{table_name}_table
        - rename column: php artisan make:migration rename_{old_column_name}_column_to_{new_column_name}_in_{table_name}_table
    5. Clear config
        php artisan config:clear
    6. Clear Cache
        php artisan cache:clear
    7. Clear Route Cache
        php artisan route:cache
        php artisan route:clear
    8. Clear View Cache
        php artisan view:clear
    9. Clear Config Cache
        php artisan config:cache
    10. Clear all
        php artisan optimize
        php artisan optimize:clear
    ```
    php artisan tinker
- Website running default on : **http://localhost/public/home**
    - Account admin:
        ```
        Username: admin@gmail.com
        Password: 12345678
        ```
## Git Flow
- Step 1: Change label of task to processing
- Step 2: checkout to dev, pull newest code from dev
    ```
    git checkout dev
    git pull origin dev
    ```
- Step 3: Create branch for task, base in branch `dev`

    **Rule of branch name:**

    - If issue have label is `'todo'`, branch name start with `todo/`
    - After that, concat with string `doan-[issueId]`

    Example: Issue is `todo`, Id is `123`, Name is `Create Page login`. Branch name is `todo/doan-123`
    ```
    git checkout -b feat/doan-123 dev
    ```
- Step 4: When commit, message of commit follow rule
    - If issue have label is `'todo'`, branch name start with `todo: `
    - Next is string `[#[issueId]]`
    - Next is commit content

    Example: `feat: [#123] Coding layout for page login`
- Step 5: When create merge request
    
    **Rule of merge request name:**
    
    - If issue have label is `'todo'`, title start with `todo: `
    - Start with `[#[issueId]]`
    - Next is  merge request content

        Example: `todo: [#123] Page login`

    **Rule of merge request description:**

    - In **`What does this MR do and why?`**, replace _`Describe in detail what your merge request does and why.`_ with your content of this merge request
    - In **`Screenshots or screen recordings`**, replace _`These are strongly recommended to assist reviewers and reduce the time to merge your change.`_ with screen recordings of feature or task for this merge request
    - Check the checklist
    - Select approver
    - Select merger

    **Rule fix conflict or merge newest code:**
    - Create other branch with convention like step 3. But have suffixes `-dev`, `-dev1`,... (in example, branch name is `feat/doan-123-dev`)
    - After that, merge coding branch to new branch. In example is merger branch `feat/doan-123` to branch `feat/doan-123-dev`
    - Create merge request to `dev`

Fix conflict and create merge request from feat/iam-123-dev to dev

## Visual studio code Extensions
- GitLens
- EditorConfig
- Docker
- vscode-icon
- Laravel Blade Snippets
- Laravel Snippets
