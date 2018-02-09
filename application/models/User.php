<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model {

    public function attemptLogin($user,$password)
    {
        if (! $user) return null; // both required, else immediate failure
        if (! $password) return null; // both required, else immediate failure

        // fetch the user
        $sql = "SELECT * FROM users WHERE user = ?";
        $u = $this->db->query($sql, array(strtolower($user)))->row();
        // unset($u->id);
        if (! $u->password) return null; // user not found (or blank password in the database), automatic failure

        // check the password field, a MD5 with 8-byte salt
        $salt  = substr($u->password,0,8);
        $crypt = $salt . md5($salt . $password);

        // if it matched, hand back the User; if not, hand back a null
        if ($crypt == $u->password) return $u;
        return null;
    }

    public function encryptPassword($password)
    {
        $salt  = substr(md5(mt_rand()),0,8); // generate 8 random bytes for a salt, well not entirely random but very good
        $crypt = $salt . md5($salt . $password);
        return $crypt;
    }

    public function setPassword($id, $password)
    {
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        $this->db->query($sql, array($password, $id));
    }

}
