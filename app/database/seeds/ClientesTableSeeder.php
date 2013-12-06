<?php
class ClientesTableSeeder extends Seeder {
  public function run()
  {
    DB::table('clientes')->delete();

    $clientes = array(
      array(
        'telefono'  => '6049999',
        'nombre'  => 'Sip Telecomunicaciones LTDA',
        'direccion' => 'Cra 49 Nro 49-76 Oficina 1207' ,
        'notas' => 'Llevar Siempre Caliente' ,
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
      ),
      array(
        'telefono'  => '2684904',
        'nombre'  => 'R.P MEDICOS',
        'direccion' => 'TRASVERSAL 6 #45-135' ,
        'notas' => 'Ext 14' ,
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
      ),
      array(
        'telefono'  => '3120425',
        'nombre'  => 'CLARE TOBON',
        'direccion' => 'CL 14 #30-97' ,
        'notas' => '' ,
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
      ),
      array(
        'telefono'  => '3167300',
        'nombre'  => 'SIMELKA',
        'direccion' => 'CL 19 #43B-44 B/ COLOMBIA' ,
        'notas' => '' ,
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
      ),
      array(
        'telefono'  => '2854111',
        'nombre'  => 'SAMUEL BARRA',
        'direccion' => 'CL 12 SUR 50G-21' ,
        'notas' => '' ,
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
      ),
      array(
        'telefono'  => '4449680',
        'nombre'  => 'COLINAS DEL POBLADO ',
        'direccion' => 'OFICINA 401' ,
        'notas' => '' ,
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
      ),
      array(
        'telefono'  => '4449985',
        'nombre'  => 'TOYOTA',
        'direccion' => 'CR 46 #40-96' ,
        'notas' => '' ,
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
      ),
      array(
        'telefono'  => '4600700',
        'nombre'  => 'IUSH CAROLINA VELEZ',
        'direccion' => 'BLOQUE ADMINISTRATIVO' ,
        'notas' => '' ,
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
      ),
      array(
        'telefono'  => '3122711',
        'nombre'  => 'IGUILLERMO ESCOBAR',
        'direccion' => 'CL 11B #40A-90 INT.107' ,
        'notas' => '' ,
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
      ),
      array(
        'telefono'  => '3165375',
        'nombre'  => 'ISAGEN CI VERONICA DUQUE',
        'direccion' => '11 B SUR' ,
        'notas' => '' ,
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
      ),
      array(
        'telefono'  => '3165375',
        'nombre'  => 'LUISA BERMUDEZ',
        'direccion' => 'CL 11B #40A-90 INT.130' ,
        'notas' => '' ,
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
      ),
      array(
        'telefono'  => '3545694',
        'nombre'  => 'TERMINAL DEL SUR',
        'direccion' => 'OFIC. 387' ,
        'notas' => '' ,
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
      ),
      array(
        'telefono'  => '4449985',
        'nombre'  => 'TOYOTA JOHN JAIRO',
        'direccion' => 'CR 46 #40-96' ,
        'notas' => '' ,
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
      ),
    );

    DB::table('clientes')->insert( $clientes );
  }
}