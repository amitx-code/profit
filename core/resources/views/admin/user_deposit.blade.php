<?php    
    if(Session::has('val'))
    {
        $v = Session::get('val');
        $deps = App\deposits::where('user_id', 'like', '%'.$v.'%')->orwhere('usn', 'like', '%'.$v.'%')->orwhere('amount', 'like', '%'.$v.'%')->orwhere('bank', 'like', '%'.$v.'%')->orwhere('account_no', 'like', '%'.$v.'%')->orwhere('account_name', 'like', '%'.$v.'%')->orwhere('status', 'like', '%'.$v.'%')->orwhere('created_at', 'like', '%'.$v.'%')->orderby('id', 'desc')->paginate(100);
        Session::forget('val');
    }
    else
    {
        $deps = App\deposits::orderby('id', 'desc')->paginate(50);
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
                                        <h4 class="card-title text-white" > <i class="fas fa-donate"></i> {{ __('Deposit History') }} </h4>
                                        <div class="card-tools">
                                            <form action="/admin/search/deposit" method="post">
                                                <div class="input-group">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"> {{ __('Search:') }} </span>
                                                    </div>
                                                    <input type="text" name="search_val" class="form-control" placeholder="Search by Username, Amount, Bank, Date, Capital or Status">
                                                    <div class="input-group-append">
                                                        <button class="btn"><i class="fa fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>                                                                             
                                    </div>
                                </div>
                                <div class="card-body pb-0 table-responsive">
                                    @include('admin.temp.user_deposits')
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
@endSection