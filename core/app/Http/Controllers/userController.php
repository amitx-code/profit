<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;

use Validator;
use App\states;
use App\country;
use Session;
use Hash;
use File;
use Auth;
use App\User;
use App\banks;
use App\activities;
use App\packages;
use App\investment;
use App\msg;
use App\withdrawal;
use App\deposits;
use App\ref;
use App\fund_transfer;
use App\xpack_inv;
use App\xpack_packages;
use App\site_settings;
use App\ticket;
use App\comments;

class userController extends Controller
{
  private $st;

  public function __construct()
  {
    $this->st = site_settings::find(1);
  }
  public function index()
  {        
      //return view('user.');
  }

  public function states($id)
  {        
      $state = states::where('country_id', $id)->get();
      return json_encode($state);
  }
  public function countryCode($id)
  {        
      $code = country::where('id', $id)->get();
      return $code[0]->phonecode;
  }


  public function uploadProfilePic(Request $req)
  {        
     	$user = Auth::User();
     	if(!empty($user))
     	{  
      	try
      	{
      		$validate = $req->validate([
           'prPic' => 'required|image|mimes:jpeg,png,jpg|max:500',            
          ]);

  		    $file = $req->file('prPic');
          $path = $user->username.".jpg"; //$req->file('u_file')->store('public/post_img');
          $file->move(base_path().'/../img/profile/', $path);
          
          $usr = User::find($user->id);
          $usr->img = $path;
          $usr->save();

          $act = new activities;
          $act->action = "User updated profile picture";
          $act->user_id = $user->id;
          $act->save();

          Session::put('status', "Successful");
          Session::put('msgType', "suc");
          return back();
      	}
      	catch(\Exception $e)
      	{
    		  Session::put('status', "Error uploading image or invalid image file");
          Session::put('msgType', "err");
        	return back();;
      	}
          
     	}
     	else
     	{
     		return redirect('/');
     	}
  } 
  
  
  public function verify_reg($usn, $code)
  {   	 
          
      	try
      	{

      	    $usr = User::where('username', $usn)->get();
      	    
      	    if(count($usr) > 0)
      	    {
      	        if($usr[0]->act_code == 0000000000)
      	        {
      	            Session::put('status', "Account already activated once");
                      Session::put('msgType', "err");
      	        }
      	        elseif($usr[0]->act_code == $code)
      	        {
      	            $usr[0]->status = 1;
          	        $usr[0]->act_code = 0000000000;
                      $usr[0]->save();
                      
                      Session::put('status', "Account activation successful");
                      Session::put('msgType', "suc");
      	        }
      	        else
      	        {
      	            Session::put('status', "Invalid activation code passed!");
                      Session::put('msgType', "err");
      	        }
      	    }
      	    else
      	    {
      	        
                  Session::put('status', "Account Activation Error");
                  Session::put('msgType', "err");
                  
      	    }
      		 
              return view('auth.act_verify');
      	}
      	catch(\Exception $e)
      	{
      		Session::put('status', $e->getMessage()."Error Updating your account. Please contact support");
              Session::put('msgType', "err");
          	return view('auth.act_verify');
      	}
          
     	
  } 

  public function changePwd(Request $req)
  {        
     	$user = Auth::User();
     	if(!empty($user))
     	{       		 
          if($req->input('newpwd') == $req->input('cpwd'))
          {
          	if($req->input('newpwd') == $req->input('oldpwd'))
          	{            			                
                Session::put('status', "You cannot use same old password! Please use a different password.");
                Session::put('msgType', "err");
                return back();
          	}
          	try
        	{
                $usr = User::find($user->id);
                if(Hash::check($req->input('oldpwd'), $user->pwd))
                {
                	$usr->pwd = Hash::make($req->input('newpwd'));
	                $usr->save();

                      $act = new activities;
                      $act->action = "User changed password";
                      $act->user_id = $user->id;
                      $act->save();
  		                
  		            Session::put('status', "Password Successfully Changed");
                      Session::put('msgType', "suc");
  		            return back();
                }
                else
                {
                	Session::put('status', "Old Password invalid! Try again");
                      Session::put('msgType', "err");
                      return back();
            		// return back();
                }	                
        	}
        	catch(\Exception $e)
        	{
        		Session::put('status', "Error saving password! Try again");
                  Session::put('msgType', "err");
  	            return back();
        	}
          }
          else
          {
          	Session::put('status', "Password do not macth");
            Session::put('msgType', "err");
            return back();;
          }	        	
          
     	}
     	else
     	{
     		return redirect('/');
     	}
          
  }

  public function updateProfile(Request $req)
  {        
     	$user = Auth::User();
     	if(!empty($user))
     	{
      	try
      	{
      		$validate = $req->validate([
               'phone' => 'required|digits_between:8,15',            
            ]);

      		  //$country = country::find($req->input('country'))        		
            $usr = User::find($user->id);	                
          	$usr->country = $req->input('country');
          	$usr->state = $req->input('state');
          	$usr->address = $req->input('adr');
          	$usr->phone = $req->input('cCode').$req->input('phone');
                          	
            $usr->save();	

            $act = new activities;
            $act->action = "User Updated profile";
            $act->user_id = $user->id;
            $act->save();


            Session::put('status', "Profile Update Successfully");
            Session::put('msgType', "suc");
            return back();
              	                
      	}
      	catch(\Exception $e)
      	{
      		Session::put('status', "Error saving your data! Please make sure your number is valid");
          Session::put('msgType', "err");
          return back();
      	}                	
          
     	}
     	else
     	{
     		return redirect('/');
     	}
          
  }

