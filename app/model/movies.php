<?php
namespace App\model;

use App\core\MoviesDB;
use PDO, PDOException;

class Movies extends MoviesDB
{

    // GET ACTION SINGLE PAGE
    public function getAction($category)
    {
        $sql = "SELECT posts.*, categories.name as category FROM posts, categories WHERE posts.category_id = categories.id";

        if ($category) {
            $sql .= " AND categories.name = '$category'";
        }
        $sql .= " ORDER BY created_at DESC";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

// GET ADVENTURE SINGLE PAGE
    public function getAdventure($cat)
    {
        $sql = "SELECT posts.*, categories.name as category FROM posts, categories WHERE posts.category_id = categories.id";

        if ($cat) {
            $sql .= " AND categories.name = '$cat'";
        }
        $sql .= " ORDER BY created_at DESC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

// GET COMEDY SINGLE PAGE
    public function getComedy($cat)
    {
        $sql = "SELECT posts.*, categories.name as category FROM posts, categories WHERE posts.category_id = categories.id";

        if ($cat) {
            $sql .= " AND categories.name = '$cat'";
        }
        $sql .= " ORDER BY created_at DESC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // INSERTING COMMENTS
    public function insertComment($post_id, $name, $message)
    {
        $sql = "INSERT INTO comment(post_id, name, message) VALUES (:post_id, :name, :message)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":post_id", $post_id, PDO::PARAM_INT);
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->bindParam(":message", $message, PDO::PARAM_STR);
        $stmt->execute();
    }

// GETTING COMMENTS
    public function getComments()
    {
        $sql = "SELECT comment.*, posts.title as title FROM comment, posts WHERE posts.id = comment.post_id ORDER BY created_at DESC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // GETTING MOVIES POSTS
    public function moviePost($post_id = null)
    {
        $sql = "SELECT posts.*, categories.name as category FROM posts, categories WHERE posts.category_id = categories.id";
        if ($post_id != null) {
            $sql .= " AND posts.id = $post_id";
        }

        $sql .= " ORDER BY created_at DESC";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // CREATING NEW POSTS
    public function createPost($cat_id, $title, $image, $description, $released_year, $directed_by, $star, $link, $video_link){
        $sql = "INSERT INTO posts(category_id, title, images, description, release_year, directed_by, main_star, link, video_link)
        VALUES(:cat_id, :title, :image, :description, :released_year, :directed_by, :star, :link, :video_link)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':cat_id', $cat_id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':released_year', $released_year);
        $stmt->bindParam(':directed_by', $directed_by);
        $stmt->bindParam(':star', $star);
        $stmt->bindParam(':link', $link);
        $stmt->bindParam(':video_link', $video_link);
        $stmt->execute();
    }

        // UPDATING NEW POSTS
        public function updatePost($post, $title, $image, $description, $released_year, $directed_by, $star, $link, $video_link)
        {
            $sql = "UPDATE posts SET title = :post, images = :image, description = :description, 
                    release_year = :released_year, directed_by = :directed_by, main_star = :star, link = :link, video_link = :video_link WHERE title = :title";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindParam(':post', $post);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':released_year', $released_year);
            $stmt->bindParam(':directed_by', $directed_by);
            $stmt->bindParam(':star', $star);
            $stmt->bindParam(':link', $link);
            $stmt->bindParam(':video_link', $video_link);
            $stmt->execute();
        }

        
    //DELETING POSTS
    public function deletePost($title){
        $sql = "DELETE FROM posts WHERE title = :title";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":title", $title);
     return $stmt->execute();
    }

     //DELETING COMMENTS
     public function deleteComment($id){
        $sql = "DELETE FROM comment WHERE id = :id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":id", $id);
     return $stmt->execute();
    }

    //COUNTING TOTAL POSTS
    public function postCount(){
        $sql = "SELECT count(*) as total FROM posts";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    // COUNTING ACTION POSTS
    public function actionCount($cat){
        $sql = "SELECT count(*) as total FROM posts WHERE posts.category_id = $cat";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    // COUNTING ADVENTURE POSTS
    public function adventureCount($cat){
        $sql = "SELECT count(*) as total FROM posts WHERE posts.category_id = $cat";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
    // COUNTING COMEDY POSTS
    public function comedyCount($cat){
        $sql = "SELECT count(*) as total FROM posts WHERE posts.category_id = $cat";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
    // COUNTING COMMENT POSTS
    public function commentCount(){
        $sql = "SELECT count(*) as total FROM comment";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
    
    
// SEARCH MOVIES
    public function searchMovies($searchQuery)
    {
        $sql = "SELECT posts.*, categories.name as category FROM posts, categories WHERE posts.category_id = categories.id";
        $sql .= " AND (posts.title LIKE :searchQuery OR posts.description LIKE :searchQuery)";
        $sql .= " ORDER BY created_at DESC";
        $searchPattern = "%$searchQuery%";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':searchQuery', $searchPattern, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

// REGISTER USERS
    public function insertUsers($name, $email, $password)
    {
        $sql = "INSERT INTO users(name, email, password) VALUES (:name, :email, :password)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":name", $name, PDO::PARAM_STR);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->bindParam(":password", $password, PDO::PARAM_STR);
        $stmt->execute();
    }

//LOGIN USERS
    public function getUserByEmail($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(":email", $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    
// ADMIN REGISTER USERS
public function adminRegister($name, $email, $profession, $password)
{
    $sql = "INSERT INTO admin(Admin_name, Admin_email, Admin_profession, Admin_password) VALUES (:name, :email, :profession, :password)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(":name", $name, PDO::PARAM_STR);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->bindParam(":profession", $profession, PDO::PARAM_STR);
    $stmt->bindParam(":password", $password, PDO::PARAM_STR);
    $stmt->execute();
}

    
// ADMIN LOGIN USERS
public function adminLogin($email)
{
    $sql = "SELECT * FROM admin WHERE Admin_email = :email";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


//CODE FOR RESETTING PASSWORD

public function deletetoken($email){
    $sql = "DELETE FROM password_reset WHERE pwdResetEmail = :email";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->execute();
}


public function addtoken($email, $selector, $token, $expires){
    $sql = "INSERT INTO password_reset(pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) 
    VALUES(:email, :selector, :token, :expires)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);
    $stmt->bindParam(":selector", $selector, PDO::PARAM_STR);
    $stmt->bindParam(":token", $token, PDO::PARAM_STR);
    $stmt->bindParam(":expires", $expires, PDO::PARAM_STR);
    $stmt->execute();
}

public function getToken($selector, $currentDate){
    $sql = "SELECT * FROM password_reset WHERE pwdResetSelector = :selector AND pwdResetExpires >= :currentDate";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(":selector", $selector, PDO::PARAM_STR);
    $stmt->bindParam(":currentDate", $currentDate, PDO::PARAM_STR);
    $stmt->execute();
   return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function checkEmail($tokenEmail){
    $sql = "SELECT * FROM users WHERE email = :tokenEmail";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(":tokenEmail", $tokenEmail, PDO::PARAM_STR);
    $stmt->execute();
   return $stmt->fetch(PDO::FETCH_ASSOC);
}

public function update_password_for_Token($pwd, $tokenEmail){
    $sql = "UPDATE users SET password = :pwd WHERE email = :tokenEmail";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(":pwd", $pwd, PDO::PARAM_STR);
    $stmt->bindParam(":tokenEmail", $tokenEmail, PDO::PARAM_STR);
    $stmt->execute();
}

public function deleteEmail_after_token($tokenEmail){
    $sql = "DELETE FROM password_reset WHERE pwdResetEmail = :tokenEmail";
    $stmt = $this->connect()->prepare($sql);
    $stmt->bindParam(":tokenEmail", $tokenEmail, PDO::PARAM_STR);
    $stmt->execute();
}






}