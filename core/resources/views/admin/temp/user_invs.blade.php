<?php
    
    if(Session::has('val'))
    {
        $v = Session::get('val');
        $actInv = App\investment::where('user_id', $v)->orwhere('usn', 'like', '%'.$v.'%')->orwhere('capital', $v)->orwhere('status', $v)->orwhere('date_invested', 'like', '%'.$v.'%')->orderby('id', 'desc')->paginate(50);
        Session::forget('val');
    }
    else
    {
        $actInv = App\investment::orderby('id', 'desc')->paginate(50);
    }
    function getWorkingDays($startDate, $endDate)
    {        
        $begin = strtotime($startDate)+86400;
        $end   = strtotime($endDate);
        if ($begin > $end) 
        {
            // echo "startdate is in the future! <br />";
            return 0;
        } 
        else 
        {
            $no_days  = 0;
            $weekends = 0;
            while ($begin <= $end) 
            {
                $no_days++; // no of days in the given interval      
                $what_day = date("N", $begin);
                if ($what_day > 5) { // 6 and 7 are weekend days
                   $weekends++;                   
                };               
                $begin += 86400;   // +1 day                 
            };
            $working_days = $no_days; // - $weekends;
            return $working_days;
        }
    }
   
?>
               
<table class="display table table-stripped table-hover">
    <thead>
        <tr>
            <th> {{ __('Action') }} </th>
            <th> {{ __('Username') }} </th>
            <th> {{ __('Package') }} </th>
            <th> {{ __('Capital') }} </th>
            <th> {{ __('Return') }} </th>
            <th> {{ __('Date Invested') }} </th> 
            <th> {{ __('Elapse') }} </th>  
            <th> {{ __('Days Spent') }} </th> 
            <th> {{ __('Withdrawn') }} </th>  
            <th> {{ __('Status') }} </th>
            <th> {{ __('Earning') }} </th>                                  
        </tr>
    </thead>
    <tbody class="web-table">  
        @if(count($actInv) > 0 )
            @foreach($actInv as $in)
                <?php

                    $totalElapse = getWorkingDays(date('y-m-d'), $in->end_date);
                    if($totalElapse == 0)
                    {
                        $lastWD = $in->last_wd;
                        $enddate = ($in->end_date);
                        $Edays = getWorkingDays($lastWD, $enddate);
                        $ern  = intval($Edays)*floatval($in->interest)*intval($in->capital);
                        $withdrawable = $ern;
                                                             
                        $totalDays = getWorkingDays($in->date_invested, $in->end_date);
                        $ended = "yes";

                    }
                    else
                    {
                        $lastWD = $in->last_wd;
                        $enddate = (date('Y-m-d'));
                        $Edays = getWorkingDays($lastWD, $enddate);
                        $ern  = intval($Edays)*floatval($in->interest)*intval($in->capital);
                        $withdrawable = 0;
                        if ($Edays >= $in->days_interval)
                        {
                            $withdrawable = intval($in->days_interval)*intval($in->interest)*intval($in->capital);
                        }
                                                       
                        $totalDays = getWorkingDays($in->date_invested, date('Y-m-d'));
                        $ended = "no";
                    }

                ?>
                <tr class="">
                    <td>
                        <a title="Pause Investment" href="/admin/pause/user_inv/{{$in->id}}" > 
                            <span class=""><i class="fa fa-pause text-warning" ></i></span>
                        </a>                                    
                        @if($adm->role == 3)
                            <a title="Activate Investment" href="/admin/activate/user_inv/{{$in->id}}" > 
                                <span><i class="fa fa-check text-success"></i></span>
                            </a>
                            <a title="Delete Investment" href="/admin/delete/user_inv/{{$in->id}}" > 
                                <span class=""><i class="fa fa-times text-danger"></i></span>
                            </a>
                        @endif
                    </td>   
                    <td>{{$in->usn}}</td>
                    <td>{{$in->package}}</td>
                    <td>{{$in->currency}}{{$in->capital}}</td>
                    <td>{{$in->currency}}{{$in->i_return}}</td>
                    <td>{{$in->date_invested}}</td>
                    <td>{{$in->end_date}}</td> 
                    <td>
                        @if($in->status != 'Expired')
                            {{$totalDays}}
                        @else
                            0
                        @endif
                    </td>
                    <td>{{$in->w_amt}}</td> 
                    <td>{{$in->status}}</td>
                    <td>   
                        @if($in->currency == "" && $in->package != 'International')
                            N {{$ern}}  
                        @elseif($in->currency == "" && $in->package = 'International')
                            $ {{$ern}}
                        @else
                            {{$in->currency}} {{$ern}}
                        @endif                              
                    </td>
                </tr>                            
            @endforeach
            
        @else
            
        @endif
    </tbody>
    
</table>
<div class="" align="">
   <span> {{$actInv->links()}}</span>  
</div>