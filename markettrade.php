<?php
ob_start();
include 'header.php';
page_protect();
if (!isset($_SESSION['user_id'])) {
  header("location:logout.php");
}
$user_session = $_SESSION['user_session'];
ob_end_flush();
?>

<div id="asks_orders"></div>
<div class="container-fluid no-padding">
  <div class="animated fadeIn">
    <div class="row">

      <div class="col-sm-12 col-md-12">
        <div class="tab-content" id="myTabContent">

          <div class="panel panel-default text-center ">

           <p><div id="container1"></div></p>
         </div>
         <div class="tab-pane fade show active bg-default" id="home" role="tabpanel" aria-labelledby="home-tab">
          <div class="text-center">
            <h3>Order Book</h3>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="row">
                <div class="col-sm-5 col-sm-offset-1">
                  <div class="panel panel-default">
                    <div class="panel-heading bidhead">BID <small class="pull-right" > BTC <span id ="bid_Total_btc"></span> | BCH <span id ="bid_Total_bch"></span></small></div>
                    <div class="panel-body bidset">
                      <div class="table-responsive">
                        <table class="table table-striped order-table table-hover">
                          <thead class="thead-dark">
                            <tr>
                              <th>Total(BTC)</th>
                              <th>Vol(BCH)</th>
                              <th>Bid(BTC)</th>
                            </tr>
                          </thead>
                          <tbody id="bid_btc_bch">

                          </tbody>

                        </table>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-5">
                  <div class="panel panel-default">
                    <div class="panel-heading askhead">ASK <small class="pull-right" > BTC <span id ="ask_Total_btc"></span> | BCH <span id ="ask_Total_bch"></span></small></div>

                    <div class="panel-body askset">
                      <div class="table-responsive">
                        <table class="table table-striped table-hover">
                          <thead>
                            <tr>
                              <th>Total(BTC)</th>

                              <th>Vol(BCH)</th>
                              <th>Ask(BTC)</th>
                            </tr>
                          </thead>
                          <tbody id="ask_btc_bch">

                          </tbody>

                        </table>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>

            <div class="col-md-3" style="margin-top: 14px;">

              <div class="panel panel-default">
                <div class="panel-heading">Buy Bitcoin Cash
                 <small class="pull-right" > Available Balance: <span id ="avalBTCBalance"></span>BTC <br> Freeze Balance: <span id="freezeBTCBalance"></span>BTC</small>
               </div>
               <div class="panel-body ">

                <div class="input-group margin-top">
                  <span class="input-group-addon">Units</span>
                  <input type="number" step="0.00001" onkeyup="bidAmountBTC()" name="bidAmountBCH"
                  id="bidAmountBCH" class="form-control txt"
                  aria-label="Amount (to the nearest dollar)">
                  <span class="input-group-addon">BCH</span>
                </div>
                <div class="input-group margin-top">
                  <span class="input-group-addon">Bid &nbsp;&nbsp;</span>
                  <input type="number" step="0.00001" onkeyup="bidAmountBTC()" name="bidRate"
                  id="bidRateBCH" class="form-control txt"
                  aria-label="Amount (to the nearest dollar)">
                  <span class="input-group-addon">BTC</span>
                </div>
                <div class="input-group margin-top">
                  <span class="input-group-addon">Total</span>
                  <input type="number" step="0.00001" onkeyup="bidAmountTotalBTC()" name="bidAmountBTC" id="bidAmountBTC"
                  class="form-control bidAmountBTC1"
                  aria-label="Amount (to the nearest dollar)">
                  <span class="input-group-addon">BTC</span>
                </div>
                <div class="row">
                  <button onclick="buy_data_bch();" class="btn btn-success btn-sm col-xs-3" type="button" id="butval" style="width:100% ;background-color: #adc396" >Buy
                  </button>
                  <div id="error_message1" class="pull-right" style="color: red; margin-top: 20px;"></div>
                  <!-- <input class="btn btn-success col-xs-3 btn-sm" id="reset" type="button"  value="RESET"> -->
                </div>

              </div>
            </div>


            <div class="panel panel-default">
              <div class="panel-heading">Sell Bitcoin Cash
                <small class="pull-right" > Available Balance:<span id ="avalBCHBalance"></span>BCH <br> Freeze Balance: <span id="freezeBCHBalance"></span>BCH</small>
              </div>
              <div class="panel-body">

                <div class="input-group margin-top">
                  <span class="input-group-addon">Units</span>
                  <input type="number" step="0.00001" id="askBCHAmount" name="askAmountBCH"
                  onkeyup="askBTCAmount()" class="form-control"
                  aria-label="Amount (to the nearest dollar)">
                  <span class="input-group-addon">BCH</span>
                </div>
                <div class="input-group margin-top">
                  <span class="input-group-addon">Ask &nbsp;</span>
                  <input type="number" step="0.00001" onkeyup="askBTCAmount()" name="askRate"
                  id="askRateBCH" class="form-control"
                  aria-label="Amount (to the nearest dollar)">
                  <span class="input-group-addon">BTC</span>
                </div>
                <div class="input-group margin-top">
                  <span class="input-group-addon">Total</span>
                  <input ttype="number" step="0.00001" onkeyup="askBTCTotalAmount()"  id="askBTCAmount" name="askAmountBTC"
                  class="form-control" aria-label="Amount (to the nearest dollar)">
                  <span class="input-group-addon">BTC</span>
                </div>
                <div class="row">
                  <button onclick="sell_data();" class="btn btn-danger btn-sm col-xs-3"
                  type="button" id="butval" style="width:100%; background-color: #e49f9e">Sell
                </button>
                <div id="error_message" class="pull-right" style="color: red; margin-top: 20px;"></div>
              </div>
              <!-- <input class="btn btn-success btn-sm" type="reset" onclick="WebSocketTest()" value="RESET"> -->

            </div>
          </div>


        </div>
      </div>
    </div>
    <div class="panel panel-default" style="position:relative">
      <div class="text-center"><h3>My Open Orders</h3></div>

      <div class="panel-body openmaket">
        <div class="table-responsive">
          <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ORDER DATE</th>
                <th>BID/ASK</th>
                <th>UNITS FILLED BCH</th>
                <th>ACTUAL RATE</th>
                <th>UNITS TOTAL BCH</th>
                <th>UNITS TOTAL BTC</th>
                <th>ACTION</th>
              </tr>
            </thead>

            <tbody id="open_bid_bch">

            </tbody>
            <tbody id="open_ask_bch">

            </tbody>
          </table>
        </div>
      </div>
    </div>

    <div class="panel panel-default" style="position:relative">
      <div class=" text-center"><h3>Market</h3></div>
      <div class="panel-body market">
        <div class="table-responsive">
          <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ORDER DATE</th>
                <th>BID/ASK</th>
                <th>UNITS FILLED BCH</th>
                <th>ACTUAL RATE</th>
                <th>UNITS TOTAL BCH</th>
                <th>UNITS TOTAL BTC</th>
              </tr>
            </thead>

            <tbody id="market_bid_bch">

            </tbody>
            <tbody id="market_ask_bch">

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>
</div>
</div>
</div>
</div>
<?php
include 'footer.php';
?>
<script>
  getAllDetailsOfUser();
  getAllBidBCH();
  getAllAskBCH();
  getAllBidTotalBCH();
  getAllAskTotalBCH();
  /*----------------BCH Market Functions ---------------*/
  function getAllBidBCH(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradebchmarket/getAllBidBCH",
      data: {},
      success: function(data){
        console.log("getAllBidBCH",data);
        var bid_orders = data;
        $('#bid_btc_bch').empty();

        $('#bid_current_BCH').append(" &nbsp;"+bid_orders.bidsBCH[0].bidRate+"");

        console.log("bid_orders",bid_orders);
        if(data.bidsBCH){
          for (var i = 0; i < bid_orders.bidsBCH.length; i++) {
            console.log(data.bidsBCH[i].status);
            if(i==bid_orders.bidsBCH.length) break;
            if(data.bidsBCH[i].status != 1){
              console.log("data.bidsBCH[i].status",data.bidsBCH[i].bidAmountBTC);

              $('#bid_btc_bch').append('<tr><td>' + bid_orders.bidsBCH[i].bidAmountBTC + '</td><td>' + bid_orders.bidsBCH[i].bidAmountBCH + '</td><td>' + bid_orders.bidsBCH[i].bidRate + '</td></tr>')
            }
          }
        }
        if (data.statusCode!=200)
        {
          $('#error_message1').append(" &nbsp;"+data.message+"");
        }
      }
    });
  }
  function getAllBidTotalBCH(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradebchmarket/getAllBidBCH",
      data: {},
      success: function(data){
        console.log("totalgetAllBidBCH",data);
        var bid_orders = data;
        $('#bid_Total_btc').empty();
        $('#bid_Total_bch').empty();
        if(bid_orders.bidAmountBTCSum && bid_orders.bidAmountBCHSum){
          

           $('#bid_Total_btc').append(" &nbsp;"+bid_orders.bidAmountBTCSum.toFixed(5)+"");
         $('#bid_Total_bch').append(" &nbsp;"+bid_orders.bidAmountBTCSum.toFixed(5)+"");

        
        }

       
      }
    });
  }
  function getAllAskBCH(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradebchmarket/getAllAskBCH",
      data: {},
      success: function(data){
        console.log("getAllAskBCH",data);
        $('#ask_current_BCH').empty();
        $('#ask_current_BCH').append(" &nbsp;"+data.asksBCH[0].askRate+"");
        if(data.asksBCH){
          for (var j = 0; j < data.asksBCH.length; j++){
            if(j==data.asksBCH.length) break;
            if(data.asksBCH[j].status != 1){
              console.log("data.asksBCH[j].status",data.asksBCH[j]);

              $('#ask_btc_bch').append('<tr><td>' + data.asksBCH[j].askAmountBTC + '</td><td>' + data.asksBCH[j].askAmountBCH + '</td><td>' + data.asksBCH[j].askRate + '</td></tr>');
            }
          }
        }

        if (data.statusCode!=200)
        {
          $('#error_message1').append(" &nbsp;"+data.message+"");
        }
      }
    });
  }
  function getAllAskTotalBCH(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradebchmarket/getAllAskBCH",
      data: {},
      success: function(data){
        console.log("getAllAskBCH",data);
        $('#ask_Total_btc').empty();
        $('#ask_Total_bch').empty();

        $('#ask_Total_btc').append(" &nbsp;"+data.askAmountBTCSum.toFixed(5)+"");
        $('#ask_Total_bch').append(" &nbsp;"+data.askAmountBCHSum.toFixed(5) +"");

        
      }
    });
  }
  function getCurrentBidPriceBCH(data){
    if(data.bidsBCH){
      console.log("getCurrentBidPriceBCH",data.bidsBCH[0].bidRate);
      $('#bid_current_BCH').empty();
      $('#bid_current_BCH').append(" &nbsp;"+data.bidsBCH[0].bidRate+"");
    }
  }
  function getCurrentAskPriceBCH(data){
    if(data.asksBCH){
      console.log("getCurrentAskPriceBCH",data.asksBCH[0].askRate);
      $('#ask_current_BCH').empty();
      $('#ask_current_BCH').append(" &nbsp;"+data.asksBCH[0].askRate+"");
    }
  }
  function orderBookBidBCH(data){
    console.log("orderBookBidBCH",data);
    var bid_orders = data;
    $('#bid_btc_bch').empty();

    if(data.bidsBCH){
      for (var i = 0; i < bid_orders.bidsBCH.length; i++) {
        if(i==bid_orders.bidsBCH.length) break;
        if(data.bidsBCH[i].status != 1){
          console.log("data.bidsBCH[i].status",data.bidsBCH[i].bidAmountBTC);

          $('#bid_btc_bch').append('<tr><td>' + bid_orders.bidsBCH[i].bidAmountBTC + '</td><td>' + bid_orders.bidsBCH[i].bidAmountBCH + '</td><td>' + bid_orders.bidsBCH[i].bidRate + '</td></tr>')
        }
      }
    }
  }
  function orderBookAskBCH (data) {
    console.log("orderBookAskBCH",data);
    $('#ask_btc_bch').empty();
    if(data.asksBCH){
      for (var j = 0; j < data.asksBCH.length; j++){
        if(j==data.asksBCH.length) break;
        if(data.asksBCH[j].status != 1){

          $('#ask_btc_bch').append('<tr><td>' + data.asksBCH[j].askAmountBTC + '</td><td>' + data.asksBCH[j].askAmountBCH + '</td><td>' + data.asksBCH[j].askRate + '</td></tr>');
        }
      }
    }
  }
  function getBidsBCHSuccess(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradebchmarket/getBidsBCHSuccess",
      data: {},
      success: function(data){
        $('#market_bid_bch').empty();

        var bid_orders = data;

        for (var i = 0; i < 10; i++) {
          if(i==bid_orders.bidsBCH.length) break;
          $('#market_bid_bch').append('<tr><td>' + bid_orders.bidsBCH[i].createTimeUTC + '</td>'+
            '</td><td>BID</td><td>' + bid_orders.bidsBCH[i].bidAmountBTC + '</td><td>' + bid_orders.bidsBCH[i].bidAmountBCH + '</td><td>'+ bid_orders.bidsBCH[i].totalbidAmountBTC + '</td><td>'+ bid_orders.bidsBCH[i].totalbidAmountBCH + '</td></tr>')
        }

      }
    });
  }
  function getAsksBCHSuccess(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradebchmarket/getAsksBCHSuccess",
      data: {},
      success: function(data){
        $('#market_ask_bch').empty();
        var ask_orders = data;

        for (var i = 0; i < 10; i++){
          if(i==data.asksBCH.length) break;
          $('#market_ask_bch').append('<tr><td>' + ask_orders.asksBCH[i].createTimeUTC + '</td>' +
            '</td><td>ASK</td><td>'+ ask_orders.asksBCH[i].askAmountBTC + '</td><td>' + ask_orders.asksBCH[i].askAmountBCH + '</td><td>'+ ask_orders.asksBCH[i].totalaskAmountBTC + '</td><td>'+ ask_orders.asksBCH[i].totalaskAmountBCH + '</td></tr>')
        }

      }
    });
  }
  /*-----------------USERS details function-----------------*/
  function getAllDetailsOfUser(){
    $.ajax({
      type: "POST", url: url_api+ "/user/getAllDetailsOfUser",
      data: {
        userMailId: '<?php echo $user_session;?>'
      },
      success: function(res)
      {
        console.log("getAllDetailsOfUser", res);
        getUserBTCBalance(res);
        getUserBCHBalance(res);

        userBCHOpenOrders(res);
        userBCHClosedOrders(res);

      },
      error: function(err){
      }
    });
  }
  function getUserBTCBalance(details){
    $('#avalBTCBalance').empty();
    $('#freezeBTCBalance').empty();
    $('#avalBTCBalance').append(details.user.BTCbalance.toFixed(5)+" ");
    $('#freezeBTCBalance').append(details.user.FreezedBTCbalance+" ");
  }
  function getUserBCHBalance(details){
    console.log("getUserBCHBalance",details.user.BCHbalance);
    $('#avalBCHBalance').empty();
    $('#freezeBCHBalance').empty();
    $('#avalBCHBalance').append(details.user.BCHbalance+" ");
    $('#freezeBCHBalance').append(details.user.FreezedBCHbalance+" ");
  }
  function userBCHOpenOrders(details){
    console.log("userOpenOrders:::details::",details);
    $('#open_bid_bch').empty();
    $('#open_ask_bch').empty();
    bid=details.user.bidsBCH;
    ask=details.user.asksBCH;
    var finalObj = bid.concat(ask);
    console.log("userOpenOrders",finalObj);
    for( var i=0; i<finalObj.length; i++)
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
            '</td><td><a class="text-danger" onclick="del(id='+finalObj[i].id +',ownwe='+finalObj[i].bidownerBCH+');"><i class="fa fa-window-close fa-2x" aria-hidden="true"></i></a></td></tr>');
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
            '</td><td><a class="text-danger" onclick="del_ask(id='+finalObj[i].id+',askownerBCH='+finalObj[i].askownerBCH+');" ><i class="fa fa-window-close fa-2x" aria-hidden="true"></i></a>'+
            '</td></tr>');
        }
      }

    }
  }
  function userBCHClosedOrders(details){
    $('#market_bid_bch').empty();
    $('#market_ask_bch').empty();
    bid=details.user.bidsBCH;
    ask=details.user.asksBCH;
    var finalObj = bid.concat(ask);
    console.log("userClosedOrders",finalObj);
    for( var i=0; i<finalObj.length; i++)
    {
      if(finalObj[i].status == 1 )
      {
        if(finalObj[i].bidAmountBCH){
          $('#market_bid_bch').append('<tr><td>'
            +finalObj[i].createdAt+
            '</td><td>BID</td><td>'
            +finalObj[i].bidAmountBCH+
            '</td><td>'
            +finalObj[i].bidRate+
            '</td><td>'
            +finalObj[i].totalbidAmountBCH+
            '</td><td>'
            +finalObj[i].totalbidAmountBTC+
            '</td></tr>');
        }
        else{
          $('#market_ask_bch').append('<tr><td>'
            +finalObj[i].createdAt+
            '</td><td>ask</td><td>'
            +finalObj[i].askAmountBCH+
            '</td><td>'
            +finalObj[i].askRate+
            '</td><td>'
            +finalObj[i].totalaskAmountBCH+
            '</td><td>'
            +finalObj[i].totalaskAmountBTC+
            '</td></tr>');
        }
      }
    }
  }
  /*----------------BCH Market Sockets-----------------------*/
  io.socket.on('BCH_BID_ADDED', function bidCreated(data){
    io.socket.get(url_api+'/tradebchmarket/getAllBidBCH',function(err,data){
      console.log("BCH_BID_ADDED::: getAllBidBCH:::", data.body);
      orderBookBidBCH(data.body);
      getCurrentBidPriceBCH(data.body);
      getAllBidTotalBCH(data.body);
      getAllAskTotalBCH(data.body);
      

    });
    io.socket.post(url_api+'/user/getAllDetailsOfUser', { userMailId: '<?php echo $user_session;?>'},function(err,details){
      console.log("BCH_BID_ADDED::: getAllDetailsOfUser:::", details.body);
      getUserBTCBalance(details.body);
      getUserBCHBalance(details.body);
      userBCHOpenOrders(details.body);
    });
  });
  io.socket.on('BCH_ASK_ADDED', function bidCreated(data){
    io.socket.get(url_api+'/tradebchmarket/getAllASKBCH',function(err,data){
      console.log("BCH_ASK_ADDED::: getAllASKBCH:::", data.body);

      getCurrentAskPriceBCH(data.body);
      orderBookAskBCH (data.body);
    });
    io.socket.post(url_api+'/user/getAllDetailsOfUser',{ userMailId: '<?php echo $user_session;?>'},function(err,details){
      console.log("BCH_ASK_ADDED::: getAllDetailsOfUser:::", details.body);
      getUserBTCBalance(details.body);
      getUserBCHBalance(details.body);
      userBCHOpenOrders(details.body);
    });
  });

  io.socket.on('BCH_BID_DESTROYED', function bidCreated(data){
    io.socket.get(url_api+'/tradebchmarket/getAllBidBCH',function(err,data){
    //update all market bids and update bid_btc_bch
    console.log("BCH_BID_DESTROYED::: getAllBidBCH:::", data.body);
    getCurrentBidPriceBCH(data.body);
    orderBookBidBCH(data.body);
  });
    io.socket.post(url_api+'/user/getAllDetailsOfUser', { userMailId: '<?php echo $user_session;?>'},function(err,details){
      console.log("BCH_BID_DESTROYED::: getAllDetailsOfUser:::", details.body);
      getUserBTCBalance(details.body);
      getUserBCHBalance(details.body);
      userBCHClosedOrders(details.body);
      userBCHOpenOrders(details.body);
    });
  });
  io.socket.on('BCH_ASK_DESTROYED', function bidCreated(data){
    io.socket.get(url_api+'/tradebchmarket/getAllASKBCH',function(err,data){
      console.log("BCH_ASK_DESTROYED::: getAllASKBCH:::", data.body);

      getCurrentAskPriceBCH(data.body);
      orderBookAskBCH (data.body);
    });
    io.socket.post(url_api+'/user/getAllDetailsOfUser',{ userMailId: '<?php echo $user_session;?>'},function(err,details){
      console.log("BCH_ASK_DESTROYED::: getAllDetailsOfUser:::", details.body);
      getUserBTCBalance(details.body);
      getUserBCHBalance(details.body);
      userBCHClosedOrders(details.body);
      userBCHsOpenOrders(details.body);
    });
  });
 function bidAmountBTC() {
        var a = document.getElementById('bidAmountBCH').value;
        var b = document.getElementById('bidRateBCH').value;
        var result = parseFloat(a) * parseFloat(b);
        if (!isNaN(result)) {
            total=document.getElementById('bidAmountBTC').value = result;
           
        }
      
        
        
  }
   function bidAmountTotalBTC()
    {
        var res=document.getElementById('bidAmountBTC').value;
        var a = document.getElementById('bidAmountBCH').value;
        var b = document.getElementById('bidRateBCH').value;
        if(res)
        {
          var equal=res/b;
          document.getElementById('bidAmountBCH').value=equal;
        }

    }
    function askBTCAmount() {
        var a = document.getElementById('askBCHAmount').value;
        var b = document.getElementById('askRateBCH').value;
        var result = parseFloat(a) * parseFloat(b);
        if (!isNaN(result)) {
            tatal=document.getElementById('askBTCAmount').value = result;
          
        }  
    }
    function askBTCTotalAmount()
    {
      var a = document.getElementById('askBCHAmount').value;
      var b = document.getElementById('askRateBCH').value;
      var res =document.getElementById('askBTCAmount').value;
        if(res)
        {
          var equal=res/b;
          document.getElementById('askBCHAmount').value=equal;
        }
         
    }



