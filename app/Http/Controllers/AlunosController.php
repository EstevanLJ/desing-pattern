<?php

namespace App\Http\Controllers;

use App\Aluno;
use Illuminate\Http\Request;

class AlunosController extends Controller
{
    public function index() {
        return response()->json(Aluno::all());
    }

    public function find($id) {
        return response()->json(Aluno::findById($id));
    }
}
