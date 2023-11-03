<div class="test" 
style=" display: grid;
grid-template-rows: {{ $template->rows }};
grid-template-columns: {{ $template->columns }};
grid-template-areas:
@foreach ($matrix as $row)
{{ __("'") }}{{ $row }}{{ __("'") }} 
@endforeach;
gap: 2px;
height:850px">
    @for ($i = 1; $i <= $fields; $i++)
        <x-gameBoard.game-board-field fieldId="{{ $i }}"></x-gameBoard.game-board-field>        
    @endfor   
</div>