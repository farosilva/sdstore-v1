<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Order;

class NavbarAdmin extends Component
{
    public $order;
    public $link;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($link)
    {
        $this->order = new Order();
        $this->link = $link;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $avaiables = $this->order::where([
            ['status', 'P']
        ])->get();

        $pendings = $this->order::where([
            ['status', 'A']
        ])->get();

        return view('components.navbar-admin', [
            'avaiables' => $avaiables,
            'pendings'  => $pendings
        ]);
    }
}
