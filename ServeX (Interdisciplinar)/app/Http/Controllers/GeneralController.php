<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use DB;
use App\Category;
use App\Technicality;

class GeneralController extends Controller {
    
    // Views

    public function dashboardView() {
        return View::make('dashboard', [
            'isFiltered' => false,
            'categories' => Category::all(),
            'technicalities' => Technicality::all(),
        ])->render();
    }

    public function filteredView(Request $request) {
        $category = Category::where('category', '=', $request->categ)->firstOrFail();
        $technicalities = $category->technicalities;

        return View::make('dashboard', [
            'isFiltered' => true,
            'technicalities' => $technicalities,
            'category' => $category,
            'categories' => Category::all()
        ])->render();
    }

    public function searchView(Request $request) {
        if($request->ajax()) {
            $query = $request->get('query');
            if($query != '') {
                $technicalities = Technicality::where('technicality', 'like', '%'.$query.'%')
                    ->orWhere('description', 'like', '%'.$query.'%')->get();
                return View::make('dashboard', [
                    'isFiltered' => false,
                    'categories' => Category::all(),
                    'technicalities' => $technicalities,
                ])->render();
            }            
        }
    }

    public function detailView($id) {
        return view('detail', [
            'technicality' => Technicality::findOrFail($id)
        ]);
    }

    public function createView() {
        return view('admin.create');
    }

    // Create

    public function create(Request $request) {
        $data = json_decode($request->getContent());

        $idTech = $this->createTechnicality($data->technicality, $data->description);
        $idCateg = $this->createCategory($data->tags);

        $technicality = Technicality::find($idTech);
        $technicality->categories()->sync($idCateg);

        //echo json_encode($this->createCategory($data->tags));
    }

    function createTechnicality($technicality, $description){
        $tech = new Technicality();
        $tech->technicality = $technicality;
        $tech->description = $description;
        $tech->save();
        return $tech->id;
    }

    function createCategory($tags) {
        $ids = array();
        foreach($tags as $tag) {
            $registered = Category::where('category', '=', $tag)->first();

            if($registered === null) {
                $category = new Category();
                $category->category = $tag;
                $category->save();
                array_push($ids, $category->id);
            } else array_push($ids, $registered->id);
        }
        return $ids;
    }

}
