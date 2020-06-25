@include('user.inc.fetch')
@extends('layouts.atlantis.layout')
@Section('content')
        <div class="main-panel">
            <div class="content">
                @php($breadcome = 'Wallet')
                @include('user.atlantis.main_bar')
                <div class="page-inner mt--5">
                    @include('user.atlantis.overview')
                    <div id="prnt"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-head-row">
                                        <div class="card-title">{{ __('mess.Deposit_into_your_wallet') }}</div>
                                    </div>
                                </div>
                                <div class="card-body"> 
                                        @if($user->status == 2 || $user->status == 'Blocked')
                                            <div class="alert alert-warning">
                                                <p>
                                                   {{ __('mess.Account_Blocked or restricted! Please contact support for assistance. We apologize for any inconveniency.') }}
                                                </p>
                                            </div>
                                        @elseif(empty($user->currency))
                                            <div class="alert alert-warning">
                                                <p>
                                                    <a href="/{{$user->username}}/profile#userdet">
                                                        {{ __('mess.Please_update your profile before you proceed') }}
                                                    </a>
                                                </p>
                                            </div>
                                        @else
                                            @if($settings->deposit == 1)      
                                                <div id="pay_cont" class="row">
                                                    @if(env('SWITCH_PAYPAL') == 1)
                                                    <div class="col-lg-6 mt-5">                                                        
                                                        <div class="payment_method" align="center">
                                                            <p>
                                                                <i class="fab fa-cc-paypal fa-4x text-info"></i> <br>
                                                            </p>
                                                            <p>
                                                                {{ __('mess.Pay_using_Paypal_payment_gateway') }}
                                                            </p>
                                                            <div align="">
                                                                <a href="{{ route('addmoney.paywithpaypal') }}" class="btn btn_blue" >{{ __('mess.Pay_with_Paypal') }}</a>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    @endif
                                                    @if(env('SWITCH_STRIPE') == 1)
                                                    <div class="col-lg-6 mt-5">                                                                                                  
                                                        <div class="payment_method" align="center">
                                                            <p>
                                                                <i class="fab fa-cc-stripe fa-4x text-info"></i> <br>
                                                            </p>
                                                            <p>
                                                                {{ __('mess.Pay_using_Stripe_payment_gateway') }}
                                                            </p> 
                                                           
                                                            <div align="">
                                                                <a href="{{ route('stripe.amount') }}" class="btn btn_blue" >
                                                                    {{ __('mess.Pay_with_Stripe') }}
                                                                </a>
                                                            </div>                                      
                                                        </div>                                                       
                                                    </div>
                                                    @endif
                                                    @if(env('SWITCH_BTC') == 1)
                                                    <div class="col-lg-6 mt-5">                                                                                                  
                                                        <div class="payment_method" align="center">
                                                            <p>
                                                                <i class="fab fa-bitcoin fa-4x text-info"></i> <br>
                                                            </p>
                                                            <p>
                                                                {{ __('mess.Pay_using_Bitcoin_payment_system') }}
                                                            </p> 
                                                           
                                                            <div align="">
                                                                <a href="{{ route('btc.index') }}" class="btn btn_blue" >
                                                                    {{ __('mess.Pay_with_BTC') }}
                                                                </a>
                                                            </div>                                      
                                                        </div>                                                       
                                                    </div>
                                                    @endif
                                                    @if(env('BANK_DEPOSIT_SWITCH') == 1)
                                                    <div class="col-lg-6 mt-5">                                                                    
                                                        <div class="payment_method" align="center">
                                                            <p>
                                                                <i class="far fa-building fa-4x text-info"></i> <br>
                                                            </p>
                                                            <p>
                                                                {{ __('mess.Pay_using_Bank_Deposit/Transfer') }}
                                                            </p> 
                                                           
                                                            <div align="">
                                                                <a id="pay_with_bank_dep" href="javascript:void(0)" class="btn btn_blue" >
                                                                    {{ __('mess.Deposit_with_Bank') }}
                                                                </a>
                                                            </div> 
                                                            <div id="bank_dets" align="" class="cont_display_none">
                                                                <div class="row mt-5 border border-primary rounded">              
                                                                    <div class="col-sm-12">
                                                                        <h3 class="color_blue_b">
                                                                            <i class="fas fa-money-check-alt color_blue_9"></i> {{env('ACCOUNT_NAME')}}
                                                                        </h3>
                                                                        <h4 class="text-danger">Account Number: {{env('ACCOUNT_NUMBER')}}</h4>
                                                                        <h5 class="">Bank: {{env('BANK_NAME')}}</h5>
                                                                    </div>
                                                                </div>
                                                                <div class="row">              
                                                                    <div class="col-sm-12">
                                                                        <p class="text-danger">
                                                                           {{ __('mess.Make_payment') }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="row">              
                                                                    <div class="col-sm-12">
                                                                        <a id="bank_deposit_cont" href="javascript:void(0)" class="btn btn_blue" >
                                                                            {{ __('mess.Continue') }}
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>                                                                                               
                                                        </div>                                                       
                                                    </div>
                                                    @endif
                                                    @if(env('PAYSTACK_SWITCH') == 1)
                                                    <div class="col-lg-6 mt-5">                                                                   
                                                        <div class="payment_method" align="center">
                                                            <p>
                                                                <img src="https://website-v3-assets.s3.amazonaws.com/assets/img/hero/Paystack-mark-white-twitter.png" height="50px"></img> <br>
                                                            </p>
                                                            <p>
                                                                {{ __('mess.Pay using paystack') }}
                                                            </p> 
                                                           
                                                            <div align="">
                                                                <a href="{{ route('paystack.index') }}" class="btn btn_blue" >
                                                                    {{ __('mess.Pay_with_Paystack') }}
                                                                </a>
                                                            </div>                                      
                                                        </div>                                                       
                                                    </div>
                                                    @endif
                                                </div>                                                   
                                            @else
                                                <div class="row">
                                                    <div class="col-lg-12">                                                                       
                                                        <div class="payment_method">
                                                            <p align="Center">
                                                               <i class="fa fa-alert"></i> {{ __('mess.Deposit_is_disabbled') }}
                                                            </p>                              
                                                        </div>                                                       
                                                    </div>
                                                </div>      
                                            @endif                                         

                                        @endif

                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">{{ __('mess.Deposit_History') }}</div>
                                </div>
                                <div class="card-body pb-0">
                                    <?php
                                        $deps = App\deposits::where('user_id', $user->id)->orderby('id', 'desc')->take(20)->get();
                                    ?>                                                   
                                                
                                    <div class="table-responsive">
                                        <table id="basic-datatables" class="display table table-striped table-hover" >
                                        <thead>
                                            <tr>  
                                                <th>{{ __('mess.Amount') }}</th>
                                                <th>{{ __('mess.Method') }}</th>
                                                <th>{{ __('mess.Account') }}</th>
                                                <th>{{ __('mess.Name') }}</th>
                                                <th>{{ __('mess.Date') }}</th>
                                                <th>{{ __('mess.Status') }}</th>
                                                <th>{{ __('mess.Url') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @if(count($deps) > 0 )
                                                @foreach($deps as $dep)
                                                    <tr> 
                                                        <td>{{$settings->currency}} {{$dep->amount}}</td>     
                                                        <td>{{$dep->bank}}</td>
                                                        <td>
                                                           {{$dep->account_no}}
                                                        </td>
                                                        <td>
                                                           {{$dep->account_name}}
                                                        </td>
                                                        <td>{{$dep->created_at}}</td>
                                                        <td>
                                                            @if($dep->status == 0)
                                                                Pending
                                                            @elseif($dep->status == 1)
                                                                Approved
                                                            @elseif($dep->status == 2)
                                                                Rejected
                                                            @endif
                                                        </td> 
                                                        <td>
                                                            @if($dep->bank == 'BTC')
                                                                <a href="{{$dep->url}}" target="_blank" class="btn btn-info">{{ __('mess.Confirmation') }}</a>
                                                            @endif
                                                        </td>                                                                       
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>                                                            
                                                    <td colspan="6">{{ __('mess.No_data') }}</td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                                    
                                    <br><br>  
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
            @include('user.inc.confirm_inv')
            <div id="dep_pop" class="container dep_pop">
                <div class="row pad_5p2p">
                    <div class="col-md-4">&emps;</div>
                    <div class="col-md-4 pop_cont" align="Center">   
                        <div class="">                        
                                <span>            
                                  <a id="dep_pop_close" href="javascript:void(0)" class="btn btn-danger">{{ __('mess.Cancel') }}</a>
                                </span>
                                <br>
                            </div>
                            <div>
                                <img id="img_pop" src="" class="pop_img_h">
                            </div>
                            <br>
                        </div>  
                        <!-- close btn -->
                        <script type="text/javascript">
                          $('#dep_pop_close').click( function(){
                            $('#dep_pop').hide();
                          });        
                        </script>
                        <!-- end close btn -->
                    </div>
                </div>
            </div>

            <div id="bank_deposit_cont_dets" class="container popmsgContainer" >
                <div class="row">
                  <div class="col-md-4">&emps;</div>
                  <div class="col-md-4 popmsg-mobile card" align="Center">        
                    <div class="mt-2">
                      <h3><b>{{ __('mess.Deposit_Details') }}</b></h3>
                      <hr>
                    </div>
                    <div class="">                        
                        <form action="/user/wallet/bank_deposit" method="post">
                            <div class="form-group" align="left">                       
                                <input type="hidden" class="form-control" name="_token" value="{{csrf_token()}}">
                            </div>
                            <div class="form-group">
                              <div class="input-group">
                                <div class="input-group-prepend " >
                                  <span class="input-group-text span_bg">{{$settings->currency}}</span>
                                </div>                        
                                <input type="number" class="form-control" name="amt"  required placeholder="{{ __('mess.Enter_Amount_deposited') }}" >
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="input-group" >                   
                                <div class="input-group-prepend " >
                                  <span class="input-group-text span_bg"><i class="fa fa-user" ></i></span>
                                </div>
                                <input type="text" class="form-control" name="account_name"  required placeholder="{{ __('mess.Account_name_sent_from') }}" >
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="input-group" >                   
                                <div class="input-group-prepend " >
                                  <span class="input-group-text span_bg"><i class="fa fa-home" ></i></span>
                                </div>
                                <input type="text" class="form-control" name="account_no"  required placeholder="{{ __('mess.Account_number_sent_froml') }}" >
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="input-group" >                   
                                <div class="input-group-prepend" >
                                  <span class="input-group-text span_bg"><i class="fa fa-home" ></i></span>
                                </div>
                                <input type="text" class="form-control" name="bank_name"  required placeholder="{{ __('mess.Bank_name_sent_from') }}" >
                              </div>
                            </div>
                            <div class="form-group">
                              <br>
                                <button class="collb btn btn-info">{{ __('mess.Proceed') }}</button>
                                <span style="">            
                                  <a id="bank_deposit_cont_dets_close" href="javascript:void(0)" class="collcc btn btn-danger">{{ __('mess.Cancel') }}</a>
                                </span>
                                <br>
                            </div>
                        </form>
                    </div>  
                    <!-- close btn -->
                    <script type="text/javascript">
                      $('#bank_deposit_cont_dets_close').click( function(){
                        $('#bank_deposit_cont_dets').hide();
                      });        
                    </script>
                    <!-- end close btn -->
                  </div>

                </div>
            </div>            
@endSection
            