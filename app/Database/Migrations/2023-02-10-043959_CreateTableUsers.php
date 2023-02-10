<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableUsers extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id'=>[
                'type'              =>  'INT',
                'constraint'        =>  5,
                'unsigned'          =>  TRUE,
                'auto_increment'    =>  TRUE,
            ],
            'username'=>[
                'type'              =>  'VARCHAR',
                'constraint'        =>  100,
            ],
            'email'=>[
                'type'              =>  'VARCHAR',
                'constraint'        =>  100,
            ],
            'password'=>[
                'type'              =>  'VARCHAR',
                'constraint'        =>  255,
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
        ]);

        $this->forge->addKey('id');
        $this->forge->createTable('users');
    }

    public function down()
    {
        //
        $this->forge->dropTable('users');
    }
}
