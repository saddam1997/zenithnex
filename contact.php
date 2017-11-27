<?php
ob_start();
include 'header.php';
ob_end_flush();
?>
   <style>
hr {
  border:none;
  height: 182px;
border-left: solid 1px #666666;
  
    }
    .form-control {
    display: block;
    width: 100%;
    height: 53px !important;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class=" panel panel-default"> 
                
                <div class="panel-body">
                    
               
            <div class="col-md-5 col-sm-5">
               <form class="form-signin">
                            <h2 class="form-signin-heading">Get In Touch</h2>

                            <label for="inputEmail" class="sr-only">FULL NAME:</label>
                            <input type="text" id="inputEmail" class="form-control" placeholder="FULL NAME" required autofocus><br> <br>                            
                            <label for="inputEmail" class="sr-only">Email Address:</label>
                            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus><br>
                            <label for="inputPassword" class="sr-only">MESSAGE:</label>
                            <textarea cols="5" rows="10" class="form-control" placeholder="Message" required></textarea><br>
                            
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
                          </form>
                    
                       
                    </div>
                    <div class="col-md-1 col-sm-1">
                        <hr class=" hidden-xs">
                    or
                    <hr class=" hidden-xs">
                    </div>
                    
                     <div class="col-md-6 col-sm-5">
                         <h2 class="form-signin-heading">Contact us</h2>
                           <div class="col-md-2" style="text-align: center; margin-top: 60px;">
                               <img src="img/phon.png" alt=""> 123456789
                           </div>
                           <div class="col-md-1"></div>
                           <div class="col-md-2" style="text-align: center; margin-top: 60px;">
                               <img src="img/email.png" alt="">support@gmail.com
                           </div>
                     </div>
               </div>
            </div>
           
            
        </div>
         </div>
    </div>
    
</div>





            <?php
            include 'footerz.php';
            ?>



            <script>
                io.socket.on('bidcreated', function bidCreated(data) {
                    //console.log('data', data);
                    var bid_orders = $.parseJSON(data);
                    console.log(bid_orders);
                    /*for( var i=0; i<10; i++){*/

                    $('#bid_btc').append('<tr><td>' + bid_orders.bids[i].bidAmountBTC + '</td><td>' + bid_orders.bids[i].bidAmountBCH + '</td><td>' + bid_orders.bids[i].bidRate + '</td></tr>')
                    /* }*/
                    console.log('message alert!', data);
                });
 
               

                function bidAmountBTC() {
                    var a = document.getElementById('bidAmountBCH').value;
                    var b = document.getElementById('bidRateBCH').value;
                    var result = parseFloat(a) * parseFloat(b);
                    if (!isNaN(result)) {
                        document.getElementById('bidAmountBTC').value = result;
                    }
                }

                function askBTCAmount() {
                    var a = document.getElementById('askBCHAmount').value;
                    var b = document.getElementById('askRateBCH').value;
                    var result = parseFloat(a) * parseFloat(b);
                    if (!isNaN(result)) {
                        document.getElementById('askBTCAmount').value = result;
                    }
                }
 

                function del(bidIdBCH,bidownerId) {
                    //console.log('uid' + bidIdBCH + 'bidowner' + bidownerId);
                    if (confirm("Do You Want To Delete!")) {
                        $.ajax({
                            type: "POST",
                            url: url_api + '/tradebchmarket/removeBidBCHMarket',
                            data: {
                                "bidIdBCH": bidIdBCH,
                                "bidownerId": bidownerId
                            },
                            success: function(result){
                                 alert('Data Delete successfull');
                            }
                        });
                    }
                }

                function del_ask(askIdBCH,askownerId) {
                    if (confirm("Do You Want To Delete!")) {
                        $.ajax({
                            type: "POST",
                            url: url_api + '/tradebchmarket/removeAskBCHMarket',
                            data: {
                                "askIdBCH":askIdBCH,
                                "askownerId":askownerId

                            },
                            success: function(result){
                                alert('Data Delete successfull');
                            }
                        });
                    }
                }
            
                /*all data details*/
                $.ajax({ 
                    type: "POST", url: "http://192.168.1.18:1338/user/getAllDetailsOfUser", 
                    data: {
                        userMailId: "penny.saddam@gmail.com"
                    }, 
                    cache: false, success: function(res)
                    { 
                        //console.log('allbids' + res);
                        bid=res.user.bidsBCH;
                        ask=res.user.asksBCH;
                        var finalObj = bid.concat(ask);
                        
                         $('#avalBCHBalance').append(res.user.BCHbalance+" ");
                        $('#freezeBCHBalance').append(res.user.FreezedBCHbalance+" ");

                        $('#avalBTCBalance').append(res.user.BTCbalance+" ");
                        $('#freezeBTCBalance').append(res.user.FreezedBTCbalance+" ");

                        for( var i=0; i<=finalObj.length; i++)
                        {   
                            if(finalObj[i].status == 2 ){
                                if(finalObj[i].bidAmountBCH){
                                    $('#open_bid_bch').append('<tr><td>'
                                        +finalObj[i].createdAt+
                                        '</td><td>BID</td><td>'
                                        +finalObj[i].bidAmountBCH+
                                        '</td><td>'
                                        +finalObj[i].bidRate+
                                        '</td><td>'
                                        +finalObj[i].totalbidAmountBCH+ 
                                        '</td><td>'
                                        +finalObj[i].totalbidAmountBTC+
                                        '</td><td><a class="btn btn-danger" style="height:40px !important;" onclick="del(id='+finalObj[i].id +',ownwe='+finalObj[i].bidownerBCH+');">Remove</a></td></tr>');
                                }
                                else{
                                    $('#open_ask_bch').append('<tr><td>'
                                        +finalObj[i].createdAt+
                                        '</td><td>ask</td><td>'
                                        +finalObj[i].askAmountBCH+
                                        '</td><td>'
                                        +finalObj[i].askRate+
                                        '</td><td>'
                                        +finalObj[i].totalaskAmountBCH+ 
                                        '</td><td>'
                                        +finalObj[i].totalaskAmountBTC+
                                        '</td><td><a class="btn btn-danger" style="height:40px !important;" onclick="del_ask(id='+finalObj[i].id+',askownerBCH='+finalObj[i].askownerBCH+');" >Remove</a>'+
                                        '</td></tr>');
                                }
                            }
                        }
                          
                    }, 
                        error: function(err){ 
                            console.log(err); alert(err); 
                        } 
                    });

            /*asks data details BCH*/
               $.ajax({
                    url: url_api + '/tradebchmarket/getAllAskBCH',
                    dataType: 'text',
                    type: 'post',
                    contentType: 'application/json',
                    data: {},
                  
                    success: function (res) {
                        //console.log(res);
                        var ask_orders = $.parseJSON(res);
                       $('#ask_current_BCH').append(" &nbsp;"+ask_orders.asksBCH[0].askRate+"");
                        for (var i = 0; i < 10; i++) {
                            

                            $('#ask_btc_bch').append('<tr><td>' + ask_orders.asksBCH[i].askAmountBTC + '</td><td>' + ask_orders.asksBCH[i].askAmountBCH + '</td><td>' + ask_orders.asksBCH[i].askRate + '</td></tr>')
                        }
                    }
                });

              /*Bid Data details*/
               $.ajax({
                    url: url_api + '/tradebchmarket/getAllBidBCH',
                    dataType: 'text',
                    type: 'post',
                    contentType: 'application/json',
                    data: {},
                  
                    success: function (res) {
                        //console.log(res);

                        var bid_orders = $.parseJSON(res);
                        $('#bid_current_BCH').append(" &nbsp;"+bid_orders.bidsBCH[0].bidRate+"");
                        for (var i = 0; i < 10; i++) {
                            console.log('all bids' + bid_orders.bidsBCH[i].bidAmountBTC );
                            $('#bid_btc_bch').append('<tr><td>' + bid_orders.bidsBCH[i].bidAmountBTC + '</td><td>' + bid_orders.bidsBCH[i].bidAmountBCH + '</td><td>' + bid_orders.bidsBCH[i].bidRate + '</td></tr>')
                        }
                    }
                });
               
               /*asks data details GDS*/ 
                $.ajax({
                    url: url_api+'/tradegdsmarket/getAllAskGDS',
                    type: 'post',
                    contentType: 'application/json',
                    data: {},
                  
                    success: function (res) {
                        //console.log(res);
                        var ask_orders = $.parseJSON(res);
                        $('#ask_current_GDS').append(" &nbsp;"+ask_orders.asksGDS[0].askRate+"");
                        for (var i = 0; i < 10; i++) {

                            $('#ask_btc_gds').append('<tr><td>' + ask_orders.asksGDS[i].askAmountBTC + '</td><td>' + ask_orders.asksGDS[i].askAmountGDS + '</td><td>' + ask_orders.asksGDS[i].askRate + '</td></tr>')
                        }
                    }
                });

                /*Bids data details GDS*/
                $.ajax({
                    url: url_api+'/tradegdsmarket/getAllBidGDS',
                    dataType: 'text',
                    type: 'post',
                    contentType: 'application/json',
                    data: {},
                  
                    success: function (res) {
                        //console.log(res);
                        var bid_orders = $.parseJSON(res);
                        $('#bid_current_GDS').append(" &nbsp;"+bid_orders.bidsGDS[0].bidRate+"");
                        for (var i = 0; i < 10; i++) {

                            $('#bid_btc_gds').append('<tr><td>' + bid_orders.bidsGDS[i].bidAmountBTC + '</td><td>' + bid_orders.bidsGDS[i].bidAmountGDS + '</td><td>' + bid_orders.bidsGDS[i].bidRate + '</td></tr>')
                        }
                    }
                });

                /*asks data details EBT*/
                $.ajax({
                    url: '<?php echo $url_api; ?>/tradeebtmarket/getAllAskEBT',
                    dataType: 'text',
                    type: 'post',
                    contentType: 'application/json',
                    data: {},
                  
                    success: function (res) {
                        //console.log(res);
                        var ask_orders = $.parseJSON(res);
                         $('#ask_current_EBT').append(" &nbsp;"+ask_orders.asksEBT[0].askRate+"");
                        for (var i = 0; i < 10; i++) {

                            $('#ask_btc_ebt').append('<tr><td>' + ask_orders.asksEBT[i].askAmountBTC + '</td><td>' + ask_orders.asksEBT[i].askAmountEBT + '</td><td>' + ask_orders.asksEBT[i].askRate + '</td></tr>')
                        }
                    }
                });


                /*bids data details EBT*/
                $.ajax({
                    url: url_api+'/tradeebtmarket/getAllBidEBT',
                    dataType: 'text',
                    type: 'post',
                    contentType: 'application/json',
                    data: {},
                  
                    success: function (res) {
                        //console.log(res);
                        var bid_orders = $.parseJSON(res);
                        $('#bid_current_EBT').append(" &nbsp;"+bid_orders.bidsEBT[0].bidRate+"");
                        for (var i = 0; i < 10; i++) {

                            $('#bid_btc_ebt').append('<tr><td>' + bid_orders.bidsEBT[i].bidAmountBTC + '</td><td>' + bid_orders.bidsEBT[i].bidAmountEBT + '</td><td>' + bid_orders.bidsEBT[i].bidRate + '</td></tr>')
                        }
                    }
                });
/**********************buy data*********************************************************************************/
                function buy_data_bch() {
                    alert('hello');

                    var bidAmountBCH = document.getElementById('bidAmountBCH').value;
                    var bidRateBCH = document.getElementById('bidRateBCH').value;
                    var bidAmountBTC = document.getElementById('bidAmountBTC').value;
                   
                    var bidownerId='1';
                    var spendingPassword='12';
                    var dataString = 'bidAmountBTC='+ bidAmountBTC + '&bidAmountBCH='+ bidAmountBCH + '&bidRate='+ bidRateBCH + '&bidownerId='+ bidownerId + '&spendingPassword='+ spendingPassword;
                    if(!dataString)
                    {
                        alert(dataString);
                    }
                    else{
                        alert(dataString);
                        $.ajax({
                            type: "POST",
                            url: "<?php echo $url_api;?>/tradebchmarket/addBidBchMarket",
                            data: dataString,
                            
                        
                            success: function(result){
                            alert(result);
                            }
                        });
                    }
                   
                     
                    
                }

                function sell_data() 
                {
                    //  alert('hello');
                    var askBCHAmount = document.getElementById('askBCHAmount').value;
                    var askRateBCH = document.getElementById('askRateBCH').value;
                    var askBTCAmount = document.getElementById('askBTCAmount').value;
                    var bidownerId='1';
                    var spendingPassword='12';
                    var dataString = 'askAmountBTC='+ askBTCAmount + '&askAmountBCH='+ askBCHAmount + '&askRate='+ askRateBCH + '&askownerId='+ bidownerId + '&spendingPassword='+ spendingPassword;
                   
                    if(!dataString)
                    {
                        alert(dataString);
                    }
                    else{
                        alert(dataString);
                        $.ajax({
                            type: "POST",
                            url: "<?php echo $url_api;?>/tradebchmarket/addAskBchMarket",
                            data: dataString,
                            success: function(result){
                            alert(result);
                            }
                        });
                    }
                }

$('#myTab a').click(function (e) {
     e.preventDefault();
     $(this).tab('show');
});

$(function () {
$('#myTab a:last').tab('show');
})    
            </script>
           

