<div>
    <button class="btn btn-success" style="width: 250px" onclick="event.preventDefault(); document.getElementById('create-new-game').submit();">
        Create new game
    </button>

    <form 
        method="POST" 
        id="create-new-game"
        action="{{ route('createNewGame') }}"  
        class="d-none">
        @method('POST')
        @csrf
        <input type="hidden" value="true" name="createNewGame">
    </form>
</div>