          
<table id="" class=" table table-stripped table-hover">
    <thead>
        <tr>                
            <th> {{ __('mess.Name') }} </th>
            <th> {{ __('admin.Username') }} </th>
            <th> {{ __('admin.Investment') }} </th>
            <th> {{ __('admin.Date') }} </th>
        </tr>
    </thead>
    <tbody>

        <?php
            $activities = App\User::where('referal', $user->username)->orderby('id', 'desc')->get();
        ?>
        @if(count($activities) > 0 )
            @foreach($activities as $activity)
                <tr>                                                            
                    <td>{{$activity->firstname}} {{$activity->lastname}}</td>
                    <td>{{$activity->username}}</td>
                    <td>
                        <?php  
                            $ref_inv = App\investment::where('user_id', $activity->id)->get();
                            echo count($ref_inv);
                        ?>
                    </td>                                                            
                    <td>{{$activity->created_at}}</td>                     
                </tr>
            @endforeach
        @else
            
        @endif
    </tbody>
</table>
