<?php


namespace App\Http\Controllers;

use App\Models\Calory;
use Illuminate\Http\Request;

class CaloryController extends Controller
{
    public function addFoodItem(Request $request)
    {   
        $validatedData = $request->validate([
            'food_item' => 'required|max:255',
            'calories_number' => 'required|numeric',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i'
        ]);

        $validatedData["user_id"] = auth()->user()->id;
        Calory::create($validatedData);
        
        return redirect('/')->with('message', $validatedData["food_item"] .' added successfully!');;
    }
    public function destroy($id)
    {
        //Fetch the gig to be deleted
        $entry= Calory::find($id);

        //Make sure logged in user is owner of the gig
        if($entry->user_id != auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        //Delete the gig
        $entry->delete();

        //Redirect to the home page
        return redirect('/')->with('message', 'Gig listing deleted Successfully!');
    }
    public function getDailyCalories()
    {
        $entries =auth()->user()->calories;
        $caloryEntries = [];
        foreach($entries as $entry)
        {
            $caloryEntry = [$entry["date"],$entry["time"],$entry["food_item"],$entry["calories_number"]];
            $caloryEntries[]=$caloryEntry;
            //dd($caloryEntries);
        }
        //dd($caloryEntries);
        return $caloryEntries;
        //return $caloryEntries;
    }

    //public function index()
    //{
    //    $student = Student::all();
    //    return view('student.index', compact('student'));
    //}

}

