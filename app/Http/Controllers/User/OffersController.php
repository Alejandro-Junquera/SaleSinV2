<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\cicles;
use App\offers;
use App\Applied;
use App\User;
class OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cicles = Cicles::all();
        $applies = Applied::where('user_id','!=',auth()->id())->with(['offer'])->paginate(5);
       
        return view('user.offers.index', compact('cicles', 'applies'));
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
        $offer = Offers::find($id);
        return view('user.offers.index', compact('offer'));
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

    public function apply($id)
    {
        $offer = Offers::find($id);

        $offer-> update(
            [
            'num_candidates'=> ($offer->num_candidates) +1,
            ]);
        
        $apply = new Applied;
        $apply->create(
            [   
                'offer_id' => $id,
                'user_id' => auth()->id(),
                'deleted' =>'0'
            ]
        );
        return redirect()->route('user.offers.index')->with('success','Offer applied successfully');
    }
}