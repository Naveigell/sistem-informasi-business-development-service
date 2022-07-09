<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRegionalCoordinatorTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'thumbnail' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'region' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'leader' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'address' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('regional_coordinators');
    }

    public function down()
    {
        $this->forge->dropTable('regional_coordinators');
    }
}
