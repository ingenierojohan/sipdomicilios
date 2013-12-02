<?php
class EstadosTableSeeder extends Seeder {
  public function run()
  {
    DB::table('estados')->delete();

    $estados = array(
      array(
        'id' => 0,
        'descripcion'=> 'DEFAULT--NOTHING',
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
      ),
      // Estados Rango del 100 Tabla asteriscids
      array(
        'id' => 101,
        'descripcion'=> 'Ingresa Llamada desde Asterisk -- tabla:asteriskcids -- ASTERISK ',
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
      ),
      array(
        'id' => 102,
        'descripcion'=> 'Llamada es Leida por la App, y Copiada a sipdomicilioscids -- tabla:asteriskcids -- APP',
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
      ),
      array(
        'id' => 103,
        'descripcion'=> 'Llamada Colgada o Finalizada, es Borrada de asteriskcids -- tabla:asteriskcids -- ASTERISK o APP',
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
      ),
      // Estados Rango del 200 Tabla sipdomicilioscids
      array(
        'id' => 201,
        'descripcion'=> 'Ingresa llamada a sipdomicilioscids como nueva -- tabla:sipdomicilioscids -- APP',
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
      ),
      array(
        'id' => 202,
        'descripcion'=> 'Llamada con domicilio asignado -- tabla:sipdomicilioscids -- APP',
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
      ),
      array(
        'id' => 203,
        'descripcion'=> 'Llamada con COLGADA -- tabla:sipdomicilioscids -- APP',
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
      ),
      array(
        'id' => 204,
        'descripcion'=> 'Llamada con domicilio Finalizado -- tabla:sipdomicilioscids -- APP',
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
      ),
      array(
        'id' => 205,
        'descripcion'=> 'Llamada con domicilio Cancelado -- tabla:sipdomicilioscids -- APP',
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
      ),

      // Estados Rango del 300 Tabla domicilios
      array(
        'id' => 301,
        'descripcion'=> 'Domicilio en estado asignado -- tabla:domicilios -- APP',
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
      ),
      array(
        'id' => 302,
        'descripcion'=> 'Domicilio en estado Entregado -- tabla:domicilios -- APP',
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
      ),
      array(
        'id' => 304,
        'descripcion'=> 'Domicilio en estado Cancelado -- tabla:domicilios -- APP',
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
      ),

      // Estados Rango del 400 Tabla clientes
      array(
        'id' => 401,
        'descripcion'=> 'Cliente Sin Domicilios -- tabla:clientes -- APP',
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
      ),
      array(
        'id' => 402,
        'descripcion'=> 'Cliente Con Domicilios -- tabla:clientes -- APP',
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
      ),
      array(
        'id' => 403,
        'descripcion'=> 'Cliente Con Betado -- tabla:clientes -- APP',
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
      ),
      array(
        'id' => 405,
        'descripcion'=> 'Cliente Estrella -- tabla:clientes -- APP',
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
      ),
    );

    DB::table('estados')->insert( $estados );
  }
}
