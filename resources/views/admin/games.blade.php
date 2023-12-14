@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Games</h1>
</div>

<div class="container">
  @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
  @endif
  <div class="row"><x-create-new-game-button></x-create-new-game-button></div>
  <div class="row"><x-games-table></x-games-table></div>
</div>

@endsection