  public function addbank(Request $req)
  {  

     	$user = Auth::User();
     	if(!empty($user))
     	{         
      	try
      	{     		
          $bank = new banks;	                
        	$bank->user_id = $user->id;
        	$bank->Account_name = $req->input('act_name');
        	$bank->Account_number = $req->input('actNo');
        	$bank->Bank_Name = $req->input('bname');         	
          	
          $bank->save();		  


            $act = new activities;
            $act->action = "User added bank details";
            $act->user_id = $user->id;
            $act->save();


          
          Session::put('status', "Your Bank Has Been Added Successfully");
          Session::put('msgType', "suc");
              
          return back();
              	                
      	}
      	catch(\Exception $e)
      	{
      		  Session::put('status', "Error saving details! Account may exist. Please Try again");
            Session::put('msgType', "err");
          	return back();
      	}                	
          
     	}
     	else
     	{
     		return redirect('/');
     	}
          
  }

  public function deleteBankAccount($id)
  {        
     	$user = Auth::User();
     	if(!empty($user))
     	{       		 
          
      	try
      	{     		
              $bank = banks::where('id', $id)->delete(); 

              $act = new activities;
              $act->action = "User deleted bank details";
              $act->user_id = $user->id;
              $act->save();

              Session::put('status', "Bank Deleted Successfully");
              Session::put('msgType', "suc");
              return back();
              	                
      	}
      	catch(\Exception $e)
      	{
          Session::put('status', 'Error saving details! Account may exist. Please Try again');
          Session::put('msgType', "err");        		  
          return back();
      	}                	
          
     	}
     	else
     	{
     		return redirect('/');
     	}
          
  }



  public function invest(Request $req)
  {        
      $user = Auth::User();

      if($this->st->investment != 1 )
      {
        Session::put('msgType', "err");              
        Session::put('status', 'Investment disabled! You will be notified when it is available.');
        return back();
      }

      if($user->status == 'Blocked' || $user->status == 2 )
      {
        Session::put('msgType', "err");              
        Session::put('status', 'Account Blocked! Please contact support.');
        return redirect('/login');
      }

      if($user->status == 'pending' || $user->status == 0 )
      {
        Session::put('msgType', "err");              
        Session::put('status', 'Account not activated! Please contact support.');
        return redirect('/login');
      }



      if(!empty($user))
      {            
          
        try
        {     
          $capital = $req->input('capital');
          $pack = packages::find($req->input('p_id'));

          if($user->wallet < $capital)
          {
            Session::put('status', 'Your wallet balance is lower than capital.');
            Session::put('msgType', "err");
            return back();
          }
          
          if($user->wallet < $pack->min)
          {
            Session::put('status', 'Wallet balance is lower than minimum investment.');
            Session::put('msgType', "err");
            return back();
          }
          
          if($capital > $pack->max)
          {
            Session::put('status', 'Input Capital is greater than maximum investment.');
            Session::put('msgType', "err");
            return back();
          }
          
          if($capital < $pack->min)
          {
            Session::put('status', 'Input Capital is less than minimum investment.');
            Session::put('msgType', "err");
            return back();
          }

          if($capital >= $pack->min && $capital <= $pack->max) 
          {
            $inv = new investment;
            $inv->capital = $capital;
            $inv->user_id = $user->id;
            $inv->usn = $user->username;
            $inv->package = $pack->package_name;
            $inv->date_invested = date("Y-m-d");
            $inv->period = $pack->period;    
            $inv->days_interval = $pack->days_interval;          
            $inv->i_return = ($capital*$pack->daily_interest*$pack->period);
            $inv->interest = $pack->daily_interest;
            // $no = 0;
            $dt = strtotime(date('Y-m-d'));
            $days = $pack->period;
            
            while ($days > 0) 
            {
                $dt    +=   86400   ;     
                $actualDate = date('Y-m-d', $dt);                  
                $days--;
            }  

            $inv->package_id = $pack->id;
            $inv->currency = $this->st->currency;
            $inv->end_date = $actualDate;
            $inv->last_wd = date("Y-m-d");
            $inv->status = 'Active';

            $user->wallet -= $capital;
            $user->save();
            
            $inv->save();

            if(!empty($user->referal))
            {
              $ref_bonus = $capital * env('REF_BONUS');
              
              if(env('REF_TYPE') == 'Once')
              {
                $ref_cnt = env('REF_LEVEL_CNT');
                $new_ref_user = $user->referal;
                $itr_cnt = 1;                

                $refExist = ref::where('user_id', $user->id)->get();
                if(count($refExist) < 1)
                {                  
                  $ref = new ref;
                  $ref->user_id = $user->id;
                  $ref->username = $user->referal;
                  // $ref->referral = 0;
                  $ref->wdr = 0;
                  $ref->currency = $this->st->currency;
                  $ref->amount = $ref_bonus;
                  $ref->save();

                  while ($itr_cnt <= $ref_cnt) {
                    $refUser = User::where('username', $new_ref_user)->get();
                    if(count($refUser) > 0)
                    {
                      $refUser[0]->ref_bal += $ref_bonus/$itr_cnt;
                      $refUser[0]->save(); 
                      $new_ref_user = $refUser->username;   
                    }                    
                    $itr_cnt += 1; 
                    if(env('REF_SYSTEM') == 'Single_level')
                    {
                      break;
                    }
                  }
                                   
                }                
                
              }
              if(env('REF_TYPE') == 'Continous')
              {
                $ref_cnt = env('REF_LEVEL_CNT');
                $new_ref_user = $user->referal;
                $itr_cnt = 1;    

                while ($itr_cnt <= $ref_cnt) {
                  $refUser = User::where('username', $new_ref_user)->get();
                  if(count($refUser) > 0)
                  {
                    $refUser[0]->ref_bal += $ref_bonus/$itr_cnt;
                    $refUser[0]->save(); 
                    $new_ref_user = $refUser->username;   
                  }                    
                  $itr_cnt += 1; 
                  if(env('REF_SYSTEM') == 'Single_level')
                  {
                    break;
                  }
                }
              }
            }

            $act = new activities;
            $act->action = "User Invested ".$capital." in ".$pack->package_name." package";
            $act->user_id = $user->id;
            $act->save();

            Session::put('status', "Investment Successful");
            Session::put('msgType', "suc");
            return back() ;
          }
          else
          {
            Session::put('status', "Invalid amount! Try again.");
            Session::put('msgType', "err");
            return back();
          }            
                                
        }
        catch(\Exception $e)
        {
            Session::put('status', "Error creating investment! Please Try again.".$e->getMessage());
            Session::put('msgType', "err");
            return back();
        }                 
          
      }
      else
      {
        return redirect('/');
      }
          
  }


