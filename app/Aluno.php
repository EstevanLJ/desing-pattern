<?php

namespace App;

use App\Events\AlunosCacheHit;
use App\Events\AlunosCacheMissed;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    public $fillable = ['nome', 'cidade'];

    
    public static function findById($id) 
    {
        //Verifica se existe esse registro no cache
        if(Cache::store('alunos')->has($id)) 
        {
            //Caso exista, registra o hit
            event(new AlunosCacheHit);

            //E retorna o registro do cache
            return Cache::store('alunos')->get($id);
        } 
        else 
        {
            //Caso exista, registra o hit
            event(new AlunosCacheMissed);

            //Caso não exista, procura na base
            $aluno = parent::find($id);

            //Sleep para simular uma consulta mais demorada
            sleep(1);

            //Insere no cache, com a chave primária
            Cache::store('alunos')->forever($id, $aluno);

            //Retorna o registro
            return $aluno;
        }

    }
}
