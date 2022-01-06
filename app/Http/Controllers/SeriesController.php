<?php
    namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use Illuminate\Http\Request;

    class SeriesController extends Controller{
        function index(Request $request){
            $series = Serie::query()
            ->orderBy('nome')
            ->get();
            $mensagem = $request
            ->session()
            ->get('mensagem');

            $request->session()->remove('mensagem');

            return view('series.index', [
                'series'=>$series,
                'mensagem'=>$mensagem
            ]);

        }

        public function create(){
            return view('series.create');
        }

        public function store(SeriesFormRequest $request){

           

            $nome = $request->nome;
            /*
            Caso queira fazer a inserção pra cada item 
            $serie = Serie::create([
                'nome' => $nome
            ]);
            */

            //Caso queira fazer pra todo o request
            $serie = Serie::create($request->all());

            
            //Este código é uma versão mais extensa do código acima
            /*$serie = new Serie();
            $serie->nome = $nome;

            var_dump($serie->save());*/

           $request
           ->session()
           ->flash(
               'mensagem',
                "Série $serie->id criada com sucesso: $serie->nome"
            );

            return redirect()->route('listar_series');

        }
        public function destroy(Request $request){

            Serie::destroy($request->id);

            $request
           ->session()
           ->flash(
               'mensagem',
                "Série deletada com sucesso"
            );

            return redirect()->route('listar_series');
        }
    }

?>