  public function wd_invest(Request $req)
  {        
      $user = Auth::User();

      if($user->status == 'pending' || $user->status == 0 )
      {
        Session::put('msgType', "err");              
        Session::put('status', 'Account not activated! Please contact support.');
        return redirect('/login');
      }

      if($user->status == 'Blocked' || $user->status == 2 )
      {
        Session::put('msgType', "err");              
        Session::put('status', 'Account Blocked! Please contact support.');
        return redirect('/login');
      }


      if(!empty($user))
      {            
        
        try
        {  

          $amt = $req->input('amt');
          
          if($req->input('pack_type') == 'xpack')
          {
              $pack = xpack_inv::find($req->input('p_id'));
          }
          else
          {
              $pack = investment::find($req->input('p_id'));
          }
          

          if($amt <= 0)
          {
            Session::put('msgType', "err");              
            Session::put('status', 'Invalid amount/Package Expired');
            return back();
          }

          if($req->input('ended') == 'yes')
          {
            if($pack->status != 'Expired')
            {
                $user->wallet += $pack->capital;
                $user->save();
            }
            $pack->last_wd = $pack->end_date;
            $pack->status = 'Expired';

          }    
          else
          {
              
            $dt = strtotime($pack->last_wd);
            $days = $pack->days_interval;
           
            while ($days > 0) 
            {
              $dt    +=   86400   ;     
              $actualDate = date('Y-m-d', $dt);
              // if (date('N', $dt) < 6) 
              // {
                  $days--;
              //}
            }
            $pack->last_wd = $actualDate;
          }
          
          $pack->w_amt += $amt;            
          $pack->save();

          $usr = User::find($user->id);
          $usr->wallet += $amt;
          $usr->save();

          $act = new activities;
          $act->action = "User withdrawn to wallet from ".$pack->package.'package. package id: '.$pack->id;
          $act->user_id = $user->id;
          $act->save();

          Session::put('status', 'Package Withdrawal Successful, Amount Withdrawn Has Been Added to your Wallet');
          Session::put('msgType', "suc");
          return back();

        }
        catch(\Exception $e)
        {
          Session::put('status', 'Error submitting your withdrawal');
          Session::put('msgType', "err");
          return back();
        }
          
      }
      else
      {
        return redirect('/');
      }
  }

  

