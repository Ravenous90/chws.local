<?php

use yii\db\Migration;


/**
 * Handles the creation of table `users`.
 */
class m180829_131508_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'username' => $this->string(255)->notNull(),
            'email' => $this->string(255)->notNull(),
            'password' => $this->string(255)->notNull(),
            'authKey' => $this->string(255),
            'accessToken' => $this->string(255),
            'isActive' => $this->boolean()->defaultValue(0),
        ]);

        $this->createTable('meetings', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'description' => $this->text()->notNull(),
            'date' => $this->dateTime(),
        ]);

        $this->createTable('seats', [
            'id' => $this->primaryKey(),
            'coordinate_x' => $this->double()->notNull(),
            'coordinate_y' => $this->double()->notNull(),
            'seat_type' => $this->string(255)->notNull(), // тип места (прямоугольная область вокруг точки центра, прописать в модели размеры)
        ]);

        $this->createTable('relations', [
            'user_id' => $this->integer()->notNull(),
            'meeting_id' => $this->integer()->notNull(),
            'seat_id' => $this->integer()->notNull(),
            'status' => $this->string(255)->notNull()
        ]);

        $this->createIndex(
            'idx-relations-user_id',
            'relations',
            'user_id'
        );

        $this->addForeignKey(
            'fk-relations-user_id',
            'relations',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx-relations-meeting_id',
            'relations',
            'meeting_id'
        );

        $this->addForeignKey(
            'fk-relations-meeting_id',
            'relations',
            'meeting_id',
            'meetings',
            'id',
            'CASCADE'
        );
        $this->createIndex(
            'idx-relations-seat_id',
            'relations',
            'seat_id'
        );

        $this->addForeignKey(
            'fk-relations-seat_id',
            'relations',
            'seat_id',
            'seats',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('users');
        $this->dropTable('meetings');
        $this->dropTable('seats');
        $this->dropTable('relations');

        $this->dropForeignKey(
            'fk-post-user_id',
            'relations'
        );

        $this->dropIndex(
            'idx-post-user_id',
            'relations'
        );

        $this->dropForeignKey(
            'fk-post-meeting_id',
            'relations'
        );

        $this->dropIndex(
            'idx-post-meeting_id',
            'relations'
        );

        $this->dropForeignKey(
            'fk-post-seat_id',
            'relations'
        );

        $this->dropIndex(
            'idx-post-seat_id',
            'relations'
        );
    }
}
