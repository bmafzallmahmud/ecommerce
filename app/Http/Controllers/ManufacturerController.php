<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\manufacturer;
use DB;

class ManufacturerController extends Controller
{
    public function addManufacture(){
    	return view('admin.manufacturer.addManufacturer');

    }

	    public function storManufacture(Request $request){
	    	//return $request->all();
	    	 $this->validate($request, [
	            'manufacturerName' => 'required|unique:manufacturers|max:255',
	            'manufacturerDescription' => 'required',
	            'publicationStatus' => 'required',
	        ]);

	    	    DB::table('manufacturers')->insert([
	    	'manufacturerName' => $request->manufacturerName,
	    	'manufacturerDescription' => $request->manufacturerDescription,
	    	'publicationStatus' => $request->publicationStatus,
	    
	    ]); 
	   // return redirect()->back();
	    return redirect('/manufacturer/add')->with('message','manufacturer Add Succesfully');
    }
	    public function manageManufacture(){
	    		$manufacturers = Manufacturer::all();
			    return view('admin.manufacturer.manageManufacturer',['manufacturer'=>$manufacturers]);
    	
    }

	    public function editManufacture($id){
	    	$ManufacturerById = Manufacturer::where('id',$id)->first();
			return view('admin.manufacturer.editManufacturer',['ManufacturerById'=>$ManufacturerById ]); 
    	
    }


    	public function updatetManufacturer(Request $request){
		//dd($request->all());
		$manufacturer = Manufacturer::find($request->manufacturerId);
		$manufacturer->manufacturerName = $request->manufacturerName;
    	$manufacturer->manufacturerDescription = $request->manufacturerDescription;
    	$manufacturer->publicationStatus = $request->publicationStatus;
    	$manufacturer->save();
		return redirect('/manufacturer/manage')->with('message','Manufacturer update Succesfully');
	}
		public function deletetManufacturer($id){
		$manufacturer = Manufacturer::find($id);
    	$manufacturer->delete();
		return redirect('/manufacturer/manage')->with('message','Manufacturer delete Succesfully');


		}

		
}