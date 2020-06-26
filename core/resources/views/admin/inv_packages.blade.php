<?php
    if(Session::has('val'))
    {
        $v = Session::get('val');
        $packs = App\packages::where('user_id', $v)->orwhere('amount', $v)->orwhere('bank', $v)->orwhere('account_no', $v)->orwhere('account_name', $v)->orwhere('status', $v)->orwhere('created_at', 'like', '%'.$v.'%')->orderby('id', 'asc')->paginate(100);
        Session::forget('val');
    }
    else
    {
        $packs = App\packages::orderby('id', 'asc')->paginate(100);
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
                                <div class="card-header card_header_bg_blue">
                                    <div class="card-head-row card-tools-still-right">
                                        <h4 class="card-title text-white"> <i class="fas fa-briefcase"></i> {{ __('admin.Investment_Packages') }} </h4>
                                        <div class="card-tools">
                                            <a href="/admin/create/package" class="btn btn-default"><i class="fa fa-plus"></i> {{ __('admin.Add') }} </a>
                                        </div>                                                                       
                                    </div>
                                </div>
                                <div class="card-body pb-0 table-responsive">
                                   @include('admin.temp.inv_pack') 
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>

            @include('admin.inc.edit_pack')

@endSection