  public function user_wallet_wd(Request $req)
  {        
      $user = Auth::User();

      if($this->st->withdrawal != 1 )
      {
        Session::put('msgType', "err");              
        Session::put('status', 'Withdrawal disabled! Please contact support.');
        return back();
      }

      if($user->status == 'Blocked' || $user->status == 2 )
      {
        Session::put('msgType', "err");              
        Session::put('status', 'Account Blocked! Please contact support.');
        return back();
      }

      if($user->status == 'pending' || $user->status == 0 )
      {
        Session::put('msgType', "err");              
        Session::put('status', 'Account not activated! Please contact support.');
        return back();
      }

      if(intval($req->input('amt')) > intval($user->wallet) || intval($req->input('amt')) == 0 )
      {
        Session::put('msgType', "err");              
        Session::put('status', 'Invalid withdrawal amount. Amount must be greater than zero(0) and not more than wallet balance');
        return back();
      }  

      if(intval($req->input('amt')) > env('WD_LIMIT'))
      {
        Session::put('msgType', "err");              
        Session::put('status', env('WD_LIMIT').' Withdrawal limit exceeded!');
        return back();
      }


      if(!empty($user))
      {         
        try
        {  

          $usr = User::find($user->id);
          $usr->wallet -= intval($req->input('amt'));
          $usr->save();

          $wd = new withdrawal;
          $wd->user_id = $user->id;
          $wd->usn = $user->username;
          $wd->package = 'wallet';
          $wd->invest_id = $user->id;
          $wd->amount = intval($req->input('amt'));
          $wd->account = $req->input('bank');
          $wd->w_date = date('Y-m-d');
          $wd->currency = $user->currency;
          $wd->charges = $charge = intval($req->input('amt'))*env('WD_FEE');
          $wd->recieving = intval($req->input('amt'))-$charge;
          $wd->save();

          $act = new activities;
          $act->action = "User requested withdrawal from wallet to bank ";
          $act->user_id = $user->id;
          $act->save();

          $maildata = ['email' => $user->email, 'username' => $user->username];
          Mail::send('mail.wd_notification', ['md' => $maildata], function($msg) use ($maildata){
              $msg->from(env('MAIL_USERNAME'), env('APP_NAME'));
              $msg->to($maildata['email']);
              $msg->subject('User Withdrawal Notification');
          });
          $wd_fee = env("WD_FEE")*100;

          Session::put('status', 'Wallet Withdrawal Successful! Please Allow up to 5 to 10 Business Days for Payment Processing. Note: Withdrawal attracts processing '.$wd_fee.'% fee');
          Session::put('msgType', "suc");
          return back();
        }
        catch(\Exception $e)
        {
          Session::put('status', $e->getMessage());
          Session::put('msgType', "err");
          return back();
        }
          
      }
      else
      {
        return redirect('/');
      }
  }

  
  public function user_ref_wd(Request $req)
  {        
      $user = Auth::User();

      if(env('WITHDRAWAL') != 1  )
      {
        Session::put('msgType', "err");              
        Session::put('status', 'Withdrawal disabled! Please contact support.');
        return back();
      }

      if($user->status == 'Blocked' || $user->status == 2 )
      {
        Session::put('msgType', "err");              
        Session::put('status', 'Account Blocked! Please contact support.');
        return back();
      }

      if($user->status == 'pending' || $user->status == 0 )
      {
        Session::put('msgType', "err");              
        Session::put('status', 'Account not activated! Please contact support.');
        return back();
      }

      if(intval($req->input('amt')) < env('MIN_WD'))
        {
          Session::put('msgType', "err");              
          Session::put('status', 'Amount is lower than minimum withdrawal of '.env('MIN_WD'));
          return back();
        }

      if(intval($req->input('amt')) > env('WD_LIMIT'))
      {
        Session::put('msgType', "err");              
        Session::put('status', env('WD_LIMIT').' Withdrawal limit exceeded!');
        return back();
      } 

      if(intval($req->input('amt')) > intval($user->ref_bal) || intval($req->input('amt')) == 0)
      {
        Session::put('msgType', "err");              
        Session::put('status', 'Invalid withdrawal amount. Amount must be greater than zero(0) and not more than referral balance');
        return back();
      }


      if(!empty($user))
      { 
        $iv = investment::where('user_id', $user->id)->get();
        if(count($iv) < 1)
        {
          Session::put('msgType', "err");              
          Session::put('status', 'Sorry you have to invest at least once before you can withdraw your referral bonus.');
          return back();
        }
                  
        try
        {  

          $usr = User::find($user->id);
          $usr->ref_bal -= intval($req->input('amt'));
          $usr->save();

          $wd = new withdrawal;
          $wd->user_id = $user->id;
          $wd->usn = $user->username;
          $wd->package = 'ref_bonus';
          $wd->invest_id = $user->id;
          $wd->amount = intval($req->input('amt'));
          $wd->account = $req->input('bank');
          $wd->w_date = date('Y-m-d');
          $wd->currency = $user->currency;
          $wd->charges = $charge = intval($req->input('amt'))*env('WD_FEE');
          $wd->recieving = intval($req->input('amt'))-$charge;
          $wd->save();

          $act = new activities;
          $act->action = "User requested withdrawal from referral bonus to bank";
          $act->user_id = $user->id;
          $act->save();
          
          $maildata = ['email' => $user->email, 'username' => $user->username];
          Mail::send('mail.wd_notification', ['md' => $maildata], function($msg) use ($maildata){
              $msg->from(env('MAIL_USERNAME'), env('APP_NAME'));
              $msg->to($maildata['email']);
              $msg->subject('User Withdrawal Notification');
          });
         
          Session::put('status', 'Referral Withdrawal Successful, Please Allow up to 10 Business Days for Payment Processing');
          Session::put('msgType', "suc");
          return back();

        }
        catch(\Exception $e)
        {
          Session::put('status', $e->getMessage().' Error submitting your withdrawal');
          Session::put('msgType', "err");
          return back();
        }
          
      }
      else
      {
        return redirect('/');
      }
  }


