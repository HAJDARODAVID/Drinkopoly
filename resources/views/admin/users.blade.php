@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Users</h1>
</div>





<div class="container">
  @if ($message = Session::get('success'))
      <div class="alert alert-success">
          <p>{{ $message }}</p>
      </div>
  @endif
  <div class="row"><x-add-new-user-admin></x-add-new-user-admin></div>
  <br>
  <div class="row">
    <x-users-table></x-users-table>
  </div>
</div>

@endsection
