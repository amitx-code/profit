 <!-- Footer Start-->
    <div class="footer-copyright-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-copy-right">
                        <p>Copyright &#169; <?php echo e(date("Y")); ?> Diamond Hub Plus. All Rights Reserved. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="p_loading" class="container" style="min-width: 100%; background-color: rgba(0,0,0,.6); position: fixed; top: 0; left: 0; bottom: 0; width: 100%; z-index: 20; display: none;">
      <div class="row">
        <div class="col-md-4">&emps;</div>
        <div class="col-md-4" style="margin-top: 25%; color: #FFF;" align="Center">
          <img src="/img/loader.gif" style="height: 30px; width: 30px;">
          <br>
          Loading....
        </div>
      </div>
    </div>

    <!-- Footer End-->
    <!-- Chat Box Start-->
   <!--  <div class="chat-list-wrap">
        <div class="chat-list-adminpro">
            <div class="chat-button">
                <span data-toggle="collapse" data-target="#chat" class="chat-icon-link"><i class="fa fa-comments"></i></span>
            </div>
            <div id="chat" class="collapse chat-box-wrap shadow-reset animated zoomInLeft">
                <div class="chat-main-list">
                    <div class="chat-heading">
                        <h2>Messanger</h2>
                    </div>
                    <div class="chat-content chat-scrollbar">
                        <div class="author-chat">
                            <h3>Monica <span class="chat-date">10:15 am</span></h3>
                            <p>Hi, what you are doing and where are you gay?</p>
                        </div>
                        <div class="client-chat">
                            <h3>Mamun <span class="chat-date">10:10 am</span></h3>
                            <p>Now working in graphic design with coding and you?</p>
                        </div>
                        <div class="author-chat">
                            <h3>Monica <span class="chat-date">10:05 am</span></h3>
                            <p>Practice in programming</p>
                        </div>
                        <div class="client-chat">
                            <h3>Mamun <span class="chat-date">10:02 am</span></h3>
                            <p>That's good man! carry on...</p>
                        </div>
                    </div>
                    <div class="chat-send">
                        <input type="text" placeholder="Type..." />
                        <span><button type="submit">Send</button></span>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <!-- Chat Box End-->
    
    <script src="/js/wow/wow.min.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="/js/counterup/jquery.counterup.min.js"></script>
    <script src="/js/counterup/waypoints.min.js"></script>
    <script src="/js/counterup/counterup-active.js"></script>


    
    <!-- jvectormap JS
		============================================ -->
    <script src="/js/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="/js/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/js/jvectormap/jvectormap-active.js"></script>
    <!-- peity JS
		============================================ -->
    <script src="/js/peity/jquery.peity.min.js"></script>
    <script src="/js/peity/peity-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="/js/sparkline/sparkline-active.js"></script>
    <!-- flot JS
		============================================ -->
    <script src="/js/flot/jquery.flot.js"></script>
    <script src="/js/flot/jquery.flot.tooltip.min.js"></script>
    <script src="/js/flot/jquery.flot.spline.js"></script>
    <script src="/js/flot/jquery.flot.resize.js"></script>
    <script src="/js/flot/jquery.flot.pie.js"></script>
    <script src="/js/flot/jquery.flot.symbol.js"></script>
    <script src="/js/flot/jquery.flot.time.js"></script>
    <script src="/js/flot/dashtwo-flot-active.js"></script>
    <!-- data table JS
		============================================ -->
    <script src="/js/data-table/bootstrap-table.js"></script>
    <script src="/js/data-table/tableExport.js"></script>
    <script src="/js/data-table/data-table-active.js"></script>
    <script src="/js/data-table/bootstrap-table-editable.js"></script>
    <script src="/js/data-table/bootstrap-editable.js"></script>
    <script src="/js/data-table/bootstrap-table-resizable.js"></script>
    <script src="/js/data-table/colResizable-1.5.source.js"></script>
    <script src="/js/data-table/bootstrap-table-export.js"></script>
    <!-- main JS
		============================================ -->
	<script src="/js/main.js"></script>
		
		
    <div id="err" class="alert alert-danger popup_alert_err" >
	</div>
	<div id="suc" class="alert alert-success popup_alert_suc">
	</div>
    
    
</body>

</html>

 <?php echo $__env->make('user.inc.alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

 <?php if(Session::has('status')  && Session::get('msgType') == 'suc'): ?>         
        <script type="text/javascript">            
            $('#succ').show();
        </script>
        <?php echo e(Session::forget('status')); ?>

        <?php echo e(Session::forget('msgType')); ?>         
    <?php elseif(Session::has('status')  && Session::get('msgType') == 'err'): ?>        
        <script type="text/javascript">
            $('#errr_msg').html('<?php echo e(Session::get('status')); ?>');
            $('#errr').show();
        </script>
        <?php echo e(Session::forget('status')); ?>

        <?php echo e(Session::forget('msgType')); ?>

    <?php endif; ?><?php /**PATH /home/diamondhubplus/public_html/wallet/resources/views/admin/temp/foot.blade.php ENDPATH**/ ?>