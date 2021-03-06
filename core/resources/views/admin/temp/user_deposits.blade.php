
            <table class="display table table-stripped table-hover" >
                <thead>
                    <tr>
                        <th> {{ __('admin.Actions') }} </th>
                        <th> {{ __('admin.Username') }} </th>
                        <th> {{ __('admin.Amount') }} </th>
                        <th> {{ __('admin.Acct_Name') }}/TXN ID </th>
                        <th> {{ __('admin.Acct') }}No/Wallet </th>
                        <th> {{ __('admin.Method') }} </th>
                        <th> {{ __('admin.Date') }} </th>
                        <th> {{ __('admin.Status') }} </th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th> {{ __('admin.Actions') }} </th>
                        <th> {{ __('admin.Username') }} </th>
                        <th> {{ __('admin.Amount') }} </th>
                        <th> {{ __('admin.Acct_Name') }}/TXN ID </th>
                        <th> {{ __('admin.Acct') }}No/Wallet </th>
                        <th> {{ __('admin.Method') }} </th>
                        <th> {{ __('admin.Date') }} </th>
                        <th> {{ __('admin.Status') }} </th>
                    </tr>
                </tfoot>
                <tbody>
                    
                    @if(count($deps) > 0 )
                        @foreach($deps as $dep)
                            <tr>
                                <td>
                                    <a title="Reject Deposit" href="/admin/reject/user/payment/{{$dep->id}}" > 
                                        <span class=""><i class="fa fa-ban text-warning" ></i></span>
                                    </a>                                    
                                    @if($adm->role == 3)
                                        <a title="Approve Deposit" href="/admin/approve/user/payment/{{$dep->id}}" > 
                                            <span><i class="fa fa-check text-success"></i></span>
                                        </a>
                                        <a title="Delete Deposit" href="/admin/delete/user/payment/{{$dep->id}}" > 
                                            <span class=""><i class="fa fa-times text-danger"></i></span>
                                        </a>
                                    @endif
                                </td>                                                            
                                <td>{{$dep->usn}}</td>
                                <td>{{$dep->currency}} {{$dep->amount}}</td>                                
                                <td>{{$dep->account_name}}</td>
                                <td>{{$dep->account_no}}</td>
                                <td>{{$dep->bank}}</td>
                                <td>{{substr($dep->created_at, 0, 10)}}</td>                               
                                <td>
                                    @if($dep->status == 0)
                                        Pending
                                    @elseif($dep->status == 1)
                                        Approved
                                    @elseif($dep->status == 2)
                                        Rejected
                                    @endif
                                </td>   
                            </tr>
                        @endforeach
                    @else
                        
                    @endif
                </tbody>
            </table>
            <div class="" align="">
               <span> {{$deps->links()}}</span>  
            </div> 
            <br><br>
        