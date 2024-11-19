<!-- resources/views/games/rpg-quest.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Welcome to the RPG Quest!</h1>
    <p>Embark on a journey to learn PHP through interactive quests. Each quest will teach you a new concept!</p>

    <p><strong>Your goal:</strong> Complete all the PHP challenges!</p>

    @if (!session('quest_completed'))
        <a href="{{ route('game.rpgQuest.start') }}"><button>Start First Quest</button></a>
    @else
        <p>You have completed the first quest! Proceed to the next quest.</p>
        <a href="{{ route('game.rpgQuest.second') }}"><button>Start Second Quest</button></a>
    @endif
@endsection
