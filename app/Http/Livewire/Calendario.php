<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Carbon;

class Calendario extends Component
{
    public function incrementar($objeto)
    {
        dd($objeto);


        //$this->inicioCalendario = $this->fecha->copy()->firstOfMonth()->startOfWeek(Carbon::SUNDAY);
        //$this->finCalendario = $this->fecha->copy()->lastOfMonth()->endOfWeek(Carbon::SATURDAY);
    }
    
    public function render()
    {
        $this->fecha = Carbon::now();
        $this->meses =  [   '01' => 'Enero',
                            '02' => 'Febrero',
                            '03' => 'Marzo',
                            '04' => 'Abril',
                            '05' => 'Mayo',
                            '06' => 'Junio',
                            '07' => 'Julio',
                            '08' => 'Agosto',
                            '09' => 'Septiembre',
                            '10' => 'Octubre',
                            '11' => 'Noviembre',
                            '12' => 'Diciembre', ];
        $this->etiquetaDias = ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'];
        $fecha = $this->fecha->copy();
        $mes = $this->fecha->copy()->format("m");
        $anio = $this->fecha->copy()->format('Y');
        $inicioCalendario = $this->fecha->copy()->firstOfMonth()->startOfWeek(Carbon::SUNDAY);
        $finCalendario = $this->fecha->copy()->lastOfMonth()->endOfWeek(Carbon::SATURDAY);

        return view('livewire.calendario', ['fecha' => $fecha,
                                            'mes' => $mes,
                                            'anio' => $anio,
                                            'inicioCalendario' => $inicioCalendario,
                                            'finCalendario' => $finCalendario]);
    }
}
