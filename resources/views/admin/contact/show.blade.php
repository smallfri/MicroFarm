@extends('layouts.backend') 
@section('title','View Contact Us') 
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Contact Us</div>
            <div class="panel-body">
                <a href="{{ URL::previous() }}" title="Back">
                    <button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back
                    </button>
                </a> 
                <br/>
                <br/>

                <div class="table-responsive">
                    <table class="table table-borderless">
                        <tbody>
                             <tr>
                                <td>Id</td>
                                <td>{{ $contact->id }}</td>
                            </tr> 

                            <tr>
                                <td>Name</td>
                                <td>{{ $contact->name }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $contact->email }}</td>
                            </tr>
                            <tr>
                                <td>Phone No.</td>
                                <td>{{ $contact->phone }}</td>
                            </tr>
                            <tr>
                                <td>Subject</td>
                                <td>{{ $contact->subject }}</td>
                            </tr>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection