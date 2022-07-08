<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHistoryTable extends Migration
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
            'content' => [
                'type' => 'TEXT',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('histories');
    }

    public function down()
    {
        $this->forge->dropTable('histories');
    }
}