function del(bidIdBCH,bidownerId) {

  if (confirm("Do You Want To Delete!")) {
    $.ajax({
      type: "POST",
      url: url_api + '/tradebchmarket/removeBidBCHMarket',
      data: {
        "bidIdBCH": bidIdBCH,
        "bidownerId": bidownerId
      },
      success: function(result){
        alert('Data Delete Successfully');

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
        alert('Data Delete Successfully');

      }
    });
  }
}


function buy_data_bch() {

  var bidAmountBCH = document.getElementById('bidAmountBCH').value;
  var bidRateBCH = document.getElementById('bidRateBCH').value;
  var bidAmountBTC = document.getElementById('bidAmountBTC').value;

  var bidownerId=user_details.id;
  var spendingPassword='12';

  var json_bid_bch = {
    "bidAmountBTC":bidAmountBTC,
    "bidAmountBCH":bidAmountBCH,
    "bidRate":bidRateBCH,
    "bidownerId":bidownerId,
    "spendingPassword":spendingPassword
  }

  $.ajax({
    type: "POST",
    contentType: "application/json",
    url: url_api+"/tradebchmarket/addBidBCHMarket",
    data: JSON.stringify(json_bid_bch),
    success: function(result){
      console.log(result);
      $('#error_message1').empty();
      if (result.statusCode!=200)
      {
        $('#error_message1').append(" &nbsp;"+result.message+"");
      }
    }
  });
}

