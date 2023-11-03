@extends('layouts.app')

@section('content')



<div class="test" 
style="  
    display: grid;
    grid-template-rows: {{ $template->rows }};
    grid-template-columns: {{ $template->columns }};

    grid-template-areas:
        @foreach ($matrix as $row)
            {{ __("'") }}{{ $row }}{{ __("'") }} 
        @endforeach;

    gap: 2px;

    height:850px
">
    @for ($i = 1; $i <= $fields; $i++)
        <div id="item-{{ $i }}" style="position: relative; grid-area: x-{{ $i }};">
            <div style="
            position: absolute;
            top: 0;
            bottom: 0;
            width: 100%;
            border-radius: 15px;
            background: rgb(34,193,195);
            background: linear-gradient(0deg, rgb(170, 40, 26) 0%, rgb(201, 139, 116) 100%);">
            </div>
        </div>    
    @endfor
    
  </div>
  @endsection
