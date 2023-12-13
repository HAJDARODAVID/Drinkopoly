<div style="display: grid; 
grid-template-columns: 1fr 1fr 1fr 1fr 1fr; 
grid-template-rows: 1fr 1fr 1fr; 
gap: 0px 0px; 
grid-template-areas: 
  'db-header db-header db-header db-header db-header'
  'card-main card-main db-main db-main db-main'
  'card-main card-main db-main db-main db-main'; 
gap: 10px;
height: 100%;
padding: 10px;
">

    <div class="card-main card" style="grid-area: card-main;">
        <div class="card" style ="width: 50px;height:50px">
        </div>
    </div>
    <div class="db-header card" style="grid-area: db-header;">
        HEADER
    </div>
    <div class="db-main card" style="grid-area: db-main;">
        MAIN INFO
    </div>

</div>

