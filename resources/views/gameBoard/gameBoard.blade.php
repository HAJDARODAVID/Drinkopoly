@extends('layouts.app')

@section('content')

    @if ($gameBoardDisplay)
        <x-gameBoard.main-game-board></x-gameBoard.main-game-board>
    @endif

    @if ($adminBoardDisplay)
        test test
    @endif
  

@endsection