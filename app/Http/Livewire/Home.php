<?php

namespace App\Http\Livewire;

use App\Models\UrlShortner;
use Livewire\Component;

class Home extends Component
{
    public $url;
    public function render()
    {
        $urls = UrlShortner::orderBy('id', 'desc')->get();
        return view('livewire.home', compact('urls'))->layout('layout.app');
    }

    public function store()
    {
        $url = new UrlShortner();
        $this->validate([
            'url' => 'required|url'
        ]);
        $random = rand(99999, 10000);
        $url->url_long = $this->url;
        $url->short_url = 'http://127.0.0.1:8000/' . 'HILAL' . $random . 'AHMAD';
        $url->url_code = 'HILAL' . $random . 'AHMAD';
        $url->click = 0;
        $result = $url->save();
        if ($result) {
            session()->flash('success', 'url Short success');
            $this->url = "";
        }
    }
}
