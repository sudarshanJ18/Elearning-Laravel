<!-- resources/views/games/crossword.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>PHP Learning Crossword Puzzle - Level {{ session('level', 1) }}</h1>
    <form method="POST">
        @csrf
        <table>
            <!-- Generate crossword cells dynamically -->
            @for ($i = 0; $i < 5; $i++)
                <tr>
                    <td><input type="text" maxlength="1" name="cell{{ $i + 1 }}" /></td>
                </tr>
            @endfor
        </table>

        @if (session('level') === 1)
            <p>Clue: PHP function used to output text</p>
        @elseif (session('level') === 2)
            <p>Clue: Common PHP data type for storing values</p>
        @endif

        <button type="submit">Submit</button>
    </form>

    @if(session('result'))
        <div>{{ session('result') }}</div>
    @endif
@endsection
