<div class="sparkline8-graph dashone-comment  dashtwo-messages">
    <div class="comment-phara">
        <div class="row comment-adminpr">
            <?php                
                $invs = App\packages::where('status', 1)->orderby('id', 'asc')->get();                
            ?>
            @if($user->phone != '')
                @if(isset($invs) && count($invs) > 0)
                    @foreach($invs as $inv)
                        <div class="col-sm-4">
                            <div class="panel card pack-container" style="" align="center">
                                <div class="panel-head" style="">
                                    <h3 class="txt_transform">{{$inv->package_name}} {{ __('mess.Package') }}</h3>
                                </div>
                                <div class="" align="center" >
                                    <br>
                                        <h4 class="u_case" >
                                            <strong>{{ __('mess.Period_of_Investment') }}</strong>
                                        </h4>
                                        <div style="font-size: 40px;">
                                            <b>
                                                {{$inv->period}}
                                            </b>
                                        </div>
                                        <span class="pk_num">
                                                {{__('Days')}}
                                        </span>
                                </div>
                                <span align="center">..............................</span>
                                <div class="" align="center" style="">
                                        <h4 class="u_case" >
                                            <strong>{{ __('mess.Min_Investment') }}</strong>
                                        </h4>
                                        <span class="pk_num">{{$settings->currency}} {{$inv->min}}</span>
                                        <h4 class="u_case">
                                            <strong>{{ __('mess.Max_Investment') }}</strong>
                                        </h4>
                                        <span class="pk_num">{{$settings->currency}} {{$inv->max}}</span>
                                </div>                                                    
                                
                                <span align="center">..............................</span>
                                <div class="" align="center">
                                    <h4 class="u_case">
                                        <strong>{{ __('mess.Daily_Interest') }}</strong>
                                    </h4>         
                                     <span class="pk_num">{{$inv->daily_interest*100}}%</span>
                                </div>
                                 <div class="" align="center">
                                    <h4 class="u_case">
                                       <strong>{{ __('mess.Withdrawal_Interval') }} </strong>
                                    </h4> 
                                    <span class="pk_num">{{$inv->days_interval}} {{ __('mess.Days') }}</span>
                                </div>
                                <div class="" align="center">
                                    <p>{{ __('mess.Capital_accessible_after_investment_elaspses') }}.</p>
                                </div>
                                <div class="" align="center">
                                        <a id="{{$inv->id}}" href="javascript:void(0)" class="collcc btn btn-info" onclick="confirm_inv('{{$inv->id}}', '{{$inv->package_name}}', '{{$inv->period}}', '{{$inv->daily_interest}}', '{{$inv->min}}', '{{$inv->max}}', '{{$user->wallet}}')">
                                            {{ __('mess.Invest') }}
                                        </a>
                                        <br><br>
                                </div>
    
                            </div>
                        </div>
                                                                          
                    @endforeach
                @endif
            @else
                <div class="alert alert-warning">
                    <a href="/{{$user->username}}/profile#userdet">{{ __('mess.Please_click_here_to_update_your_profile_before_you_can_invest') }}.</a>
                </div>
            @endif
        </div>
    </div>
</div>