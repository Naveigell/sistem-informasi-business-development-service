<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDiscussionForumChatsTable extends Migration
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
            'forum_id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'nullable' => true,
            ],
            'sender_id' => [
                'type' => 'BIGINT',
                'constraint' => 20,
                'unsigned' => true,
                'nullable' => true,
            ],
            'content' => [
                'type' => 'TEXT',
            ],
            'created_at' => [
                'type' => 'timestamp',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('forum_id', 'discussion_forums', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('sender_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('discussion_forum_chats');
    }

    public function down()
    {
        $this->forge->dropTable('discussion_forum_chats');
    }
}
