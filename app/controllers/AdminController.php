<?php
namespace App\controllers;

use App\core\View;
use App\model\Movies;
use function App\config\url;

class AdminController
{
   public function index()
   {
      session_start();
      if(!isset($_SESSION['profession']) && !isset($_SESSION['name'])){
         header('Location:'. BURL . '/admin/login');
         exit();
      }
      
      $result = new Movies();
      $data['total'] = $result->postCount();
      $data["action"] = $result->actionCount(1);
      $data["adventure"] = $result->adventureCount(2);
      $data["comedy"] = $result->comedyCount(3);
      $data["comment"] = $result->commentCount();

      // Pass the merged data to the view
      View::Load("admin/index", $data);
   }

   public function create()
   {
      session_start();
      if(!isset($_SESSION['profession']) && !isset($_SESSION['name'])){
         header('Location:'. BURL . '/admin/login');
         exit();
      }

      $result = new Movies();

      if (isset($_POST["submit"])) {
         $cat_id = $_POST['cat_id'];
         $title = $_POST['title'];
         $star = $_POST['star'];
         $released_year = $_POST['release_year'];
         $link = $_POST['link'];
         $video_link = $_POST['video_link'];
         $directed_by = $_POST['directed_by'];
         $description = $_POST['description'];

         if (empty($_FILES["images"]["tmp_name"])) {
            echo "<script> alert('Image Does Not Exist'); </script>";
         } else {
            $fileName = $_FILES["images"]["name"];
            $tmpName = $_FILES["images"]["tmp_name"];

            $img_ex = pathinfo($fileName, PATHINFO_EXTENSION);
            $img_extension = strtolower($img_ex);

            $allowed_exs = array('jpg', 'jpeg', 'png');

            if (!in_array($img_extension, $allowed_exs)) {
               echo
                  "
             <script>
               alert('Invalid Image Extension');
             </script>
             ";
            } else {
               // Define the server path for the upload directory
               $uploadDirectory = dirname(__DIR__) . '/../public/assets/img/';

               // Create a unique filename for the uploaded image
               $newImageName = uniqid() . '_' . $fileName;

               $imagePath = $uploadDirectory . $newImageName;
               if (move_uploaded_file($tmpName, $imagePath)) {
                  // Extract only the filename
                  $filenameOnly = $newImageName;

                  // Image uploaded successfully
                  $result->createPost($cat_id, $title, $filenameOnly, $description, $released_year, $directed_by, $star, $link, $video_link);
                  echo "Image uploaded and post created successfully!";
               }
            }
         }
      }

      View::Load("admin/create");
   }

   public function update()
   {
      session_start();
      if(!isset($_SESSION['profession']) && !isset($_SESSION['name'])){
         header('Location:'. BURL . '/admin/login');
         exit();
      }

       $result = new Movies();
   
       if (isset($_POST["submit"])) {
           $post = $_POST['post'];
           $title = $_POST['title'];
           $star = $_POST['star'];
           $released_year = $_POST['release_year'];
           $link = $_POST['link'];
           $video_link = $_POST['video_link'];
           $directed_by = $_POST['directed_by'];
           $description = $_POST['description'];
   
           if (empty($_FILES["images"]["tmp_name"])) {
               echo "<script> alert('Image Does Not Exist'); </script>";
           } else {
               $fileName = $_FILES["images"]["name"];
               $tmpName = $_FILES["images"]["tmp_name"];
   
               $img_ex = pathinfo($fileName, PATHINFO_EXTENSION);
               $img_extension = strtolower($img_ex);
   
               $allowed_exs = array('jpg', 'jpeg', 'png');
   
               if (!in_array($img_extension, $allowed_exs)) {
                   echo "
                <script>
                  alert('Invalid Image Extension');
                </script>
                ";
               } else {
                   // Define the server path for the upload directory
                   $uploadDirectory = dirname(__DIR__) . '/../public/assets/img/';
   
                   // Create a unique filename for the uploaded image
                   $newImageName = uniqid() . '_' . $fileName;
   
                   $imagePath = $uploadDirectory . $newImageName;
                   if (move_uploaded_file($tmpName, $imagePath)) {
                       // Extract only the filename
                       $filenameOnly = $newImageName;
   
                       // Image uploaded successfully
                       $result->updatePost($post, $title, $filenameOnly, $description, $released_year, $directed_by, $star, $link, $video_link);
                       echo "Image uploaded and post updated successfully!";
                   } else{
                     echo 'not loade';
                   }
               }
           }
       }
       View::Load("admin/update");
   }

   public function comment()
   { 
      session_start();
      if(!isset($_SESSION['profession']) && !isset($_SESSION['name'])){
         header('Location:'. BURL . '/admin/login');
         exit();
      }
         $res = new Movies();
         // Fetch comments and pass them to the view
         $data["rows"] = $res->getComments(); // Implement a getComments method in the model
         View::load('admin/comment', $data);
     
      // View::Load("admin/comment");
   }

   public function deleteComment($id){
      $result = new Movies();
      $result->deleteComment($id);
      echo "comment deleted successfully!";

      $res = new Movies();
         // Fetch comments and pass them to the view
         $data["rows"] = $res->getComments(); // Implement a getComments method in the model
         View::load('admin/comment', $data);
   }


   public function delete()
   {
      session_start();
      if(!isset($_SESSION['profession']) && !isset($_SESSION['name'])){
         header('Location:'. BURL . '/admin/login');
         exit();
      }
      $result = new Movies();
      if(isset($_POST['submit'])){
         $title = $_POST['title'];
         $result->deletePost($title);
         echo "post deleted successfully!";
      }
      View::Load("admin/delete");
   }

   public function login()
   {
      $error = [];

      if(isset($_POST['submit'])){
         $email = htmlspecialchars(trim($_POST['adminEmail']));
         $password = htmlspecialchars(trim($_POST['adminPassword']));

         $result = new Movies();
         $user = $result->adminLogin($email);

         if ($user && password_verify($password, $user['Admin_password'])) {
            session_start();
            $_SESSION['name'] = $user['Admin_name'];
            $_SESSION['profession'] = $user['Admin_profession'];

            header("Location:" .BURL. "/admin/index");
            exit();
         } else{
            $error[] = 'Password is incorrect or invalid'; 
         }
      }
      $data['error']  = $error;
      View::Load("admin/login", $data);
   }

   public function register()
   {
     $error = [];
      if(isset($_POST['submit'])){
         $name = htmlspecialchars(trim($_POST['adminName']));
         $profession = htmlspecialchars(trim($_POST['adminProfession']));
         $email = htmlspecialchars(trim($_POST['adminEmail']));
         $password = password_hash($_POST['adminPassword'], PASSWORD_DEFAULT);

         if (!preg_match('/^[a-zA-Z0-9]{6,12}$/', $name)) {
            $error[] = 'username must be 6-12 chars & alphanumeric.';
        }  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error[] = 'email must be a valid email address.';
        } if(empty($error)) {
            $result = new Movies();
            $result->adminRegister($name, $email, $profession, $password);
            
            // Redirect to the login page after successful registration
            header("Location: " .BURL. "/admin/login");
            exit();
        }
      }
      $data['error'] = $error;
      View::Load("admin/register", $data);
   }

   public function logout(){
      session_start();

      session_destroy();

      header("Location:". BURL .'/admin/login');
      exit();
   }

}