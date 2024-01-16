<?php
namespace App\controllers;

use App\core\View;
use App\model\Movies;
use App\core\Validate;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class MoviesController
{
    public function index()
    {
        session_start();

        // Check if the user is not logged in
        if (!isset($_SESSION['name'])) {
            // Redirect to the login page
            header("Location: " . BURL . "/movies/signin");
            exit();
        }

        // If the user is logged in, proceed with loading the movie index page
        // You may want to fetch and display the movie data here
        $result = new Movies();
        $data["rows"] = $result->moviePost(null);
        View::load('movies/index', $data);
    }

    public function logout()
    {
        // Start the session
        session_start();

        // Clear the user session data to log out
        session_destroy();
        // unset($_SESSION['user']);
        // Redirect to the login page or any other desired location
        header("Location: " . BURL . "/movies/signin");
        exit();

    }

    public function signin()
    {
        $error = [];
        if (isset($_POST['moviesubmit'])) {
            $email = htmlspecialchars(trim($_POST['email']));
            $password = htmlspecialchars(trim($_POST['password']));

            $result = new Movies();
            $user = $result->getUserByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                // Start a session and store user data
                session_start();
                $_SESSION['name'] = $user['name'];

                // Redirect to the desired page after successful login
                header("Location: " . BURL . "/movies");
                exit();
            } else {
                $error[] = "sorry your password is not correct";
            }
        }
        $data['error'] = $error;
        // If it's not a POST request, load the sign-in page
        View::load('movies/signin', $data);
    }

    // CODE FOR FORGOTTEN PASSSWORD
    public function password_Reset()
    {
        View::load('movies/password_reset');
    }

    //CODE FOR PASSWORD RESET REQUEST
    public function reset_Request()
    {
        $result = new Movies();
        if (isset($_POST['reset_password'])) {

            $email = $_POST['email'];

            $selector = bin2hex(random_bytes(8));
            $token = random_bytes(32);

            $url = BURL . '/movies/create_password?selector=' . $selector . '&validator=' . bin2hex($token);

            $expires = date('U') + 1800;

            $result->deletetoken($email);

            $hashtoken = password_hash($token, PASSWORD_DEFAULT);

            $result->addtoken($email, $selector, $hashtoken, $expires);



            $mail = new PHPMailer(true);

            try {
                // SMTP Configuration
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'plutox86@gmail.com'; // Your Gmail email address
                $mail->Password = 'sonnspfsasokxbbl'; // Your Gmail app password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port = 465;

                // Sender and recipient settings
                $mail->setFrom('plutox86@gmail.com', 'PlutoX');
                $mail->addAddress($email);

                // Email content
                $mail->isHTML(true);
                $mail->Subject = 'Reset your Password for PlutoX';
                $mail->Body = "Dear, <br><br>
    <p>we received a password reset request. The link to reset your password is below, 
    if you did not make this request, you can ignore this email. Thanks. </p>";

                $mail->Body .= "<p>Here is your password reset link:</p>";
                $mail->Body .= '<p><a href="' . $url . '">' . $url . '</a></p>';

                $mail->Body .= "<p>Best regards,</p>
    <p>The PlutoX Team</p>
    <p>[PlutoX Logo]</p>";

                $mail->send();

                header('location:' . BURL . '/movies/password_reset?reset=success');
                View::load('password_reset');
            } catch (Exception $e) {
                header('location:' . BURL . '/movies/signin');
                return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }
    }


    public function create_password()
    {
        View::load('movies/create_password');
    }


    // CHECK PASSWORD FOR PASSWORD RESETTING
    public function checkPassword()
    {
        $result = new Movies();
        if (isset($_POST['reset_submit'])) {
            $selector = $_POST['selector'];
            $validator = $_POST['validator'];
            $pwd = $_POST['pwd'];
            $pwd_repeat = $_POST['pwd_repeat'];

            if ($pwd !== $pwd_repeat) {
                header('location: http://localhost/plutox/public/movies/create_password?pwdnotsame');
                exit();
            } else {

                $currentDate = date('U');
                $row = $result->getToken($selector, $currentDate);
                if (is_array($row)) {
                    $tokenbin = hex2bin($validator);
                    $tokencheck = password_verify($tokenbin, $row['pwdResetToken']);

                    if ($tokencheck === true) {
                        $tokenEmail = $row['pwdResetEmail'];

                        $row2 = $result->checkEmail($tokenEmail);

                        if (empty($row2)) {
                            echo 'there was an error';
                        } else {
                            $newpwd = password_hash($pwd, PASSWORD_DEFAULT);
                            $result->update_password_for_Token($newpwd, $tokenEmail);
                        }
                        $result->deleteEmail_after_token($tokenEmail);

                        header('location:' . BURL . '/movies/signin');
                        echo "<script>alert('Password has been updated')</script>";
                    }
                } else {
                    echo "not found in database";
                }
            }
        }
    }

    // SIGN UP CODE
    public function signup()
    {
        $error = [];

        if (isset($_POST['moviesubmit'])) {
            $name = htmlspecialchars(trim($_POST['name']));
            $email = htmlspecialchars(trim($_POST['email']));
            $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

            if (!preg_match('/^[a-zA-Z0-9]{6,12}$/', $name)) {
                $error[] = 'username must be 6-12 chars & alphanumeric and must not have space.';
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error[] = 'email must be a valid email address.';
            }
            if (empty($error)) {
                $result = new Movies();
                $result->insertUsers($name, $email, $password);

                // Call the function to send confirmation email
                $emailResult = Validate::sendConfirmation($email, $name);

                // Check if the email was sent successfully
                if ($emailResult === true) {
                    // Redirect to the login page after successful registration and email confirmation
                    header("Location: " . BURL . "/movies/signin");
                    exit();
                } else {
                    // If there was an error sending the email, handle it appropriately
                    $error[] = 'Error sending confirmation email: ' . $emailResult;
                    header("Location: " . BURL . "/movies/signin");
                    exit();
                }

            }
        }
        $data['error'] = $error;
        // If it's not a POST request or there are errors, load the sign-up page
        View::load('movies/signup', $data);
    }


    public function single_page($id)
    {
        session_start();

        // Check if the user is not logged in
        if (!isset($_SESSION['name'])) {
            // Redirect to the login page
            header("Location: " . BURL . "/movies/signin");
            exit();
        }
        $result = new Movies();
        $data["rows"] = $result->moviePost($id)[0];
        View::load('movies/single_page', $data);
    }

    public function commentUpdate($post_id)
    {
        session_start();

        // Check if the user is not logged in
        if (!isset($_SESSION['name'])) {
            // Redirect to the login page
            header("Location: " . BURL . "/movies/signin");
            exit();
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $message = $_POST['message'];
            $result = new Movies();
            $result->insertComment($post_id, $name, $message);
        }

        $res = new Movies();
        // Fetch comments and pass them to the view
        $data["rows"] = $res->getComments(); // Implement a getComments method in the model
        View::load('movies/comments', $data);
    }

    public function comments()
    {
        session_start();

        // Check if the user is not logged in
        if (!isset($_SESSION['name'])) {
            // Redirect to the login page
            header("Location: " . BURL . "/movies/signin");
            exit();
        }

        $res = new Movies();
        // Fetch comments and pass them to the view
        $data["rows"] = $res->getComments(); // Implement a getComments method in the model
        View::load('movies/comments', $data);
    }

    public function search()
    {
        session_start();

        // Check if the user is not logged in
        if (!isset($_SESSION['name'])) {
            // Redirect to the login page
            header("Location: " . BURL . "/movies/signin");
            exit();
        }


        $search = isset($_GET["search"]) ? trim($_GET["search"]) : " ";
        if (!empty($search)) {
            $result = new Movies();
            $data["rows"] = $result->searchMovies($search);
            View::load('movies/search', $data);
        } else {
            header("Location:http://localhost/plutox/public/movies");
        }

    }

    public function adventure()
    {
        session_start();

        // Check if the user is not logged in
        if (!isset($_SESSION['name'])) {
            // Redirect to the login page
            header("Location: " . BURL . "/movies/signin");
            exit();
        }
        $result = new Movies();
        $data["rows"] = $result->getAdventure("adventure");
        View::load('movies/adventure', $data);
    }

    public function action()
    {
        session_start();

        // Check if the user is not logged in
        if (!isset($_SESSION['name'])) {
            // Redirect to the login page
            header("Location: " . BURL . "/movies/signin");
            exit();
        }
        $result = new Movies();
        $data["rows"] = $result->getAction("action");
        View::Load('movies/action', $data);
    }

    public function comedy()
    {
        session_start();

        // Check if the user is not logged in
        if (!isset($_SESSION['name'])) {
            // Redirect to the login page
            header("Location: " . BURL . "/movies/signin");
            exit();
        }
        $result = new Movies();
        $data["rows"] = $result->getComedy("comedy");
        View::load('movies/comedy', $data);
    }
}