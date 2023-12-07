<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products1Migration extends Migration
{
    public function up()
    {
        $this->forge->addField(array(
            'blog_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'blog_title' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'blog_description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ));
        $this->forge->addKey('blog_id', true);
        $this->forge->createTable('blog'); 
    }

    public function down()
    {
        //
    }
}
