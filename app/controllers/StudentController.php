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
            'student_id'  => '2024-00241',                         // TODO: your student number
            'name'        => 'Hernandez Jenuel A.',                    // TODO: your full name
            'course'      => 'BS Information Technology',         // TODO: your course
            'year'        => '3rd Year',                          // TODO: your year level
            'section'     => 'F6',                                 // TODO: your section
            'email'       => 'hernadezjenuel@gmail.com',                  // TODO: your email
            'address'     => 'Victoria, Oriental Mindoro',                    // optional extra info
            'contact_no'  => '09953410483',                     // optional extra info
            'skills'      => 'PHP, HTML/CSS, JavaScript',         // optional extra info
            'hobbies'     => 'Watching Anime, Gaming , Reading Manga or Manhwa',       // optional extra info
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
