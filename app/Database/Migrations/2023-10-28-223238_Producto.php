<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Producto extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             =>['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nombre'         =>['type' => 'varchar', 'constraint' => 200,],
            'descripcion'    =>['type' => 'text', 'null' => true],
            'imagen'         =>['type' => 'varchar', 'constraint' => 150,'null'=> true],
            'precio'         =>['type' => 'float', 'default' => 0.0],
            'estado'         =>['type' => 'tinyint', 'default' => 1],
            'created_at'     =>['type' => 'datetime'],           
            'updated_at'     =>['type' => 'datetime', 'null' => true],
            'deleted_at'     =>['type' => 'datetime', 'null' => true],

        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('productos', true);
    }

    public function down()
    {
        $this->forge->dropTable('productos', true);
    }
}