  public function readmsg_up($id)
  {        
      $user = Auth::User();
      if(!empty($user))
      {            
          
        try
        {  
          $msg = msg::find($id);
          $str = explode(';', $msg->readers);   
                                           
          if(!in_array($user->id, $str))
          {
            if($msg->readers == "")
            {
              $msg->readers = $user->id.';';
            }
            else
            {
              $msg->readers = $msg->readers.$user->id.';';
            }
            $msg->save();
          }  
          return "s";         
        }
        catch(\Exception $e)
        {           
          return 'err';
        }                 
          
      }
      else
      {
        return redirect('/');
      }
          
  }


  public function user_deposit_trans(Request $req)
  {        
      $user = Auth::User();

      if($user->status == 'Blocked' || $user->status == 2 )
      {
        Session::put('msgType', "err");              
        Session::put('status', 'Account Blocked! Please contact support.');
        return back();
      }

      if($user->status == 'pending' || $user->status == 0 )
      {
        Session::put('msgType', "err");              
        Session::put('status', 'Account not activated! Please contact support.');
        return back();
      }


      if(!empty($user))
      {  
        
        try
        { 

          $validator = Validator::make($req->all(), [
            'pop' => 'required|image|mimes:jpeg,png,jpg|max:500', 
            'act_no' => 'required|numeric' ,
            'p_amt' => 'required|numeric' , 
          ]);

          if($validator->fails()){
            Session::put('msgType', "err");              
            Session::put('status', $validator->errors()->first());
            return back();
          }
          
          $wd = new deposits;
          $wd->user_id = $user->id;
          $wd->usn = $user->username;
          // $wd->package = 'ref_bonus';
          // $wd->invest_id = $user->id;
          $wd->amount = intval($req->input('p_amt'));
          $wd->account_name = $req->input('act_name');
          $wd->account_no = $req->input('act_no');
          $wd->currency = $user->currency;
          $wd->bank = $req->input('y_bank');

          $file = $req->file('pop');
          $path =  $user->username.time().'.jpg';
          $file->move(public_path().'/pop/', $path);
          
          $wd->pop = $path;
          $wd->save();

          $act = new activities;
          $act->action = "User deposited ".$user->currency.intval($req->input('p_amt'))." through bank transfer.";
          $act->user_id = $user->id;
          $act->save();

          Session::put('status', 'Your Deposit Details Has Been Received, Admin Will Confirm and Approve Payment');
          Session::put('msgType', "suc");
          return back();

        }
        catch(\Exception $e)
        {
          Session::put('status', $e->getMessage().' Error submitting your withdrawal');
          Session::put('msgType', "err");
          return back();
        }
          
      }
      else
      {
        return redirect('/');
      }
  }


  public function payment_suc($amt, Request $req)
  {        
      $user = Auth::User();        
      if($req->input('event') == 'successful' && $req->input('txref') == Session::get('pay_ref'))
      {
          try
          {
            $dep = new deposits;
            $dep->user_id = $user->id;
            $dep->usn = $user->username;
            $dep->amount = $amt; //Session::get('payAmt');
            $dep->currency = $user->currency;
            $dep->account_name =  $req->input('flwref');
            // $dep->account_no = $_GET['flwref'];
            $dep->bank       = 'Ref:'.$req->input('txref');
            $dep->status = 1;
            $dep->on_apr = 1;
            $user->wallet += intval($amt);
            $user->save();
  
            $dep->save();
  
            // Session::forget('payAmt');
            Session::forget('pay_ref');
  
            Session::put('status', 'Payment Successful');      
            Session::put('msgType', "suc");
            Session::put('payment_complete', "yes");
            return redirect('/'.$user->username.'/dashboard');
            
              $act = new activities;
              $act->action = "User deposited ".$user->currency.intval($req->input('p_amt'))." through flutterwave.";
              $act->user_id = $user->id;
              $act->save();
          }
          catch(\Eception $e)
          {
              Session::put('status', 'Error updating wallet.');      
              Session::put('msgType', "err");
              Session::put('payment_complete', "yes");
              return redirect('/'.$user->username.'/wallet');
          }

      }
      else
      {
        Session::put('status', 'Invalid Payment credentials');      
        Session::put('msgType', "err");
        Session::put('payment_complete', "yes");
        return redirect('/'.$user->username.'/wallet');
      }

  }
  
  
  public function reset_pwd(Request $req)
  {        
      // $user = Auth::User();        
      if($req->input('password') != $req->input('c_pwd'))
      {
          Session::put('status', 'Password not match!');      
          Session::put('msgType', "err");
          return back();
      }
      
      $validator = Validator::make($req->all(), [
          'password' => 'required|string|min:8|max:20', 
          'c_pwd' => 'required|string|min:8|max:20' ,
      ]);

      if($validator->fails()){
        Session::put('msgType', "err");              
        Session::put('status', $validator->errors()->first());
        return back();
      }
      
      try
      {
          $usr = User::where('username', Session::get('reset_pwd_usn'))->get();
          if(count($usr) > 0)
          {
              if($usr[0]->remember_token != '' && Hash::check(Session::get('reset_pwd_token'), $usr[0]->remember_token))
              {
                  $usr[0]->pwd = Hash::make($req->input('password'));
                  $usr[0]->remember_token = '';
                  $usr[0]->save();
                  
                  // Session::forget('reset_pwd_token');
                  Session::forget('reset_pwd_usn');
                  
                  Session::put('status', 'Password reset Successful. You can now login.');      
                  Session::put('msgType', "suc");
                  Session::put('pwd_rst_suc', "successful");
                  return back();
              }
              else
              {
                  return back();
              }
          }
          else
          {
            Session::put('status', 'User with this email not found or token expired!');      
            Session::put('msgType', "err");
            return back();
          }
      }
      catch(\Exception $e)
      {
          Session::put('status', 'Error Updating your password!');      
          Session::put('msgType', "err");
          return back();
      }

  }
  
  
  
