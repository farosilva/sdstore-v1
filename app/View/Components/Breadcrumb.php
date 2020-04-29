<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public $items;
    public $lastItem;
    public $links;

    public function __construct($items = null, $lastItem = null, $links = null)
    {
        $this->items = ($items) ? $items : $this->getItems();
        $this->lastItem = ($lastItem) ? $lastItem : $this->getLastItems();
        $this->links = ($links) ? $links : $this->getLinks();
        // $this->getItems();
        // $this->getLinks();
    }

    public function render()
    {
        // dd($this->lastItem);
        return view('components.breadcrumb');
    }

    private function getItems()
    {
        $items = collect(explode('/', request()->getRequestUri()));
        $items->shift();
        $this->lastItem = ucwords(str_replace('-',' ', $items->pop()));

        $items = $items->map(function ($item, $key) {
            return ucwords(str_replace('-',' ', $item));
        });

        return $items;
    }

    private function getLastItems()
    {
        $items = collect(explode('/', request()->getRequestUri()));
        $items->shift();
        $lastItem = collect(explode('?', ucwords(str_replace('-',' ', $items->pop()))));

        return $lastItem->first();
    }

    private function getLinks()
    {
        $items = collect(explode('/', request()->getRequestUri()));
        $items->shift();

        for ($i=0; $i < count($items); $i++) {
            $links[$i] = [];
            for ($j=0; $j <= $i ; $j++) {
                array_push($links[$i], $items[$j]);
            }
        }

        for ($i=0; $i < count($links); $i++) {
            $lnk[$i] = '/'.collect($links[$i])->implode('/');
        }

        return collect($lnk);
        // $this->links = collect($lnk);
        // $this->links = '???';
    }
}
