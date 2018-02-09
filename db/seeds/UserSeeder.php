<?php


use Phinx\Seed\AbstractSeed;

class UserSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
      $base62 = new Tuupola\Base62;
      $data = [
        [
          'uid'      => $base62->encode(random_bytes(128)),
          'user'     => 'admin',
          'email'    => 'fredw@northriverboats.com',
          'password' => $this->encryptPassword('booger'),
          'created'  => date('Y-m-d H:i:s'),
          'updated'  => date('Y-m-d H:i:s')
        ],[
          'uid'      => $base62->encode(random_bytes(128)),
          'user'     => 'fwarren',
          'email'    => 'fred.warren@gmail.com',
          'password' => $this->encryptPassword('booger'),
          'created'  => date('Y-m-d H:i:s'),
          'updated'  => date('Y-m-d H:i:s')
        ]
      ];

      $users = $this->table('users');
      $users->truncate();
      $users->insert($data)->save();

    }
    
  public function encryptPassword($password)
  {
      $salt  = substr(md5(mt_rand()),0,8); // generate 8 random bytes for a salt, well not entirely random but very good
      $crypt = $salt . md5($salt . $password);
      return $crypt;
  }
}
