<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('user', 20)->unique();
            $table->string('senha', 100);
            $table->tinyInteger('ativo')->default(0);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::create('permissao', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('nome', 100);
            $table->string('nickname', 100);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });


        Schema::create('user_permissao', function (Blueprint $table) {
            $table->unsignedInteger('id_user');
            $table->foreign('id_user')->references('id')->on('user')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('id_permissao');
            $table->foreign('id_permissao')->references('id')->on('permissao')->onDelete('cascade')->onUpdate('cascade');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('user')->insert(
            ['user' => 'admin', 'senha' => MD5(123456), 'ativo' => 1]
        );

        DB::table('permissao')->insert(
            ['nome' => 'User', 'nickname' => 'USER']
        );

        DB::table('user_permissao')->insert(
            ['id_user' => 1, 'id_permissao' => 1]
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_permissao');
        Schema::dropIfExists('user');
        Schema::dropIfExists('permissao');
    }
}


/*
DROP TABLE IF EXISTS `permissao`;
CREATE TABLE IF NOT EXISTS `permissao` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `ativo` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_2` (`user`),
  KEY `user` (`user`),
  KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_permissao`
--

DROP TABLE IF EXISTS `user_permissao`;
CREATE TABLE IF NOT EXISTS `user_permissao` (
  `id_user` int(11) NOT NULL,
  `id_permissao` tinyint(4) NOT NULL,
  KEY `id_permissao` (`id_permissao`),
  KEY `id_user` (`id_user`,`id_permissao`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `user`
--

--
-- Limitadores para a tabela `user_permissao`
--
ALTER TABLE `user_permissao`
  ADD CONSTRAINT `user_permissao_ibfk_2` FOREIGN KEY (`id_permissao`) REFERENCES `permissao` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_permissao_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

 * */