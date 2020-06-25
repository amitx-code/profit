<div id="succ" class="container popmsgContainer">
    <div class="row" style="padding: 5% 2%;">
      <div class="col-md-4">&emps;</div>
      <div class="col-md-4 popmsg-mobile" style=" border-radius: 7px; background-color: #FFF; min-height: 200px;" align="Center">
        <!-- <span style="float: right; margin-top: -40px; margin-right: -40px; z-index: 10; ">            
          <a id="succ_close" href="javascript:void(0)" class="btn btn-danger">X</a>        
        </span> -->
        <div class="panel-heading" style="">
          <h3>Message</h3>               
          <hr>
        </div>
        <div id="" style="margin-top: -30px; padding: 15px">
                
                <p align="center" style="color:green">
                    <i class="fa fa-check-circle fa-4x"></i><br>
                    <span id="succ_msg"></span>
                    <br>
                </p>
        </div>

        <div>
          <span style="">            
            <a id="succ_close" href="javascript:void(0)" class="btn btn-success">Okay</a>        
          </span>
          <br><br><br><br>
        </div>

        <!-- close btn -->
        <script type="text/javascript">
          $('#succ_close').click( function(){
            $('#succ').hide();
          });        
        </script>
        <!-- end close btn -->

      </div>

    </div>
  </div>

  <div id="errr" class="container popmsgContainer" >
    <div class="row" style="padding: 5% 2%;">
      <div class="col-md-4">&emps;</div>

      <div class="col-md-4 popmsg-mobile" style="border-radius: 7px; background-color: #FFF; min-height: 200px;" align="Center">
        <!-- <span style="float: right; margin-top: -40px; margin-right: -40px; z-index: 10; ">            
          <a id="succ_close" href="javascript:void(0)" class="btn btn-danger">X</a>        
        </span> -->
        <div class="panel-heading" style="">
          <h3>Message</h3>               
          <hr>
        </div>
        <div id="" style="margin-top: -30px; padding: 15px">
                
                <p align="center" style="color:#903;">
                    <i class="fa fa-ban fa-4x"></i><br>
                    <span id="errr_msg"></span>
                    <br>
                </p>
        </div>

        <div>
          <span style="">            
            <a id="errr_close" href="javascript:void(0)" class="btn btn-danger">Okay</a>        
          </span>
          <br><br><br><br>
        </div>

        <!-- close btn -->
        <script type="text/javascript">
          $('#errr_close').click( function(){
            $('#errr').hide();
          });        
        </script>
        <!-- end close btn -->

      </div>

    </div>
  </div>
  
  <div id="readmsg" class="container popmsgContainer" style="">
    <div class="row" style="padding: 5% 2%;">
      <div class="col-md-4">&emps;</div>
      <div class="col-md-4 popmsg-mobile" style="background-color: #FFF; padding:0px; margin-top: 0px; border-radius:6px;" align="Center">
            <span style="float: right; margin-top: -40px; margin-right: 0px; z-index: 10; ">            
                <a id="readmsg_close" href="javascript:void(0)" class="btn btn-danger">X</a>        
            </span>   
          <div class="sparkline8-list shadow-reset mg-tb-30" style="margin: 0px;">
              <div class="sparkline8-hd" style="border-radius:6px;">
                  <div class="main-sparkline8-hd">
                      <h1>Read Messages</h1>
                  </div>
              </div>
              <div class="">
                  <div class="" >
                      <div class="scroll" style="padding: 15px; height:540px;">
                          <p id="msgC" align="justify">
                            
                          </p>
                      </div>
                      
                  </div>
                  
              </div>
          
        </div>

        

        <!-- close btn -->
        <script type="text/javascript">
          $('#readmsg_close').click( function(){
            $('#readmsg').hide();
          });        
        </script>
        <!-- end close btn -->

      </div>

    </div>
  </div><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/user/inc/alert.blade.php ENDPATH**/ ?>