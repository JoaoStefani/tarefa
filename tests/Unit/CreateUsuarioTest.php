<?php

namespace Tests\Unit;

use App\Models\Cep;
use App\Models\Empresa;
use App\Models\Usuario;
use App\Models\UsuarioTipo;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateUsuarioTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreate()
    {
        /*$e = new Empresa([
            'nome' => 'God Empresa',
            'cpf_cnpj' => '16921495000121',
            'im' => 'im123',
            'ie' => 'ie456',
            'email' => 'teste@asd.com',
            'end_cep' => '14020350',
            'end_uf' => 'SP',
            'end_id_cidade' => Cep::getCidadesUf('SP')[25]->value,
            'end_cidade' => Cep::getCidadesUf('SP')[25]->text,
            'end_bairro' => 'Jd São Luiz',
            'end_numero' => '1020',
            'end_complemento' => 'apto 23',
            'tel_ddd' => '16',
            'tel_numero' => '991378813',
        ]);
        $this->assertTrue($e->save());

        $senha = '12345';

        $u = new Usuario([
            'nome' => 'Usuário Teste',
            'usuario'  => 'usuario.teste',
            'senha' => $senha,
        ]);

        $this->assertTrue($u->save());

        $res = $u->addUsuarioToEmpresa(
            $e->uuid,
            UsuarioTipo::query()->where('nome', '=', 'Administrador')->first()->pluck('uuid')[0]
        );
        $this->assertTrue($res);

        //testa o login
        $this->assertTrue(!empty(Usuario::login($u->usuario, $senha, $e->cpf_cnpj)));*/
    }
}
