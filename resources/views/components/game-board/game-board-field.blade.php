<div id="field-{{ $fieldId }}" class="field" style="grid-area: field-{{ $fieldId }};">
    @if ($fieldId == 'db')
        {{-- GAME DASHEBOARD --}}
        @livewire('in-game-dash-board')
    @else
        {{-- GAME FIELDS --}}
        <div class="fieldInner" style="@isset($fieldParameters['background_color']) {{ $fieldParameters['background_color'] }}@endisset">     
            {{-- FIELD CONTEND --}}
            <div style="width:100%; height:100px;padding: 5px">
                @isset($fieldParameters['text'])
                    <b>{{ strtoupper($fieldParameters['text']) }}</b>
                    <i class="material-icons">apps</i>
                @endisset  
            </div>     
        </div>  
    @endif
    
    
</div>