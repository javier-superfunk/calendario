<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Carbon;

class Calendario extends Component
{
    protected $currentDateTime;
    
    public $inicioCalendario;
    public $finCalendario;
    public $fecha;
    public $anio;
    public $countMes = 1;
    public $etiquetaDias = ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'];
    public $meses = [ 1 => 'Enero',
                      2 => 'Febrero',
                      3 => 'Marzo',
                      4 => 'Abril',
                      5 => 'Mayo',
                      6 => 'Junio',
                      7 => 'Julio',
                      8 => 'Agosto',
                      9 => 'Septiembre',
                      10 => 'Octubre',
                      11 => 'Noviembre',
                      12 => 'Diciembre', ];

    // inicializamos calendario
    public function mount()
    {
        $this->currentDateTime = now();
        
        $this->countMes = $this->currentDateTime->format('n');
        $this->inicioCalendario = $this->currentDateTime->copy()->firstOfMonth()->startOfWeek(Carbon::SUNDAY);
        $this->finCalendario = $this->currentDateTime->copy()->lastOfMonth()->endOfWeek(Carbon::SATURDAY);
        $this->fecha = $this->currentDateTime->copy();
        $this->anio = $this->currentDateTime->copy()->format('Y');
    }

    public function incrementar($objeto)
    {
        $this->currentDateTime = Carbon::createFromFormat('n/Y', $this->countMes.'/'.$this->anio);

        if ($objeto == "m") {
            $this->inicioCalendario = $this->currentDateTime->copy()
                                            ->addMonth()
                                            ->firstOfMonth()
                                            ->startOfWeek(Carbon::SUNDAY);
            $this->finCalendario = $this->currentDateTime->copy()
                                        ->addMonth()
                                        ->lastOfMonth()
                                        ->endOfWeek(Carbon::SATURDAY);
            $this->countMes = (int) $this->currentDateTime->copy()->addMonth()->format('n');
            $this->anio = (int) $this->currentDateTime->copy()->addMonth()->format('Y');
        } else {
            $this->inicioCalendario = $this->currentDateTime->copy()
                                            ->addYear()
                                            ->firstOfMonth()
                                            ->startOfWeek(Carbon::SUNDAY);
            $this->finCalendario = $this->currentDateTime->copy()
                                        ->addYear()
                                        ->lastOfMonth()
                                        ->endOfWeek(Carbon::SATURDAY);
            
            $this->countMes = (int) $this->currentDateTime->copy()->addYear()->format('n');
            $this->anio = (int) $this->currentDateTime->copy()->addYear()->format('Y');
        }
    }
    public function decrementar($objeto)
    {
        $this->currentDateTime = Carbon::createFromFormat('n/Y', $this->countMes.'/'.$this->anio);

        if ($objeto == "m") {
            $this->inicioCalendario = $this->currentDateTime->copy()
                                            ->subMonth()
                                            ->firstOfMonth()
                                            ->startOfWeek(Carbon::SUNDAY);
            $this->finCalendario = $this->currentDateTime->copy()
                                        ->subMonth()
                                        ->lastOfMonth()
                                        ->endOfWeek(Carbon::SATURDAY);
            
            $this->countMes = (int) $this->currentDateTime->copy()->subMonth()->format('n');
            $this->anio = (int) $this->currentDateTime->copy()->subMonth()->format('Y');
        } else {
            $this->inicioCalendario = $this->currentDateTime->copy()
                                            ->subYear()
                                            ->firstOfMonth()
                                            ->startOfWeek(Carbon::SUNDAY);
            $this->finCalendario = $this->currentDateTime->copy()
                                        ->subYear()
                                        ->lastOfMonth()
                                    ->endOfWeek(Carbon::SATURDAY);
            
            $this->countMes = (int) $this->currentDateTime->copy()->subYear()->format('n');
            $this->anio = (int) $this->currentDateTime->copy()->subYear()->format('Y');
        }
    }
    
    public function render()
    {
        return view('livewire.calendario');
    }
}