function sell_data()
{

  var askBCHAmount = document.getElementById('askBCHAmount').value;
  var askRateBCH = document.getElementById('askRateBCH').value;
  var askBTCAmount = document.getElementById('askBTCAmount').value;
  var bidownerId=user_details.id;
  var spendingPassword='12';

  var json_ask_bch = {
    "askAmountBTC":askBTCAmount,
    "askAmountBCH":askBCHAmount,
    "askRate":askRateBCH,
    "askownerId":bidownerId,
    "spendingPassword":spendingPassword
  }


  $.ajax({
    type: "POST",
    contentType: "application/json",
    url: url_api+"/tradebchmarket/addAskBCHMarket",
    data: JSON.stringify(json_ask_bch),
    success: function(result){
      console.log(result);
      $('#error_message').empty();

      if (result.statusCode!=200)
      {
        $('#error_message').append(" &nbsp;"+result.message+"");
      }

    }
  });

}

</script>
<script>
  var seriesOptions = [];
  $.getJSON(url_api + '/tradebchmarket/getBidsBCHSuccess', function (data) {
    var datanew = [];
   //console.log(data);
     /* var bid_orders = $.parseJSON(data);
    for(var i = 0; i < data.length ; i++){
           console.log('jfd' + bid_orders.bidsBCH[i].bidRate + bid_orders.bidsBCH[i].createdAt);
         }*/
         console.log("chart api ", data);
         var arrayObject = [];
         if(data.bidsBCH){
          for (var i = data.bidsBCH.length-1; i >= 0 ; i--) {
            arrayObject.push([Number(data.bidsBCH[i].createTimeUTC) , data.bidsBCH[i].bidRate]);
          }
        }
        seriesOptions[0] = {
          name: 'BCH bids',
          data: arrayObject

        };
        console.log("array",arrayObject);
        // Create the chart

        createBCHChart();
        $('#small').click(function () {
          chart.setSize(400);
        });

        $('#large').click(function () {
          chart.setSize(800);
        });

        $('#auto').click(function () {
          chart.setSize(null);
        });
      });

  $.getJSON(url_api + '/tradebchmarket/getAsksBCHSuccess', function (data) {
    var datanew = [];
   //console.log(data);
     /* var bid_orders = $.parseJSON(data);
    for(var i = 0; i < data.length ; i++){
           console.log('jfd' + bid_orders.bidsBCH[i].bidRate + bid_orders.bidsBCH[i].createdAt);
         }*/

         var arrayObjectask = [];
         if(data.asksBCH){
          console.log("chart api new data.AsksBCH",   data.AsksBCH);
          if(data.asksBCH){
            for (var i = data.asksBCH.length-1; i >= 0 ; i--) {
              arrayObjectask.push([Number(data.asksBCH[i].createTimeUTC) , data.asksBCH[i].askRate]);
            }
          }
        }
        console.log("chart api new",   arrayObjectask);
        // Create the chart
        seriesOptions[1]=  {
          name: 'BCH asks',

          data: arrayObjectask


        };

        createBCHChart();
        $('#small').click(function () {
          chart.setSize(400);
        });

        $('#large').click(function () {
          chart.setSize(800);
        });

        $('#auto').click(function () {
          chart.setSize(null);
        });
      });

  function createBCHChart() {
    Highcharts.stockChart('container1', {
      title: {
        text: 'BCH Price'
      },
      subtitle: {
        text: 'Bitcoin Cash Price Chart'
      },
      rangeSelector: {
        selected: 1
      },
      series: seriesOptions

    });

  }
</script>
