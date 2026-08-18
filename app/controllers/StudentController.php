<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * StudentController
 * -----------------------------------------------------------------
 * Handles the two pages required by the lab:
 *   - index()   -> Student home page      (route: /student)
 *   - profile() -> Student profile page   (route: /student/profile,
 *                                           protected by StudentMiddleware)
 *
 * TODO (Individualization Requirement):
 *   Replace every value in the $student array below with YOUR OWN
 *   information. Do not reuse a classmate's ID, name, course, or section.
 */
class StudentController extends Controller
{
    /**
     * Builds the associative array of student data.
     * Kept as one private helper so both methods share the same data
     * source instead of duplicating it (Part C requirement).
     */
    private function get_student_data()
    {
        return [
            'student_id'  => '2026-0001',                         // TODO: your student number
            'name'        => 'Juan Dela Cruz',                    // TODO: your full name
            'course'      => 'BS Information Technology',         // TODO: your course
            'year'        => '2nd Year',                          // TODO: your year level
            'section'     => 'A',                                 // TODO: your section
            'email'       => 'juan@example.com',                  // TODO: your email
            'address'     => 'Bacoor, Cavite',                    // optional extra info
            'contact_no'  => '0900-000-0000',                     // optional extra info
            'skills'      => 'PHP, HTML/CSS, JavaScript',         // optional extra info
            'hobbies'     => 'Coding, Reading, Basketball',       // optional extra info
            'description' => 'A BSIT student who enjoys building small web projects.',
        ];
    }

    /**
     * GET /student
     * Displays the student home page.
     */
    public function index()
    {
        $data['page_title'] = 'Student Home';
        $data['student']    = $this->get_student_data();

        $this->call->view('student_home', $data);
    }

    /**
     * GET /student/profile
     * Displays the full student profile.
     * This method is only ever reached if StudentMiddleware allows the
     * request through (see Part E/F).
     */
    public function profile()
    {
        $data['page_title'] = 'Student Profile';
        $data['student']    = $this->get_student_data();

        $this->call->view('student_profile', $data);
    }
}
