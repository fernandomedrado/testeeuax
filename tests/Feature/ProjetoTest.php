<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Mockery;
use App\Business\Models\Projeto;
use App\Business\Models\Users;
use App\Http\Requests\ProjetoFormRequest;
use App\Business\Repository\ProjetoRepository;

class ProjetoTest extends TestCase
{
    public function test_listar_projeto()
    {
        $this->mockLoginSession();
        $this->mockInjectRepository();
        $response = $this->get('/projeto');
        $response->assertStatus(200);
    } 

    public function test_request_rules()
    {
        $this->assertEquals(
            [
                'projeto_id' => [],
                'projeto_nome' => ['required'],
                'projeto_inicio' => ['required'],
                'projeto_final' => ['required'],
            ],
            (new ProjetoFormRequest())->rules()
        );
    }

    public function test_validar_projeto()
    {
        $this->mockLoginSession();
        $this->mockInjectRepository();
        $objResponse = $this->post(
            '/projeto/form', 
            [
                'projeto_nome' => '',
                'projeto_inicio' => '',
                'projeto_final' => '',
            ]
        );
        $this->log($objResponse);
        $objResponse->assertStatus(422);
        $objResponse->assertSessionHasErrors(
            [
                'projeto_nome',
                'projeto_inicio',
                'projeto_final',
            ]
        );
    }

    public function test_cadastrar_projeto()
    {
        $this->mockLoginSession();
        $this->mockInjectRepository();
        $objResponse = $this->post(
            '/projeto/atualizar', 
            [
                'projeto_id' => 1,
                'projeto_nome' => 'Projeto Caso de teste.',
                'projeto_inicio' => '2021/05/12',
                'projeto_final' => '2022/05/12',
            ]
        );
        $objResponse->assertStatus(302);
        $objResponse->assertSessionDoesntHaveErrors();
        $objResponse->assertRedirect('/projeto');
    }

    public function test_remover_projeto()
    {
        $this->mockLoginSession();
        $this->mockInjectRepository();
        $objResponse = $this->post(
            '/projeto/deletar', 
            ['projeto_id' => '1']
        );
        $objResponse->assertJsonFragment(
            [
                'mensagem' => 'Removido com sucesso',
                'dado' => '1',
            ]
        );
        $objResponse->assertStatus(200);
    }

    private function mockInjectRepository()
    {
        $objProjeto = new Projeto();
        $objProjeto->projeto_id = 1;
        $objProjeto->projeto_nome = 'Projeto Caso de teste.';
        $objProjeto->projeto_inicio = '2021/05/12';
        $objProjeto->projeto_final = '2022/05/12';
        $objCollection = new Collection();
        $objCollection->push($objProjeto);

        $objMockery = Mockery::mock(ProjetoRepository::class);
        $objMockery->shouldReceive('all')->andReturn($objCollection);
        $objMockery->shouldReceive('create')->andReturn(true);
        $objMockery->shouldReceive('destroy')->andReturn(true);
        $this->app->instance(ProjetoRepository::class, $mock);
    }

    private function mockLoginSession()
    {
        $objUsers = new Users();
        $objUsers->id = 1;
        $objUsers->name = 'Usuário Eaux.';
        $objUsers->email = 'email@eaux.com.br';
        $objUsers->password = '123456789';
        session(['users' => $objUsers]);
    }

    private function log($objResponse)
    {
        $objResponse->dumpHeaders();
        $objResponse->dumpSession();
        $objResponse->dump();
    }

}
