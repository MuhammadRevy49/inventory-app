<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class CreateStockMovements extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'product_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'user_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'type' => ['type' => 'ENUM', 'constraint' => ['IN', 'OUT']],
            'qty' => ['type' => 'INT', 'constraint' => 11],
            'destination' => ['type' => 'VARCHAR', 'constraint' => 255],
            'status' => ['type' => 'ENUM', 'constraint' => ['Active/Installed', 'Returned', 'Damaged'], 'default' => 'Active/Installed'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('product_id', 'products', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('stock_movements');
    }

    public function down()
    {
        $this->forge->dropTable('stock_movements');
    }
}