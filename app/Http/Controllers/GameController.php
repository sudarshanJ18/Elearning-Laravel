<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function sudoku()
    {
        return view('games.sudoku');
    }

    public function rpgQuest()
    {
        return view('games.rpg-quest');
    }

    public function crossword()
    {
        return view('games.crossword');
    }

    public function loadQuiz()
    {
        return view('games.load-quiz');
    }

    public function memoryQuest()
    {
        return view('games.memory-quest');
    }

    public function simulation()
    {
        return view('games.simulation');
    }
}
