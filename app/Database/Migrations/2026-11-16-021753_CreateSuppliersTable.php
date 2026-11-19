<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class CreateSuppliersTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 150],
            'phone' => ['type' => 'VARCHAR', 'constraint' => 20, 'null' => true],
            'address' => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('suppliers');
    }

    public function down()
    {
        $this->forge->dropTable('suppliers');
    }
}