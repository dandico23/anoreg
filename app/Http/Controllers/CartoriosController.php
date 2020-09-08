<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cartorios;

class CartoriosController extends Controller
{
    public function index()
    {
        $cartorios = Cartorios::orderBy('created_at', 'desc')->paginate(10);
        return view('cartorios.index', array('cartorios' => $cartorios));
    }

    public function show($id)
    {
        $cartorios = Cartorios::find($id);
        if($cartorios) {
            return view('cartorios.show', array('cartorio' => $cartorios));
        } else {
            return redirect('cartorios')->with('failedMessage', 'O Cartório procurado não está acessível! Tente novamente');
        }
        
    }

    public function create()
    {
        return view('cartorios.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required|String|min:3',
            'razao' => 'required|min:3',
            'documento' => 'required|unique:cartorios|Digits:14',
            'cep' => 'required|Digits:8',
            'endereco' =>'required|String|min:3',
            'bairro' => 'required|String|min:3',
            'cidade' => 'required|String|min:3',
            'uf' => 'required|String|Size:2',
            'email' => 'required|E-Mail',
            'tabeliao' => 'required|String|min:3',
            'ativo' => 'required|String|Size:3'
        ]);

        $cartorio = new Cartorios();
        $cartorio->nome = $request->input('nome');

        $cartorio->razao = $request->input('razao');
        $cartorio->documento = $request->input('documento');
        $cartorio->cep = $request->input('cep');
        $cartorio->endereco = $request->input('endereco');
        $cartorio->bairro = $request->input('bairro');
        $cartorio->cidade = $request->input('cidade');
        $cartorio->uf = $request->input('uf');
        $cartorio->telefone = $request->input('telefone');
        $cartorio->email = $request->input('email');
        $cartorio->tabeliao = $request->input('tabeliao');
        $cartorio->ativo = ($request->input('ativo') == 'sim') ? true : false;

        if($cartorio->save()) {
            return redirect('cartorios/create')->with('success', 'Cartório cadastrado com sucesso!');
        }
    }

    public function edit($id)
    {
        $cartorio = Cartorios::find($id);
        if ($cartorio) {
            return view('cartorios.edit', compact('cartorio', 'id'));
        } else {
            return redirect('cartorios')->with('failedMessage', 'O recurso procurado não está disponível!');
        }
        

    }

    public function update(Request $request, $id)
    {
        $cartorio = Cartorios::find($id);

        $this->validate($request, [
            'nome' => 'required|min:3',
            'razao' => 'required|min:3',
            'documento' => 'required|min:14',
            'cep' => 'required|Digits:8',
            'endereco' =>'required|String|min:3',
            'bairro' => 'required|String|min:3',
            'cidade' => 'required|String|min:3',
            'uf' => 'required|String|Size:2',
            'email' => 'required|E-Mail',
            'tabeliao' => 'required|String|min:3',
            'ativo' => 'required|String|Size:3'
        ]);
        $ativo = ($request->get('ativo') == 'sim') ? true : false;
        $cartorio->nome = $request->get('nome');
        $cartorio->razao = $request->get('razao');
        $cartorio->documento = $request->get('documento');
        $cartorio->cep = $request->get('cep');
        $cartorio->endereco = $request->get('endereco');
        $cartorio->bairro = $request->get('bairro');
        $cartorio->cidade = $request->get('cidade');
        $cartorio->uf = $request->get('uf');
        $cartorio->telefone = $request->get('telefone');
        $cartorio->email = $request->get('email');
        $cartorio->tabeliao = $request->get('tabeliao');
        $cartorio->ativo = $ativo;

        if($cartorio->save()) {
            return redirect('cartorios/' . $id . '/edit')->with('success', 'Cartório atualizado com sucesso!');
        } else {
            return abort(404);
        }
    }

    public function importXml()
    {
        return view('cartorios.import');
    }

    public function storeByXml(Request $request)
    {
        try {
            if ($request->hasFile('filexml')) {
                $xmlFile = simplexml_load_file($request->file('filexml'));
                foreach ($xmlFile->cartorio as $cartorio) {
                    $ativo = ($cartorio->ativo == 1) ? true : false;
                    $cartorioData = [
                        'nome'         => $cartorio->nome,
                        'razao'        => $cartorio->razao,
                        'cep'          => $cartorio->cep,
                        'endereco'     => $cartorio->endereco,
                        'bairro'       => $cartorio->bairro,
                        'cidade'       => $cartorio->cidade,
                        'uf'           => $cartorio->uf,
                        'tabeliao'     => $cartorio->tabeliao,
                        'ativo'        => $ativo
                    ];
                    Cartorios::updateOrCreate(['documento' => $cartorio->documento], $cartorioData);
                }
            } else {
                throw new \Exception("Arquivo não encontrado", 1);
            }

            return redirect('cartorios/import')->with('success', 'Arquivo importado com sucesso!');
        } catch (\Exception $e) {
            return redirect('cartorios/import')->with('failedMessage', 'Erro ao processar o arquivo, verifique a extensão ou formatação');
        }
    }

    public function searchCartorio(Request $request)
    {
        $cartorios = Cartorios::where('nome', 'LIKE', '%' . $request->input('busca') . '%')
            ->orwhere('nome', 'LIKE', '%' . $request->input('busca') . '%')
            ->orwhere('documento', 'LIKE', '%' . $request->input('busca') . '%')
            ->paginate(10);
            return view('cartorios.index', array('cartorios' => $cartorios));
    }
}
