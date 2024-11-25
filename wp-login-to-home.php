function redirect_non_admin_users( $redirect_to, $request, $user ) {
    // Check if the user has the 'administrator' role
    if ( isset( $user->roles ) && is_array( $user->roles ) ) {
        if ( in_array( 'administrator', $user->roles ) ) {
            // If user is an administrator, redirect to the dashboard or requested page
            return $redirect_to;
        } else {
            // If user is not an administrator, redirect to the home page
            return home_url();
        }
    } else {
        // If roles are not set, redirect to the home page
        return home_url();
    }
}
add_filter( 'login_redirect', 'redirect_non_admin_users', 10, 3 );