  public function user_req_pwd(Request $req)
  {        
      
      $validator = Validator::make($req->all(), [
          'email' => 'required|email' , 
      ]);

      if($validator->fails()){
        Session::put('msgType', "err");              
        Session::put('status', $validator->errors()->first());
        return back();
      }
      
      try
      {
          $usr = User::where('email', $req->input('email'))->get();
          if(count($usr) > 0)
          {
              $token = time();
              
              $usr[0]->remember_token = Hash::make($token);
              $usr[0]->save();
              
              $maildata = ['email' => $usr[0]->email, 'username' => $usr[0]->username, 'token' => $token ];
              Mail::send('mail.pwd_req', ['md' => $maildata], function($msg) use ($maildata){
                  $msg->from(env('MAIL_USERNAME'), env('APP_NAME'));
                  $msg->to($maildata['email']);
                  $msg->subject('Password Reset');
              });
              
              Session::forget('pwd_rst_suc');
              Session::put('status', 'Password reset link sent to email. Try again after some times if not received.');      
              Session::put('msgType', "suc");
              return back();
    
          }
          else
          {
            Session::put('status', 'User with this email not found!');      
            Session::put('msgType', "err");
            return back();
          }
      }
      catch(\Exception $e)
      {
          Session::put('status', 'Error sending password reset mail. Please try again later or contact support.');      
          Session::put('msgType', "err");
          return back();
      }

  }
  
  
  
  public function pwd_req_verify($usn, $token)
  {        
      $usr = User::where('username', $usn)->get();
      if(Hash::check($token, $usr[0]->remember_token))
      {
          Session::put('reset_pwd_usn', $usr[0]->username);
          Session::put('reset_pwd_token', $token);
          return view('auth.passwords.reset');
      }
      else
      {
          Session::put('pwd_reset_err', 'Password reset username or token is invalid. Link may have expired.');
          return view('auth.passwords.reset');
      }

  }
  
  public function user_send_fund(Request $req)
  {        
      $user = Auth::User();

      if(empty($user))
      {
        return redirect('/');
      }


      $validator = Validator::make($req->all(), [
          'usn' => 'required|string', 
          's_amt' => 'required|numeric',
      ]);

      if($validator->fails()){
          Session::put('err_send', $validator->errors()->first());
          Session::put('status', $validator->errors()->first());      
          Session::put('msgType', "err");
          return back();
      }
      
      if($user->username == $req->input('usn'))
      {
          Session::put('err_send', "You cannot send fund to yourself");
          Session::put('status', 'You cannot send fund to yourself');      
          Session::put('msgType', "err");
          return back();
      }        
     
      if($user->wallet < 10)
      {
          Session::put('err_send', "Wallet balance is less than minimum!");
          Session::put('status', 'Wallet balance is less than minimum!');      
          Session::put('msgType', "err");
          return back();
      }
      
              
      if($user->wallet < intval($req->input('s_amt')) )
      {
          Session::put('err_send', "Wallet balance is lower than input amount!");
          Session::put('status', 'Wallet balance is lower than input amount!');      
          Session::put('msgType', "err");
          return back();
      }
      
      try
      {
          $rec = User::where('username', trim($req->input('usn')))->get();
          if(count($rec) < 1)
          {
              Session::put('err_send', "Username record not found!");
              Session::put('status', 'User record not found!');      
              Session::put('msgType', "err");
              return back();
          }
          
            
          $amt = intval($req->input('s_amt'));
            
            
          $rec[0]->wallet += $amt;
          $rec[0]->save();
          
          $user->wallet -=  intval($req->input('s_amt'));
          $user->save();
          
          $rc = new fund_transfer;
          $rc->from_usr = $user->username;
          $rc->to_usr = trim($req->input('usn'));
          $rc->amt = intval($req->input('s_amt'));
          $rc->save();
          
          $act = new activities;
          $act->action = "User send fund of ".$user->currency.intval($req->input('s_amt'))." to ".trim($req->input('usn'));
          $act->user_id = $user->id;
          $act->save();
          
          Session::put('status', 'Your transaction was successful');      
          Session::put('msgType', "suc");
          return back();
      }
      catch(\Exception $e)
      {
          Session::put('err_send', "Error sending fund to another user!");
          Session::put('status', 'Error sending fund to another user!');      
          Session::put('msgType', "err");
          return back();
      }

  }
  
  
  public function wd_req_submit(Request $req)
  {        
      $validator = Validator::make($req->all(), [
          'usn' => 'required|string', 
          'iv_id' => 'required|numeric',
          'amt' => 'required|numeric',
          'bank' => 'required',
          'act_no' => 'required|numeric',
          'act_name' => 'required',
          'dat' => 'required',
      ]);
      if($validator->fails()){
        Session::put('err_send', $validator->errors()->first());
        return back();
      }
      $post = $req->all();
      return view('user.wd_req_pdf')->with('post', $post);
  }
  
