### Routes

1. **Show Content Route:**

    - **Path:** `/storage/app/public/images/content/{filename}`
    - **Functionality:** Retrieves and displays an image from the storage path based on the provided filename.
    - **Usage:** Typically used to show images in the application.
    - **Name:** `storage.content.show`

2. **Welcome Route:**

    - **Path:** `/`
    - **Functionality:** Displays the welcome view.
    - **Usage:** Typically the landing page or home page.
    - **Name:** `welcome`

3. **Authenticated Routes:**

    - **Middleware:** Authenticated users
    - **Admin Access Routes:**
        - Handles routes accessible only to users with admin access.
    - **General User Routes:**
        - Handles routes accessible to authenticated users in general.

4. **Authentication Routes:**
    - Handled by Laravel's default `Auth::routes()` method.
    - Provides authentication-related routes like login, register, logout, etc.

### Controller Actions

-   **HomeController:**

    -   `index`: Handles the index view for authenticated users.
    -   `users`: Retrieves users for admin viewing.

-   **LevelController:**

    -   `index`: Displays levels.
    -   `store`: Adds a new level.
    -   `destroy`: Deletes a level.

-   **CategoryController:**

    -   `index`: Displays categories.
    -   `store`: Adds a new category.
    -   `destroy`: Deletes a category.

-   **ContentController:**

    -   `index`: Displays contents for a specific category.
    -   `store`: Adds new content.
    -   `update`: Updates content.
    -   `destroy`: Deletes content.

-   **ProfileController:**
    -   `index`: Displays the user's profile.
    -   `updateName`: Updates the user's name in the profile.
    -   `updatePassword`: Updates the user's password in the profile.

### Middleware

-   **`auth`:** Protects routes that require authentication.
-   **`admin.access`:** Protects admin-specific routes for authorized access.
