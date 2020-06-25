<?php
    if(Session::has('val'))
    {
        $v = Session::get('val');
        $deps = App\deposits::where('user_id', $v)->orwhere('amount', $v)->orwhere('bank', $v)->orwhere('account_no', $v)->orwhere('account_name', $v)->orwhere('status', $v)->orwhere('created_at', 'like', '%'.$v.'%')->orderby('id', 'desc')->paginate(50);
        Session::forget('val');
    }
    else
    {
        $deps = App\deposits::orderby('id', 'desc')->paginate(100);
    }
?>

@extends('admin.atlantis.layout')
@Section('content')
        <div class="main-panel">
            <div class="content">
                @include('admin.atlantis.main_bar')
                <div class="page-inner mt--5">
                    @include('admin.atlantis.overview')
                    <div id="prnt"></div>  
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card_header_bg_blue" >
                                    <div class="card-head-row card-tools-still-right">
                                        <h4 class="card-title text-white" > <i class="fas fa-envelope"></i> {{ __('Send Notification') }} </h4>
                                    </div>
                                </div>
                                <div class="card-body pb-0 table-responsive">
                                   @include('admin.temp.send_not') 
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" >
                                    <div class="card-head-row card-tools-still-right">
                                        <h4 class="card-title" style=""> <i class="fas fa-bells"></i> {{ __('Previous Notification') }} </h4>                      
                                    </div>
                                </div>
                                <div class="card-body pb-0 table-responsive">
                                   @include('admin.temp.old_msg') 
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
@endSection