@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">#{{ $user->id }} - {{ $user->name }}</h1>
</div>

  
<div class="container">
    <form action="{{ route('userUpdate',$user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="form-group col-md-4" style="margin-bottom: 10px"> 
                <label for="inputEmail4">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                @error('name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col-md-4">
                <label for="inputAddress">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                @error('email')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-success">SAVE</button>
        <a class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('reset-password').submit();">RESET PASSWORD</a>
    </form>
    <form 
        method="POST" 
        id="reset-password"
        action="{{ route('userUpdate', $user->id) }}"  
        class="d-none">
        @method('PUT')
        @csrf
        <input type="hidden" value="1" name="passwordReset">
    </form>
        
</div>

@endsection