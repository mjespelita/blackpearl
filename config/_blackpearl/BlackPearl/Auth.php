<?php

namespace Framework\BlackPearl;

use App\Models\User;
use Framework\BlackPearl\Redirect;

class Auth
{
    public static $name;
    public static $email;
    public static $password;

    public static function check()
    {
        session_start();
        if ($_SESSION['user'] === "" || !isset($_SESSION['user'])) {
            return Redirect::to('/login');
        }
    }

    public static function register($name, $email, $password)
    {
        self::$name = $name;
        self::$email = $email;
        self::$password = $password;

        // check if email exists
        $emailChecker = User::where('email', $email)->count();
        if ($emailChecker > 0) {
            return false;
        } else {
            session_start();

            $_SESSION['user'] = $email;

            return User::create([
                'name' => $name,
                'email' => $email,
                'password' => $password
            ]);
        }
    }

    public static function login($email, $password)
    {
        self::$email = $email;
        self::$password = $password;

        // check if user exists
        $userChecker = User::where('email', $email)->count();
        $user = User::where('email', $email)->first();
        if ($userChecker >= 1) {
            if (password_verify($password, $user->password)) {
                session_start();
                $_SESSION['user'] = $email;
                return true;
            }
            return false;
        } else {
            return false;
        }
    }

    public static function user()
    {
        return User::where('email', $_SESSION['user'])->first();
    }

    public static function logout()
    {
        session_start();
        $_SESSION['user'] = "";
        return Redirect::to('/login');
    }
}