<?php


namespace app\models;

use app\lib\Db;

class Account
{
    public function login($post){
        if(trim($post['login'])){
            if(trim($post['password'])){
                $db = new Db();
                $hash = md5($post['password']);
                $result = $db->select("select login, id from usr where login = ? AND password = ?", array($post['login'], $hash));
                if($result){
                    $_SESSION['auth']['login'] = $result[0]['login'];
                    $_SESSION['auth']['id'] = $result[1]['id'];
                    return true;
                }else{
                    return 'Неверное сочитание логина и пароля';
                }
            }else{
                return 'Введите пароль';
            }
        }else{
            return 'Введите логин!';
        }
    }
    public function register($post)
    {
            return $this->valid($post);
    }

    protected function valid($arr)
    {
        if (strlen(trim($arr['login'])) < 5) {
            return 'Слишком которкий логин. Логин должен быть длиннее 4-х символов';
        } elseif (strlen(trim($arr['password'])) < 9) {
            return 'Слишком которкий пароль. Пароль должен быть длиннее 8-и символов';
        } elseif (!filter_var($arr['email'], FILTER_VALIDATE_EMAIL)) {
            return 'Некорректная почта';
        } elseif ($arr['password'] != $arr['password2']){
            return 'Пароли не совпадают';
        }else{
            $db = new Db();
            if(!$db->select("select email from usr where email = ?", array($arr['email']))){
                if(!$db->select("select login from usr where login = ?", array($arr['login']))){
                    $pass = md5($arr['password']);
                    return $db->insert("insert into usr(login, password, email) values(?, ?, ?)", array($arr['login'], $pass, $arr['email']));
                }else{
                    return 'Данный логин уже зарегистрирован';
                }
            }else{
                return 'Данная почта уже зарегистрирована';
            }
        }
    }
}