  public function addBtcWallet(Request $req)
  { 
    $user = Auth::User();
    if(!empty($user))
    {            
      try
    	{     		
        $bank = new banks;	                
      	$bank->user_id = $user->id;
      	$bank->Account_name = "BTC";
      	$bank->Account_number = $req->input('coin_wallet');
      	$bank->Bank_Name = $req->input('coin_host');
        $bank->save();

        $act = new activities;
        $act->action = "User added bitcoin wallet";
        $act->user_id = $user->id;
        $act->save();
        
        return back()->With([
          'toast_msg' => 'Wallet Saved Successful',
          'toast_type' => 'suc'
        ]);
    	}
    	catch(\Exception $e)
    	{
        return back()->With([
          'toast_msg' => 'Error saving wallet address '.$e->getMessage(),
          'toast_type' => 'err'
        ]);
    	}
    }
    else
    {
      return redirect('/login') ;
    }
      
  }

  public function notifications(){
    $user = Auth::User();
    if(!empty($user)){
      $msgs = msg::orderby('id', 'desc')->get();
      return view('user.messages', ['msgs' => $msgs]);
    }
    else
    {
      return redirect('/login');
    }
  }

  public function notifications_read($msgID){
    $user = Auth::User();
    if(!empty($user)){
      $msgs = msg::orderby('id', 'desc')->get();
      return view('user.messages', ['msgs' => $msgs, 'msgID' => $msgID]);
    }
    else
    {
      return redirect('/login');
    }
  }

  // coded added 01/06/2020 ////////////////////////////////////////////////

  public function pay_with_btc(){    
    $user = Auth::User();
    if(!empty($user))
    {
      return view('user.pay_btc_amt');
    }
    else
    {
      return redirect('/login');
    }
    
  }

  public function pay_btc_amt(Request $req){
    
    $user = Auth::User();
    if($req->input('amount') < env('MIN_DEPOSIT'))
    {
      return back()->With(['toast_msg' => 'Amount must be greater or equal to '.env('MIN_DEPOSIT').' '.$this->st->currency, 'toast_type' => 'err']);
    }

    if(!empty($user))
    {
      $cost = (FLOAT) $req->input('amount');
      $currency_base = 'USD';
      $currency_received = 'BTC';
      $extra_details = "Maxprofit";

      $transaction = \Coinpayments::createTransactionSimple($cost, $currency_base, $currency_received, $extra_details);
      $transaction = json_decode($transaction);
      if($transaction)
      {      
        $st = site_settings::find(1);
        $paymt = new deposits;
        $paymt->user_id = $user->id;
        $paymt->usn = $user->username;
        $paymt->amount = $cost * $st->currency_conversion;
        $paymt->currency = $st->currency;
        $paymt->account_name = $transaction->txn_id;
        $paymt->account_no = $transaction->address;
        $paymt->bank = "BTC";
        $paymt->url =  $transaction->status_url;
        $paymt->status = 0;
        $paymt->on_apr = 0;
        $paymt->pop = "";

        $paymt->save();
        
      }
      // return redirect($transaction->status_url);
      return view('user.pay_btc', ['trans' => $transaction]);
    }
    else
    {
      return redirect('/login');
    }
      

  }

  public function btc_confirm(Request $req){

    if( $req->input('status') >= 100)
    {
      $btc_pay = deposit::where('account_name', $req->input('txn_id'))->get();
      $btc_pay->status = 1;
      $btc_pay->on_opr = 1;

      $user = User::where('id', $btc_pay->user_id)->get();
      $user->wallet += (FLOAT) $btc_pay->amount;
      $user->save();

      $btc_pay->save();
    }
    else
    {
      $btc_pay = deposit::where('account_name', $req->input('txn_id'))->get();
      $btc_pay->ipn += 1;
      $btc_pay->save();
    }    

  }
  public function bank_deposit(Request $req){
    $user = Auth::User();
    if(!empty($user))
    {
      if($req->input('amt') < env('MIN_DEPOSIT'))
      {
        return back()->With(['toast_msg' => 'Amount must be greater or equal to '.env('MIN_DEPOSIT').' '.$this->st->currency, 'toast_type' => 'err']);
      }
      try{
        $st = site_settings::find(1);
        $paymt = new deposits;
        $paymt->user_id = $user->id;
        $paymt->usn = $user->username;
        $paymt->amount = $req->input('amt') * $st->currency_conversion;
        $paymt->currency = $st->currency;
        $paymt->account_name = $req->input('account_name');
        $paymt->account_no = $req->input('account_no');
        $paymt->bank = "Bank";
        $paymt->url =  "";
        $paymt->status = 0;
        $paymt->on_apr = 0;
        $paymt->pop = "";

        $paymt->save();

        return back()->With(['toast_msg' => 'Deposit saved! Please also submit details of deposit transaction to moderators to speed up funding your wallet via '.env('BANK_DEPOSIT_EMAIL'), 'toast_type' => 'suc']);
      }
      catch(\Exception $e)
      {
        return back()->With(['toast_msg' => 'Error saving your record. Please try again', 'toast_type' => 'err']);
      }
    }
    else
    {
      return redirect('/login');
    }
  }

