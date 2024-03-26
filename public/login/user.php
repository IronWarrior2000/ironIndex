<?php
class User{
    private $id;
    private $username;
    private $password;

    private const connector = 'sqlite:user.db';

    static function userDataConnection(){
        return new PDO(User::connector);

    }

   static function getUserLog($username, $password){
        $userDataConnection = User::userDataConnection();
        $query = $userDataConnection->prepare('
            SELECT userId, username, password
            FROM user
            WHERE
                username = :username AND
                password = :password
            LIMIT 1
        ');
        $query->bindValue(":username",$_POST['username'], PDO::PARAM_STR);
        $query->bindValue(":password",$_POST['password'], PDO::PARAM_STR);
        $query->execute([':username' => $username, ':password' => $password]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if($result){
        return new User($result['userId'],$result['username'],$result['password']);
        }else {
            return NULL;
        }

   }
    static function getUserById($id){
        $userDataConnection = User::userDataConnection();
        $query = $userDataConnection->prepare('
            SELECT userId, username, password
            FROM user
            WHERE 
                userId = :userId
            LIMIT 1
        ');
        $query->bindParam(':userId',$id, PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if($result){
            return new User($result['userId'],$result['username'],$result['password']);
            }else {
                return NULL;
        }

    }

    static function createNewUser($username, $password){
        $userDataConnection = User::userDataConnection();
        $query = $userDataConnection->prepare('
            INSERT INTO user (username, password)
            VALUES (:username, :password)
        ');
        $query->execute([
            ':username' => $username,
            ':password' => $password,
        ]);
    }


    static function isUsernameGood($username){
        $userDataConnection = User::userDataConnection();
        $query = $userDataConnection->prepare('
            SELECT userId
            FROM user
            WHERE username = :username
            LIMIT 1
        ');
        $query->execute([':username' => $username]);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return count($result) === 0;

    }
    function __construct($id, $username, $password){
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }

    function getId(){
        return $this->id;
    }

    function getUsername(){
        return $this->username;
    }

    function getPassword(){
        return $this->password;
    }

}

function loggedIn(){
    return isset($_SESSION['user_id']) && (int)$_SESSION['user_id'] > 0;

    }
function hValues($value){
    return htmlentities($value);
}



?>

