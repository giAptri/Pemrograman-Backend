<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public $animals = ["kucing","ayam","ikan",];

    public function index()
    {
        foreach ($this->animals as $animal)
        {
            echo $animal;
            echo "<br>";
        }
    }

    public function store(Request $request)
    {
       echo "Nama Hewan : $request->nama";
       echo "<br>";
       echo "untuk menambahkan hewan baru";

       array_push($his->animals, $request->animal);
       $this->index();
    }

    public function update(Request $request, $id)
    {
       echo "Nama Hewan : $request->nama";
       echo "<br>";
       echo "untuk menambahkan hewan baru";

       $this->animal[$id] = $request->animal;
       $this->index();
    }

    public function destroy($id)
    {
        echo "untuk menghapus hewan ID $id";
        unset($this->animal[$id]);
        $this->index();
    }

   




}
