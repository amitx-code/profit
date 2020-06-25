@include('user.inc.fetch')
@extends('layouts.atlantis.layout')
@Section('content')
    <div class="main-panel">
        <div class="content">
            @php($breadcome = 'Bitcoin Payment')
            @include('user.atlantis.main_bar')
            <div class="page-inner mt--5">
                
                <div id="prnt"></div>
                <div class="row">                    
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-head-row">
                                    <div class="card-title text-center" align="center">{{ __('Coinpayment') }}</div>                                       
                                </div>
                            </div>
                            <div class="card-body table-responsive"> 
                                <h3 align="center">You are about to pay</h3>
                                <h4 class="text-center"><b>{{$trans->amount2}} BTC</b></h4> 
                                <p class="text-center"> 
                                    <br>                                   
                                    <a href="{{$trans->status_url}}" target="_blank" class="btn btn-info">Proceed here</a>                                   
                                </p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
@endSection
            