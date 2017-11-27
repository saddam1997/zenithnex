</main>




</div>

<footer class="app-footer">
  <a href="#">ZenithNEX</a> &copy; 2017
  <span class="float-right"> <a href="contactus.php">Contact-Us</a>
  </span>
</footer>

<!-- Bootstrap and necessary plugins -->
<script src="js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

<script src="js/popper.min.js"></script>
<script src="js/pace.min.js"></script>
<script type="text/javascript">

  $('.navbar-toggler').click(function(){

    if ($(this).hasClass('sidebar-toggler')) {
      $('body').toggleClass('sidebar-hidden');
    }

    if ($(this).hasClass('sidebar-minimizer')) {
      $('body').toggleClass('sidebar-minimized');
    }

    if ($(this).hasClass('aside-menu-toggler')) {
      $('body').toggleClass('aside-menu-hidden');
    }

    if ($(this).hasClass('mobile-sidebar-toggler')) {
      $('body').toggleClass('sidebar-mobile-show');
    }

  });
  $('.sidebar-close').click(function(){
    $('body').toggleClass('sidebar-opened').parent().toggleClass('sidebar-opened');
  });
  $('#sendBTC').on('modal', function () {
    $('#sendBTC').modal('show');
    $('.modal fade').toggleClass(".fade.show");

  });
         
         function isNumberKey(evt) {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode != 46 && charCode > 31
            && (charCode < 48 || charCode > 57))
            return false;

          return true;
        }
      </script>


      <!-- GenesisUI main scripts -->

      <script src="js/app.js"></script>
      <script type="text/javascript" src="js/sails.io.js"></script>
        <script type="text/javascript">
          io.sails.url = 'http://199.188.206.184:1337';
          window.ioo = io;
          socket = io.connect( 'http://199.188.206.184:1337', {
            reconnection: true,
            reconnectionDelay: 1000,
            reconnectionDelayMax : 5000,
            reconnectionAttempts: 99999
          });

          socket.on( 'connect', function () {
              console.log( 'connected to server' );
          } );

          socket.on( 'disconnect', function () {
              console.log( 'disconnected to server' );
              socket.connect();
          } );

</script>
<script type="text/javascript">
getAllAskBCH();
getAllAskEBT();
getAllAskGDS();
  
  function getAllAskBCH(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradebchmarket/getAllAskBCH",
      data: {},
      success: function(data){
        console.log("getAllAskBCH",data);

        $('#ask_current_BCH').empty();
        if(data.asksBCH){
           $('#ask_current_BCH').append(" &nbsp;"+data.asksBCH[0].askRate+"");

        }
       
       
      
      }
    });
  }
  function getAllAskEBT(){
  $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradeebtmarket/getAllAskEBT",
      data: {},
      success: function(data){

          $('#ask_current_EBT').empty();
          if(data.asksEBT)
          {
          
          $('#ask_current_EBT').append(" &nbsp;"+data.asksEBT[0].askRate+"");
        }

      }
  });
}
function getAllAskGDS(){
            $.ajax({
                type: "POST",
                contentType: "application/json",
                url: url_api+"/tradegdsmarket/getAllAskGDS",
                data: {},
                success: function(data){

                    $('#ask_current_GDS').empty();
                    if(data.asksGDS){
                      $('#ask_current_GDS').append(" &nbsp;"+data.asksGDS[0].askRate+"");

                    }
                    
                    
                    
                }
            });
          }
          io.socket.on('GDS_BID_ADDED', function bidCreated(data){
            io.socket.get(url_api+'/tradegdsmarket/getAllBidGDS',function(err,data){
              console.log("GDS_BID_ADDED::: getAllBidGDS:::", data.body);
              
              getCurrentBidPriceGDS(data.body);
              
            });
          });

          io.socket.on('GDS_ASK_ADDED', function bidCreated(data){
            io.socket.get(url_api+'/tradegdsmarket/getAllASKGDS',function(err,data){
              console.log("GDS_ASK_ADDED::: getAllASKGDS:::", data.body);

              getCurrentAskPriceGDS(data.body);
             
            });
            
          });
          io.socket.on('EBT_BID_ADDED', function bidCreated(data){
            io.socket.get(url_api+'/tradeebtmarket/getAllBidEBT',function(err,data){
              console.log("EBT_BID_ADDED::: getAllBidEBT:::", data.body);
              
              getCurrentBidPriceEBT(data.body);
             

            });
          });
          io.socket.on('EBT_ASK_ADDED', function bidCreated(data){
            io.socket.get(url_api+'/tradeebtmarket/getAllASKEBT',function(err,data){
              console.log("EBT_ASK_ADDED::: getAllASKEBT:::", data.body);

              getCurrentAskPriceEBT(data.body);
              
            });
          });
          io.socket.on('BCH_BID_ADDED', function bidCreated(data){
            io.socket.get(url_api+'/tradebchmarket/getAllBidBCH',function(err,data){
              console.log("BCH_BID_ADDED::: getAllBidBCH:::", data.body);
             
              getCurrentBidPriceBCH(data.body);
              


            });

          });
          io.socket.on('BCH_ASK_ADDED', function bidCreated(data){
            io.socket.get(url_api+'/tradebchmarket/getAllASKBCH',function(err,data){
              console.log("BCH_ASK_ADDED::: getAllASKBCH:::", data.body);

              getCurrentAskPriceBCH(data.body);
              
            });

          });


        </script>

<script>
 $.ajax({
  type: "POST",
  url: url_api+"/user/getAllDetailsOfUser",
  data: {
    userMailId: '<?php echo $user_session;?>'
  },
  cache: false,
  success: function(res)
  {

    var user_details = res.user;
    window.user_details = user_details;


  },
  error: function(err){

  }
});
</script>

</body>

</html>
