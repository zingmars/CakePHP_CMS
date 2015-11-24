<?php
use Migrations\AbstractMigration;

class Initial extends AbstractMigration
{
    public function up()
    {
        $table = $this->table('auth_tokens');
        $table
            ->addColumn('userid', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('public_token', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('private_token', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('type', 'integer', [
                'default' => 0,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('state', 'integer', [
                'default' => 1,
                'limit' => 1,
                'null' => false,
            ])
            ->addColumn('createdate', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('lastusedate', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addIndex(
                [
                    'userid',
                ]
            )
            ->create();

        $table = $this->table('comments');
        $table
            ->addColumn('postid', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('userid', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('comment', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('date', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('editdate', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'postid',
                ]
            )
            ->addIndex(
                [
                    'userid',
                ]
            )
            ->create();

        $table = $this->table('filedata');
        $table
            ->addColumn('filename', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('name', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('upload_date', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('lastedit_date', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('accessflags', 'integer', [
                'default' => 1,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('password', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $table = $this->table('pagedata', ['id' => false, 'primary_key' => ['elementid']]);
        $table
            ->addColumn('elementid', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('pageid', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('elementname', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('elementvalue', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'pageid',
                ]
            )
            ->create();

        $table = $this->table('pages');
        $table
            ->addColumn('name', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('url', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('accessflags', 'integer', [
                'default' => 1,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('password', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $table = $this->table('picturedata');
        $table
            ->addColumn('filename', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('name', 'integer', [
                'default' => null,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('upload_date', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('lastedit_date', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('accessflags', 'integer', [
                'default' => 1,
                'limit' => 11,
                'null' => true,
            ])
            ->addColumn('password', 'text', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->create();

        $table = $this->table('posts');
        $table
            ->addColumn('title', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('shortbody', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('longbody', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('createdate', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('lasteditdate', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => true,
            ])
            ->addColumn('creator', 'integer', [
                'default' => 1,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('lasteditor', 'integer', [
                'default' => 1,
                'limit' => 2,
                'null' => false,
            ])
            ->addColumn('editreason', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('showeditreason', 'boolean', [
                'default' => 0,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('commentsallowed', 'boolean', [
                'default' => 1,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'creator',
                ]
            )
            ->addIndex(
                [
                    'creator',
                ]
            )
            ->addIndex(
                [
                    'lasteditor',
                ]
            )
            ->create();

        $table = $this->table('quotes');
        $table
            ->addColumn('quote', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('author', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('date', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->create();

        $table = $this->table('translationstrings', ['id' => false, 'primary_key' => ['']]);
        $table
            ->addColumn('string', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('value', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addIndex(
                [
                    'string',
                ],
                ['unique' => true]
            )
            ->create();

        $table = $this->table('users', ['id' => false, 'primary_key' => ['uid']]);
        $table
            ->addColumn('uid', 'integer', [
                'autoIncrement' => true,
                'default' => null,
                'limit' => 11,
                'null' => false,
            ])
            ->addColumn('username', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('visiblename', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('password', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('registerdate', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('lastlogin', 'datetime', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('lastloginip', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('lastloginsession', 'text', [
                'default' => null,
                'limit' => null,
                'null' => false,
            ])
            ->addColumn('privlvl', 'integer', [
                'default' => 0,
                'limit' => 11,
                'null' => false,
            ])
            ->create();

        $this->table('auth_tokens')
            ->addForeignKey(
                'userid',
                'users',
                'uid',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('comments')
            ->addForeignKey(
                'postid',
                'posts',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'userid',
                'users',
                'uid',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('pagedata')
            ->addForeignKey(
                'pageid',
                'pages',
                'id',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

        $this->table('posts')
            ->addForeignKey(
                'creator',
                'users',
                'uid',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'creator',
                'users',
                'uid',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->addForeignKey(
                'lasteditor',
                'users',
                'uid',
                [
                    'update' => 'RESTRICT',
                    'delete' => 'RESTRICT'
                ]
            )
            ->update();

    }

    public function down()
    {
        $this->table('auth_tokens')
            ->dropForeignKey(
                'userid'
            )
            ->update();

        $this->table('comments')
            ->dropForeignKey(
                'postid'
            )
            ->dropForeignKey(
                'userid'
            )
            ->update();

        $this->table('pagedata')
            ->dropForeignKey(
                'pageid'
            )
            ->update();

        $this->table('posts')
            ->dropForeignKey(
                'creator'
            )
            ->dropForeignKey(
                'creator'
            )
            ->dropForeignKey(
                'lasteditor'
            )
            ->update();

        $this->dropTable('auth_tokens');
        $this->dropTable('comments');
        $this->dropTable('filedata');
        $this->dropTable('pagedata');
        $this->dropTable('pages');
        $this->dropTable('picturedata');
        $this->dropTable('posts');
        $this->dropTable('quotes');
        $this->dropTable('translationstrings');
        $this->dropTable('users');
    }
}
