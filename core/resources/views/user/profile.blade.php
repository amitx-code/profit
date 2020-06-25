@include('user.inc.fetch')
@extends('layouts.atlantis.layout')
@Section('content')
        <div class="main-panel">
            <div class="content">
                @php($breadcome = 'My Profile')
                @include('user.atlantis.main_bar')
                <div class="page-inner mt--5">
                    @include('user.atlantis.overview')
                    <div id="prnt"></div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-head-row">
                                        <div class="card-title text-center">{{ __('Avatar') }}</div>
                                        <div class="card-tools">                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="chart-container">
                                        <div class="comment-phara">
                                            <div class="comment-adminpr" align="center">
                                                <a id="selectPic" href="javascript:void(0)"  >
                                                    @if($user->img == "")
                                                        <img class="avatar_img" src="/img/any.png">
                                                    @else
                                                        <img class="avatar_img" src="/img/profile/{{ $user->img }}">
                                                    @endif
                                                </a> 

                                                <form id="form_profilepic" action="/user/upload/profile_pic" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <input type="file" name="prPic" id="prPic" class="display_not">
                                                </form>
                                            </div>
                                            <br>
                                            
                                        </div>
                                        <div class="admin-comment-month" align="left" style="font-size: 16px;">
                                            
                                            <div align="center"><b> {{ucfirst($user->firstname).' '.ucfirst($user->lastname)}} </b></div>
                                            <hr>

                                            <?php
                                                $country = App\country::find($user->country);
                                                $state = App\states::find($user->state);
                                            ?>

                                            <div align="center" style="">
                                                <b>Referral link:</b><br>
                                                <div style="color: #c60; font-size: 13px; word-wrap: break-word;">
                                                    {{env('APP_URL').__('/register/').$user->username}}
                                                </div>
                                                <br>                                               
                                            </div>
                                                                           
                                        </div>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-head-row">
                                        <div class="card-title">{{ __('Change Password') }}</div>
                                        <div class="card-tools">                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form class="" method="post" action="/user/change/pwd">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <div class="form-group">
                                            <label>{{ __('Old Password') }}</label>
                                            <input type="password" class="form-control" name="oldpwd" placeholder="Your current password" required>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('New Password') }}</label>
                                            <input type="password" class="form-control" name="newpwd" placeholder="New Password" required>
                                        </div>
                                        <div class="form-group">
                                            <label>{{ __('Confirm Password') }}</label>
                                            <input type="password" class="form-control" name="cpwd" placeholder="Confirm Password" required>
                                        </div>
                                        <div class="form-group" align="">
                                           <button class="collcc btn btn-info">{{ __('Update') }}</button>
                                        </div>
                                    </form>                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">                            
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-head-row">
                                        <div class="card-title">{{ __('Profile Settings') }}</div>
                                        <div class="card-tools">                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body pb-0">
                                    <div class="datatable-dashv1-list custom-datatable-overright dashtwo-project-list-data">
                                        <p class="text-danger">
                                            Please note: Updating your country for the first time will permanently set currency for your profile.
                                        </p>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>{{ __('First Name') }}</label>
                                                    <input id="adr" type="text" value="{{ucfirst($user->firstname)}}" class="form-control" name="fname" readonly>
                                                </div>
                                            </div>  
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>{{ __('Last Name') }}</label>
                                                    <input id="adr" type="text" value="{{ucfirst($user->lastname)}}" class="form-control" name="lname" readonly>
                                                </div>
                                            </div>                               
                                            
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>{{ __('Email Address') }}</label>
                                                    <div class="input-group">                                                       
                                                        <input id="email" type="email" value="{{$user->email}}" class="form-control" name="email" readonly>
                                                    </div>
                                                    
                                                </div>
                                            </div>     

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>{{ __('Username') }}</label>
                                                    <div class="input-group">                                                       
                                                        <input id="usn" type="text" value="{{$user->username}}" class="form-control" name="usn" readonly>
                                                    </div>
                                                    
                                                </div>
                                            </div>                                             
                                            
                                        </div>   

                                        <form class="" method="post" action="/user/update/profile">
                                            
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                        <label>{{ __('Country') }}</label>
                                                        <select id="country" class="form-control" name="country" >
                                                            <?php 
                                                                $country = App\country::orderby('name', 'asc')->get();
                                                                $phn_code = "";
                                                            ?>
                                                            @foreach($country as $c)
                                                                    @if($c->id == $user->country)
                                                                        @php($cs = $c->id)
                                                                        @php($phn_code = $c->phonecode)
                                                                        {{'selected'}}
                                                                        <option selected  value="{{$c->id}}">{{$c->name}}</option>
                                                                    @else
                                                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                                                    @endif
                                                            @endforeach
                                                            @if(!isset($cs))
                                                                    <option selected disabled>{{ __('Select Country') }}</option>
                                                            @endif

                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                     <div class="form-group">
                                                        <label>{{ __('State/Province') }}</label>
                                                        <select  id="states" class="form-control" name="state" required>
                                                            @if(isset($cs))
                                                                 <?php 
                                                                    $st = App\states::where('id', $user->state)->get();
                                                                ?>
                                                                @if(count($st) > 0)
                                                                    <option selected value="{{$st[0]->id}}">{{$st[0]->name}}</option>
                                                                @else
                                                                    <option selected disabled>{{ __('Select State') }}</option>
                                                                @endif
                                                                
                                                            @else
                                                               <option selected disabled>{{ __('Select State') }}</option>
                                                            @endif                                                           
                                                        </select>                                                        
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>{{ __('Address') }}</label>
                                                        <input id="adr" type="text" class="form-control" value="{{$user->address}}" name="adr" required>
                                                    </div>
                                                </div>  

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>{{ __('Phone') }}</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span id="countryCode" class="input-group-text">
                                                                    @if(isset($phn_code))
                                                                        {{'+'.$phn_code}}
                                                                    @else
                                                                        
                                                                    @endif
                                                                </span>
                                                            </div>                                                            
                                                            <input id="cCode" type="hidden" class="form-control" name="cCode" required>
                                                            <input id="phone" type="text" class="form-control" value="{{str_replace('+'.$phn_code,'',$user->phone)}}" name="phone" required>
                                                        </div>
                                                        
                                                    </div>
                                                </div>  
                                            </div>   
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <button class="collcc btn btn-info">{{ __('Update Profile') }}</button>
                                                    </div>
                                                </div>                                                
                                                
                                            </div>
                                        </form>
                                    </div>                                
                                </div>
                            </div>
                            <!-- ////////////////////////  Add bank ////////////////////// -->
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">{{ __('Add Bank Details') }}</div>
                                </div>
                                <div class="card-body">
                                    <form class="" method="post" action="/user/add/bank">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>{{ __('Bank Name') }}</label>
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <input type="text" class="form-control" name="bname" required placeholder="Bank name">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>{{ __('Account Number') }}</label>
                                                    <input type="text" class="form-control" name="actNo"  required placeholder="Account number">
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>{{ __('Account Name') }}</label>
                                                    <input type="text" class="form-control" name="act_name" required placeholder="Account Name">
                                                </div>
                                            </div>                                             
                                            
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <button class="collcc btn btn-info">{{ __('Add Bank') }}</button>
                                                </div>
                                            </div>                                                
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="card col-md-12">
                            <div class="card-header">
                                <div class="card-title">{{ __('Add BTC Wallet') }}</div>
                            </div>
                            <div class="card-body">
                                <form class="" method="post" action="/user/add/btc_wallet">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>{{ __('Coin Host') }}</label>
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="text" class="form-control" name="coin_host" required placeholder="Exp. Blockchain, Paxful">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>{{ __('Wallet') }}</label>
                                                <input type="text" class="form-control" name="coin_wallet"  required placeholder="Wallet address">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <button class="collcc btn btn-info">{{ __('Add Bank') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">{{ __('My Bank Details') }}</div>
                                </div>
                                <div class="card-body pb-0 table-responsive" >
                                   <table id="basic-datatables" class="display table table-striped table-hover" >
                                        <thead>
                                            <tr>                                                
                                                <th data-field="status" data-editable="true">{{ __('Bank Name') }}</th>
                                                <th data-field="phone" data-editable="true">{{ __('Acount Name') }}</th>
                                                <th data-field="date" data-editable="true">{{ __('Acount Number') }}</th>
                                                <th data-field="company" >Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($mybanks) > 0)
                                                @foreach($mybanks as $bank)
                                                    <tr>
                                                        <td>{{$bank->Bank_Name}}</td>
                                                        <td>{{$bank->Account_name}}</td>
                                                        <td>{{$bank->Account_number}}</td>
                                                        <td>
                                                            <a class="btn btn-danger" href="/user/remove/bankaccount/{{$bank->id}}" title="Remove">
                                                                <i class="fa fa-times"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                    <br><br>
                                </div>
                            </div>
                        </div>
                    </div> 

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">{{ __('My Wallet Addresses') }}</div>
                                </div>
                                <div class="card-body pb-0 table-responsive" >
                                   <table id="basic-datatables" class="display table table-striped table-hover" >
                                        <thead>
                                            <tr>                                                
                                                <th>{{ __('Coin') }}</th>
                                                <th>{{ __('Coin Host') }}</th>
                                                <th>{{ __('Wallet Address') }}</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($my_wallets) > 0)
                                                @foreach($my_wallets as $bank)
                                                    <tr>
                                                        <td>{{$bank->Account_name}}</td>
                                                        <td>{{$bank->Bank_Name}}</td>
                                                        <td>{{$bank->Account_number}}</td>
                                                        <td>
                                                            <a class="btn btn-danger" href="/user/remove/bankaccount/{{$bank->id}}" title="Remove">
                                                                <i class="fa fa-times"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
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

@endSection
            