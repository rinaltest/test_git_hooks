<?php
    class User extends AppModel
    {
        public function login ($email, $password)
        {
//            $params = array(
//                "conditions" => array(
//                    "user_email" => $email,
//                    "password" => $password
//                )
//            );
//            $result = $this->find('first', $params);
            $result = $this->query("SELECT id, user_name, user_email, gender, profile FROM users WHERE user_email='".$email."' AND password='".$password."'");
            return $result;
        }
    }
?>