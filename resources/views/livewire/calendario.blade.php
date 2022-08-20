<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="calendar">
      <div class="cabecera">
        <i class="fas fa-angle-left nav"></i>
        <div>{{ $meses[$mes] }}</div>
        <i class="fas fa-angle-right nav" wire:click="incrementar('m')"></i>
        
        <a href="#" class="nav"><i class="fas fa-angle-left"></i></a>
        <div><span class="year">{{ $anio }}</span></div>
        <a href="#" class="nav" wire:click="incrementar('a')"><i class="fas fa-angle-right"></i></a>
      </div>
      
      <div class="days">
        @foreach ($etiquetaDias as $dia)
        <span>{{ $dia }}</span>
        @endforeach
      </div>
        
      <div class="dates">
        @php
          $extraClass = "";
        @endphp
        
        @while ($inicioCalendario <= $finCalendario)
  
          @php
            $extraClass = $inicioCalendario->format('m') != $fecha->format('m') ? 'deshabilitado' : '';
            $extraClass .= $inicioCalendario->isToday() ? ' today ' : '';
          @endphp
  
          <button  class="{{ $extraClass }}" >
            <time>{{ $inicioCalendario->format('j') }}</time>
          </button>
          
          @php
            $inicioCalendario->addDay();
          @endphp 
        @endwhile
      </div>
    </div>
  </div>
  