  public function view_tickets()
  {
    $user = Auth::User();
    if(!empty($user))
    {
      $tickets = ticket::where('user_id', $user->id)->orderby('status', 'desc')->orderby('updated_at', 'desc')->paginate(10);
      return view('user.ticket', ['tickets' => $tickets]);
    }
    else
    {
      return redirect('/login');
    }
  }
  
  public function create_ticket(Request $req)
  {
    $user = Auth::User();
    if(!empty($user))
    {
      $validator = Validator::make($req->all(), [
        'title' => 'string|max:499',
        'msg' => 'string'
      ]);

      if($validator->fails())
      {
        return back()->With([
          'toast_msg' => 'Ticket not created! Error'.$validator->errors()->first(),
          'toast_type' => 'err'
        ]);
      }
      try{
        $ticket = new ticket([
          'ticket_id' => $user->id.strtotime(date('Y-m-d H:i:s')),
          'user_id' => $user->id,
          'title' => $req->input('title'),
          'msg' => $req->input('msg'),
          'status' => 1
        ]);
        $ticket->save();

        // $tickets = ticket::find($user->id);
        return back()->With([
          'toast_msg' => 'Ticket submitted successfully! Admin will attend to you shortly',
          'toast_type' => 'suc',
          // 'tickets' => $tickets
        ]);
      }
      catch(\Exception $e)
      {
        return back()->With([
          'toast_msg' => 'Ticket not created! Error'.$e->getMessage(),
          'toast_type' => 'err'
        ]);
      }

        
    }
    else
    {
      return redirect('/login');
    }
  }
  public function open_ticket($id)
  {
    $user = Auth::User();
    if(!empty($user))
    {
      $ticket_view = ticket::With('comments')->find($id);
      $comments = comments::where('ticket_id', $id)->orderby('id', 'asc')->get(); 
      comments::where('ticket_id', $id)->where('sender', 'support')->update(['state' => 0]);
      return view('user.ticket_chat', ['ticket_view' => $ticket_view, 'comments' => $comments]);
    }
    else
    {
      return redirect('/login');
    }
  }
  
  public function ticket_chat($id)
  {
    $user = Auth::User();
    if(!empty($user))
    {
      $comments = comments::where('ticket_id', $id)->where('sender', 'support')->where('state', 1)->orderby('id', 'asc')->get();     
      comments::where('ticket_id', $id)->where('sender', 'support')->update(['state' => 0]);
      return json_encode($comments);
    }
    else
    {
      return redirect('/login');
    }
  }

  public function close_ticket($id)
  {
    $user = Auth::User();
    if(!empty($user))
    {
      try 
      {
        ticket::where('id', $id)->update(['status' => 0]);
        return back()->with([
          'toast_msg' => 'Ticket closed successfully!',
          'toast_type' => 'suc'
        ]);
      } 
      catch (\Exception $e) 
      {
        return back()->with([
          'toast_msg' => 'Error occured!',
          'toast_type' => 'suc'
        ]);
      } 
    }
    else
    {
      return redirect('/login');
    }
  }

  public function ticket_comment(Request $req)
  {
    $user = Auth::User();
    if(!empty($user))
    {
      $close_check = ticket::find($req->input('ticket_id'));
      if(empty($close_check) || $close_check->status == 0)
      {
        return json_encode([
          'toast_msg' => 'Ticket closed',
          'toast_type' => 'err'
        ]);
      }

      $validator = Validator::make($req->all(), [
        'ticket_id' => 'required|string',
        'msg' => 'required|string'
      ]);

      if($validator->fails())
      {
        return json_encode([
          'toast_msg' => 'Message not sent! Error'.$validator->errors()->first(),
          'toast_type' => 'err'
        ]);
      }

      try
      {        
        $comment = new comments([
          'ticket_id' =>$req->input('ticket_id'),
          'sender' => 'user',
          'sender_id' => $user->id,       
          'message' => $req->input('msg'), 
        ]);
        $comment->save();
        
        return json_encode([
          'toast_msg' => 'Successful! ',
          'toast_type' => 'suc',          
          'comment_msg' => $req->input('msg'),
          'comment_time' => date('Y-m-d H:i:s'),
          'user_img' => $user->img
        ]);
      }
      catch(\Exception $e)
      {        
        return json_encode([
          'toast_msg' => 'Message not sent! Error'.$e->getMessage(),
          'toast_type' => 'err'
        ]);
      }
    }
    else
    {
      return redirect('/login');
    }
  }



}

