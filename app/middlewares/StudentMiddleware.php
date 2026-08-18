<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * StudentMiddleware
 * -----------------------------------------------------------------
 * Protects the /student/profile route.
 *
 * Flow:
 *   Request -> StudentMiddleware -> access allowed? 
 *       YES -> StudentController::profile() -> view
 *       NO  -> redirect back to /student
 *
 * TODO (Individualization Requirement):
 *   Feel free to change the session key name (e.g. 'student_access')
 *   and/or the redirect message to make your access condition unique.
 *
 * NOTE: Adjust the class/method signature (e.g. handle(), before(), etc.)
 * to match whatever base Middleware class your installed LavaLust
 * version provides. This example follows the generic
 * "extends Middleware / handle($request, $next)" convention most
 * LavaLust starter projects use.
 */
class StudentMiddleware extends Middleware
{
    public function handle()
    {
        // Make sure the session is started before checking it.
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Simple unique access condition for this lab activity.
        // In a real app this would check a logged-in user instead.
        $access_allowed = isset($_SESSION['student_access']) && $_SESSION['student_access'] === true;

        if ($access_allowed) {
            // Allowed: let the request continue to StudentController::profile()
            return true;
        }

        // Not allowed: send them back to the student home page
        // with a short message explaining why.
        $_SESSION['access_message'] = 'Access denied: please log in to view the student profile.';
        redirect('student'); // adjust helper name if your version differs, e.g. redirect(site_url('student'))
        exit;
    }
}
