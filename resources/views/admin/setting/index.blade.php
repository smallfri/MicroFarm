@extends('layouts.backend') 
@section('title','Setting') 
@section('pageTitle','Setting') 
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box bordered-box blue-border">
            <div class="box-header blue-background">
                <div class="title">
                    <i class="icon-circle-blank"></i> Settings
                </div>
            </div>
            <div class="box-content ">
                <div class="table-responsive" >
                    <table class="table table-borderless" id="Setting-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Value</th>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{$setting->email}}</td>
                            </tr>
                            <tr>
                                <td>Twitter Url</td>
                                <td>{{$setting->twitter}}</td>
                            </tr>
                            <tr>
                                <td>Facebook Url</td>
                                <td>{{$setting->facebook}}</td>
                            </tr>
                            <tr>
                                <td>Youtube Url</td>
                                <td>{{$setting->youtube}}</td>
                            </tr>
                            <tr>
                                <td>GooglePlus Url</td>
                                <td>{{$setting->googleplus}}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td>{{$setting->address}}</td>
                            </tr>
                            <tr>
                                <td>Contact No</td>
                                <td>{{$setting->contactno}}</td>
                            </tr>

                             <tr>
                                <td>Tel No</td>
                                <td>{{$setting->contactno1}}</td>
                            </tr>
                            <tr>
                            <td colspan="2"><a href="{{ url('/admin/setting/' . $setting->id . '/edit') }}"><button class='btn btn-primary'><i class='fa fa-pencil-square-o' aria-hidden='true'></i>Edit</button></a></td>
                            </tr>
                        </thead>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
