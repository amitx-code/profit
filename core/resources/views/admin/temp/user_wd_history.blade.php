
         
    <table id="" class=" table table-stripped table-hover">
        <thead>
            <tr>               
                <th> {{ __('admin.Account') }} </th>
                <th> {{ __('admin.Amount') }} </th>
                <th> {{ __('admin.Date') }} </th>
            </tr>
        </thead>
        <tbody>
            <?php
                $activities = App\Withdrawal::where('user_id', $user->id)->orderby('id', 'desc')->get();
            ?>
            @if(count($activities) > 0 )
                @foreach($activities as $activity)
                    <tr> 
                        <td>{{$activity->account}}</td>
                        <td>{{$activity->amount}}</td>
                        <td>{{$activity->created_at}}</td>                     
                    </tr>
                @endforeach
            @else
                
            @endif
        </tbody>
    </table>
