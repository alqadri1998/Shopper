<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    use WithPagination;

    Public $searchTerm  ;
    public $currentPage;
    public $products ;


    public function render()
    {
        $query = '%' . $this->searchTerm . '%';


        $this->products = Product::where('name', 'LIKE', $query)
        ->orWhere('sell_price', 'LIKE', $query )
        ->orWhere('details', 'LIKE', $query)
        ->orWhere('gender', 'LIKE', $query )
        ->orWhere('size', 'LIKE', $query )
        ->orWhere('type', 'LIKE',  $query )
        ->orWhere('season', 'LIKE',  $query )
        ->orderBy('id', 'asc')
        ->paginate(3);



            return view('livewire.search');


    }
    public function setPage($url)
    {
        $this->currentPage = explode('page=',$url)[1];
        Paginator::currentPageResolver(function(){

            return $this->currentPage;


        });

    }
}





