<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\cicles;
use App\offers;
class OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offers::where('deleted','=','true')->orderBy('created_at','desc')->paginate(5);
        $cicle = Cicles::all();
        return view('user.offers.index', compact('offers','cicle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $offer = Offers::all();
        return view('user.offers.create', compact('offer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required',
            'description' => 'required',
            'date_max'=> 'required',
            'num_candidates'=>'required',
        ]);
        $offer = new Offers;
        $offer->title = $request->get('title');
        $offer->description = $request->get('description');
        $offer->date_max = $request->get('date_max');
        $offer->num_candidates = $request->get('num_candidates');
        $offer->save();
        
        return redirect()->route('user.offers.index')->with('success', 'Offer created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $offer = Offers::all();
        return view('user.offers.edit', compact('offer'))->with(['offer'=>Offers::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $offer = Offers::find($id);
        $request->validate([
            'title'=> 'required',
            'description' => 'required',
            'date_max'=> 'required',
            'num_candidates'=>'required',
        ]);

        $offer->update(
            [
                'title' => $request->get('title'),
                'description' => $request->get('description'),
                'date_max' => $request->get('date_max'),
                'num_candidates' => $request->get('num_candidates'),
            ]
        );
       
        return redirect()->route('user.offers.index')->with('success','Offer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function softDestroy($id)
    {
        $offer = Offers::find($id);
        $offer ->deleted = '1';
        $offer ->save();
        return redirect()->route('user.offers.index')->with('success','Offer deleted successfully');
    }
}
