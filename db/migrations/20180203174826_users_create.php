<?php


use Phinx\Migration\AbstractMigration;

class UsersCreate extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
       // create the table users
      $table = $this->table('users');
      $table->addColumn('uid', 'string', ['limit' => 13])
            ->addColumn('user', 'string', ['limit' => 32])
            ->addColumn('password', 'string', ['limit' => 40])
            ->addColumn('email', 'string', ['limit' => 96])
            ->addColumn('created','datetime')
            ->addColumn('updated','datetime', ['null' => true])
            ->addIndex(['uid'])
            ->save();
    }
}
