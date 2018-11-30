<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contact;
use Session;
use Yajra\Datatables\Datatables;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {             
        return view('admin.contact.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create(Request $request)
    {
        return view('admin.contact.create');
    }
   
    public function datatable(request $request)
    {
        $contact = Contact::All();
        if ($request->has('search') && $request->get('search') != '') {
            $search = $request->get('search');
            if ($search['value'] != '') {
                $value = $search['value'];
                $where_filter = "(contact.name LIKE  '%$value%' OR contact.email LIKE  '%$value%'  )";
                $contact = Contact::whereRaw($where_filter);
            }
        }
        
        if ($request->get('status') != '') {
            $status = $request->get('status');
            $contact = $contact->where('status', $status);
            
        }
        return Datatables::of($contact)
            ->make(true);
        exit;
    }
   
    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return void
     */
    public function show(Request $request,$id)
    {   

        $contact = Contact::where('id', $id)->first();
        if($contact == NULL) {
            Session::flash('flash_error', 'Contact is not exist!');
            return redirect('admin/contact');
        }
        
        return view('admin.contact.show', compact('contact'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return void
     */
    public function destroy($id)
    {
       
        $contact = Contact::find($id);
        $contact->delete();
        $message='Deleted';
        return response()->json(['message'=>$message],200);
    }  
}
