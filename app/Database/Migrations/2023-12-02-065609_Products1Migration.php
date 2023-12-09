<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Products1Migration extends Migration
{
    public function up()
    {
        $this->forge->addField(array(
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'category_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
            ],
            'product' => [
                'type'       => 'VARCHAR',
                'constraint' => '150',
            ],
            'price' => [
                'type' => 'INT',
                'null' => true,
            ],
            'model' => [
                'type' => 'VARCHAR',
                'null' => true,
            ],
        ));
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('category_id', 'category', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('products'); 
    }

    public function down()
    {
        $this->forge->createTable('products')
    }
}
