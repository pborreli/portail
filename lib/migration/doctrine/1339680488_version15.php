<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version15 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->dropTable('departement');
        $this->createTable('partenaire', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => '8',
              'autoincrement' => '1',
              'primary' => '1',
             ),
             'nom' => 
             array(
              'type' => 'string',
              'length' => '100',
             ),
             'logo' => 
             array(
              'type' => 'string',
              'length' => '100',
             ),
             'url' => 
             array(
              'type' => 'string',
              'length' => '255',
             ),
             'description' => 
             array(
              'type' => 'string',
              'length' => '',
             ),
             'created_at' => 
             array(
              'notnull' => '1',
              'type' => 'timestamp',
              'length' => '25',
             ),
             'updated_at' => 
             array(
              'notnull' => '1',
              'type' => 'timestamp',
              'length' => '25',
             ),
             ), array(
             'primary' => 
             array(
              0 => 'id',
             ),
             'collate' => 'utf8_unicode_ci',
             'charset' => 'utf8',
             ));
        $this->removeColumn('annonce', 'ville');
        $this->removeColumn('annonce', 'departement_id');
        $this->addColumn('annonce', 'lieu', 'string', '', array(
             ));
    }

    public function down()
    {
        $this->createTable('departement', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => '8',
              'autoincrement' => '1',
              'primary' => '1',
             ),
             'num' => 
             array(
              'type' => 'integer',
              'notnull' => '1',
              'length' => '2',
             ),
             'name' => 
             array(
              'type' => 'string',
              'notnull' => '1',
              'length' => '50',
             ),
             'created_at' => 
             array(
              'notnull' => '1',
              'type' => 'timestamp',
              'length' => '25',
             ),
             'updated_at' => 
             array(
              'notnull' => '1',
              'type' => 'timestamp',
              'length' => '25',
             ),
             ), array(
             'type' => '',
             'indexes' => 
             array(
             ),
             'primary' => 
             array(
              0 => 'id',
             ),
             'collate' => 'utf8_unicode_ci',
             'charset' => 'utf8',
             ));
        $this->dropTable('partenaire');
        $this->addColumn('annonce', 'ville', 'string', '', array(
             ));
        $this->addColumn('annonce', 'departement_id', 'integer', '8', array(
             ));
        $this->removeColumn('annonce', 'lieu');
    }
}