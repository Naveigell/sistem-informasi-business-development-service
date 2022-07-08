<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateVisionMissionTable extends Migration
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
        $this->forge->createTable('vision_missions');
    }

    public function down()
    {
        $this->forge->dropTable('vision_missions');
    }
}
