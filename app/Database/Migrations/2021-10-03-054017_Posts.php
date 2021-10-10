<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Posts extends Migration
{
    public function up()
    {
        $this->forge->addField([
            //             "userId": 1,
            //             "id": 4,
            //             "title": "eum et est occaecati",
            //             "body": "ullam
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE,
            ],
            'userId' => [
                'type' => 'INT',
                'length' => '100',
            ],
            'title' => [
                'type' => 'TEXT'
            ],
            'body' => [
                'type' => 'TEXT'
            ]
        ]);

        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('posts');
    }

    public function down()
    {
        $this->forge->dropTable('posts');
    }
}
