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

          <div class="panel panel-default">
            <div class="panel-body chart-body" id="container3"></div>
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
                      <div class="panel-heading bidhead">BID <small class="pull-right" > BTC <span id ="bid_Total_btc"></span> | EBT <span id ="bid_Total_ebt"></span></small></div>
                      <div class="panel-body bidset">
                        <div class="table-responsive">
                          <table class="table table-striped order-table table-hover">
                            <thead class="thead-dark">
                              <tr>
                                <th>Total(BTC)</th>
                                <th>Vol(EBT)</th>
                                <th>Bid(BTC)</th>
                              </tr>
                            </thead>
                            <tbody id="bid_btc_ebt">


                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-5">
                    <div class="panel panel-default">
                      <div class="panel-heading askhead">ASK <small class="pull-right" > BTC <span id ="ask_Total_btc"></span> | EBT <span id ="ask_Total_ebt"></span></small></div>

                      <div class="panel-body askset">
                        <div class="table-responsive">
                          <table class="table table-striped table-hover">
                            <thead>
                              <tr>
                                <th>Total(BTC)</th>

                                <th>Vol(EBT)</th>
                                <th>Ask(BTC)</th>
                              </tr>
                            </thead>
                            <tbody id="ask_btc_ebt">

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
                  <div class="panel-heading">Buy Ebittree Coin
                   <small class="pull-right" > Available Balance: <span id ="avalBTCBalance"></span>BTC <br> Freeze Balance: <span id="freezeBTCBalance"></span>BTC</small>
                 </div>
                 <div class="panel-body ">
                  <fieldset>

                    <div class="input-group margin-top">
                      <span class="input-group-addon">Units</span>
                      <input type="number" step="0.00001" onkeyup="sum_EBT()" name="bidAmountEBT"
                      id="bidAmountEBT" class="form-control txt"
                      aria-label="Amount (to the nearest dollar)">
                      <span class="input-group-addon">EBT</span>
                    </div>
                    <div class="input-group margin-top">
                      <span class="input-group-addon">Bid &nbsp;&nbsp;</span>
                      <input type="number" step="0.00001" onkeyup="sum_EBT()" name="bidRate"
                      id="bidRate" class="form-control txt"
                      aria-label="Amount (to the nearest dollar)">
                      <span class="input-group-addon">BTC</span>
                    </div>
                    <div class="input-group margin-top">
                      <span class="input-group-addon">Total</span>
                      <input type="number" step="0.00001" onkeyup="sumTotalEbt()" name="bidAmountBTC" id="bidAmountBTC"
                      class="form-control bidAmountBTC1"
                      aria-label="Amount (to the nearest dollar)">
                      <span class="input-group-addon">BTC</span>
                    </div>
                    <div class="row">
                      <button onclick="buy_data();" class="btn btn-info btn-sm col-xs-3"
                      type="button" id="butval" style="width:100% ;background-color: #adc396" >Buy
                    </button>
                    <div id="error_message1" class="pull-right" style="color: red; margin-top: 20px;"></div>
                    <!-- <input class="btn btn-success col-xs-3 btn-sm" id="reset" type="button"  value="RESET"> -->
                  </div>

                </fieldset>
              </div>
            </div>


            <div class="panel panel-default">
              <div class="panel-heading">Sell Ebittree Coin
                <small class="pull-right" > Available Balance:<span id ="avalEBTBalance"></span>EBT <br> Freeze Balance: <span id="freezeEBTBalance"></span>EBT</small>
              </div>
              <div class="panel-body ">
                <fieldset>
                  <div class="input-group margin-top">
                    <span class="input-group-addon">Units</span>
                    <input type="number" step="0.00001" id="askAmountEBT" name="askAmountEBT"
                    onkeyup="sumsell()" class="form-control"
                    aria-label="Amount (to the nearest dollar)">
                    <span class="input-group-addon">EBT</span>
                  </div>
                  <div class="input-group margin-top">
                    <span class="input-group-addon">Ask &nbsp;</span>
                    <input type="number" step="0.00001" onkeyup="sumsell()" name="askRate"
                    id="askRate" class="form-control"
                    aria-label="Amount (to the nearest dollar)">
                    <span class="input-group-addon">BTC</span>
                  </div>
                  <div class="input-group margin-top">
                    <span class="input-group-addon">Total</span>
                    <input ttype="number" step="0.00001" onkeyup="sumTotalSell()" id="askAmountBTC" name="askAmountBTC"
                    class="form-control" aria-label="Amount (to the nearest dollar)">
                    <span class="input-group-addon">BTC</span>
                  </div>
                  <div class="row">
                    <button onclick="sell_data();" class="btn btn-success btn-sm col-xs-3"
                    type="button" id="butval" style="width:100%; background-color: #e49f9e" >Sell
                  </button>
                  <div id="error_message" class="pull-right" style="color: red; margin-top: 20px;"></div>
                </div>
                <!-- <input class="btn btn-success btn-sm" type="reset" onclick="WebSocketTest()" value="RESET"> -->
              </fieldset>
            </div>
          </div>


        </div>
      </div>
    </div>
    <div class="text-center"><h3>My Open Orders</h3></div>
    <div class="panel panel-default">
      <div class="panel text-center"></div>
      <div class="panel-body openmaket">
        <div class="table-responsive">
          <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ORDER DATE</th>
                <th>BID/ASK</th>
                <th>UNITS FILLED EBT</th>
                <th>ACTUAL RATE</th>
                <th>UNITS TOTAL EBT</th>
                <th>UNITS TOTAL BTC</th>
                <th>ACTION</th>
              </tr>
            </thead>

            <tbody id="open_bid_ebt">

            </tbody>
            <tbody id="open_ask_ebt">

            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class=" text-center"><h3>Market</h3></div>
    <div class="panel panel-default">
      <div class="panel text-center "></div>

      <div class="panel-body market">
        <div class="table-responsive">
          <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ORDER DATE</th>
                <th>BID/ASK</th>
                <th>UNITS FILLED EBT</th>
                <th>ACTUAL RATE</th>
                <th>UNITS TOTAL EBT</th>

              </tr>
            </thead>

            <tbody id="market_bid_ebt">

            </tbody>
            <tbody id="market_ask_ebt">

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

<?php
include 'footer.php';
?>

<script>
  getAllDetailsOfUser();
  getAllBidEBT();
  getAllAskEBT();
  getAllBidTotalEBT();
  getAllAskTotalEBT();
  function getAllBidEBT(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradeebtmarket/getAllBidEBT",
      data: {},
      success: function(data){

        var bid_orders = data;
        
        if(bid_orders.bidsEBT){
          for (var i = 0; i < bid_orders.bidsEBT.length; i++) {
            if(i==bid_orders.bidsEBT.length) break;
            if(data.bidsEBT[i].status != 1){
              $('#bid_btc_ebt').append('<tr><td>' + bid_orders.bidsEBT[i].bidAmountBTC + '</td><td>' + bid_orders.bidsEBT[i].bidAmountEBT + '</td><td>' + bid_orders.bidsEBT[i].bidRate + '</td></tr>')
            }
          }
        }

       
      }
    });
  };
  function getAllBidTotalEBT(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradeebtmarket/getAllBidEBT",
      data: {},
      success: function(data){

        var bid_orders = data;
        $('#bid_Total_btc').empty();
        $('#bid_Total_ebt').empty();
        if(bid_orders.bidAmountBTCSum && bid_orders.bidAmountEBTSum ) 
        {
          $('#bid_Total_btc').append(" &nbsp;"+bid_orders.bidAmountBTCSum.toFixed(5)+"");
          $('#bid_Total_ebt').append(" &nbsp;"+bid_orders.bidAmountEBTSum.toFixed(5)+"");

        }

      }
    });
  };
  function getAllAskEBT(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradeebtmarket/getAllAskEBT",
      data: {},
      success: function(data){

        if(data.asksEBT){
          for (var i = 0; i < data.asksEBT.length; i++) {
            if(i==data.asksEBT.length) break;
            if(data.asksEBT[i].status != 1){
              $('#ask_btc_ebt').append('<tr><td>' + data.asksEBT[i].askAmountBTC + '</td><td>' + data.asksEBT[i].askAmountEBT + '</td><td>' + data.asksEBT[i].askRate + '</td></tr>');
            }
          }
        }
        
      }
    });
  }
  function getAllAskTotalEBT(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradeebtmarket/getAllAskEBT",
      data: {},
      success: function(data){

        $('#ask_Total_btc').empty();
        $('#ask_Total_ebt').empty();
        if(data.askAmountBTCSum && data.askAmountEBTSum)
        {
          $('#ask_Total_btc').append(" &nbsp;"+data.askAmountBTCSum.toFixed(5)+"");
          $('#ask_Total_ebt').append(" &nbsp;"+data.askAmountEBTSum.toFixed(5)+"");


        }

      }
    });
  }
  function getBidsEBTSuccess(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradeebtmarket/getBidsEBTSuccess",
      data: {},
      success: function(data){

        var bid_orders = data;

        for (var i = 0; i < 10; i++) {
          if(i==bid_orders.bidsEBT.length) break;
          $('#market_bid_ebt').append('<tr><td>' + bid_orders.bidsEBT[i].createTimeUTC + '</td>'+
            '</td><td>BID</td><td>' + bid_orders.bidsEBT[i].bidAmountBTC + '</td><td>' + bid_orders.bidsEBT[i].bidAmountEBT + '</td><td>'+ bid_orders.bidsEBT[i].totalbidAmountBTC + '</td><td>'+ bid_orders.bidsEBT[i].totalbidAmountEBT + '</td></tr>')
        }

      }
    });
  }
  function getAsksEBTSuccess(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradeebtmarket/getAsksEBTSuccess",
      data: {},
      success: function(data){
        var ask_orders = data;

        for (var i = 0; i < 10; i++){
          if(i==data.asksEBT.length) break;
          $('#market_ask_ebt').append('<tr><td>' + ask_orders.asksEBT[i].createTimeUTC + '</td>' +
            '</td><td>ASK</td><td>'+ ask_orders.asksEBT[i].askAmountBTC + '</td><td>' + ask_orders.asksEBT[i].askAmountEBT + '</td><td>'+ ask_orders.asksEBT[i].totalaskAmountBTC + '</td><td>'+ ask_orders.asksEBT[i].totalaskAmountEBT + '</td></tr>')
        }

      }
    });
  }
  function getCurrentBidPriceEBT(data){
    if(data.bidsEBT){
      console.log("getCurrentBidPriceEBT",data.bidsEBT[0].bidRate);
      $('#bid_current_EBT').empty();
      $('#bid_current_EBT').append(" &nbsp;"+data.bidsEBT[0].bidRate+"");
    }
  }
  function getCurrentAskPriceEBT(data){
    if(data.asksEBT){
      console.log("getCurrentAskPriceEBT",data.asksEBT[0].askRate);
      $('#ask_current_EBT').empty();
      $('#ask_current_EBT').append(" &nbsp;"+data.asksEBT[0].askRate+"");
    }
  }
  function orderBookBidEBT(data){
    console.log("orderBookBidEBT",data);
    var bid_orders = data;
    $('#bid_btc_ebt').empty();

    if(data.bidsEBT){
      for (var i = 0; i < bid_orders.bidsEBT.length; i++) {
        if(i==bid_orders.bidsEBT.length) break;
        if(data.bidsEBT[i].status != 1){
          console.log("data.bidsEBT[i].status",data.bidsEBT[i].bidAmountBTC);

          $('#bid_btc_ebt').append('<tr><td>' + bid_orders.bidsEBT[i].bidAmountBTC + '</td><td>' + bid_orders.bidsEBT[i].bidAmountEBT + '</td><td>' + bid_orders.bidsEBT[i].bidRate + '</td></tr>')
        }
      }
    }
  }
  function orderBookAskEBT (data) {
    console.log("orderBookAskEBT",data);
    $('#ask_btc_ebt').empty();
    if(data.asksEBT){
      for (var j = 0; j < data.asksEBT.length; j++){
        if(j==data.asksEBT.length) break;
        if(data.asksEBT[j].status != 1){

          $('#ask_btc_ebt').append('<tr><td>' + data.asksEBT[j].askAmountBTC + '</td><td>' + data.asksEBT[j].askAmountEBT + '</td><td>' + data.asksEBT[j].askRate + '</td></tr>');
        }
      }
    }
  }
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

        getUserEBTBalance(res);

        userEBTOpenOrders(res);
        userEBTClosedOrders(res);

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
  function getUserEBTBalance(details){
    console.log("getUserEBTBalance",details.user.EBTbalance);
    $('#avalEBTBalance').empty();
    $('#freezeEBTBalance').empty();
    $('#avalEBTBalance').append(details.user.EBTbalance+" ");
    $('#freezeEBTBalance').append(details.user.FreezedEBTbalance+" ");
  }
  function userEBTOpenOrders(details){
    console.log("userOpenOrders:::details::",details);
    $('#open_bid_ebt').empty();
    $('#open_ask_ebt').empty();
    bid=details.user.bidsEBT;
    ask=details.user.asksEBT;
    var finalObj = bid.concat(ask);
    console.log("userOpenOrders",finalObj);
    for( var i=0; i<finalObj.length; i++)
    {
      if(finalObj[i].status == 2 ){
        if(finalObj[i].bidAmountEBT){
          $('#open_bid_ebt').append('<tr><td>'
            +finalObj[i].createdAt+
            '</td><td>BID</td><td>'
            +finalObj[i].bidAmountEBT+
            '</td><td>'
            +finalObj[i].bidRate+
            '</td><td>'
            +finalObj[i].totalbidAmountEBT+
            '</td><td>'
            +finalObj[i].totalbidAmountBTC+
            '</td><td><a class="text-danger" onclick="del(id='+finalObj[i].id +',ownwe='+finalObj[i].bidownerEBT+');"><i class="fa fa-window-close fa-2x" aria-hidden="true"></i></a></td></tr>');
        }
        else{
          $('#open_ask_ebt').append('<tr><td>'
            +finalObj[i].createdAt+
            '</td><td>ask</td><td>'
            +finalObj[i].askAmountEBT+
            '</td><td>'
            +finalObj[i].askRate+
            '</td><td>'
            +finalObj[i].totalaskAmountEBT+
            '</td><td>'
            +finalObj[i].totalaskAmountBTC+
            '</td><td><a class="text-danger" onclick="del_ask(id='+finalObj[i].id+',askownerEBT='+finalObj[i].askownerEBT+');" ><i class="fa fa-window-close fa-2x" aria-hidden="true"></i></a>'+
            '</td></tr>');
        }
      }

    }
  }
  function userEBTClosedOrders(details){
    $('#market_bid_ebt').empty();
    $('#market_ask_ebt').empty();
    bid=details.user.bidsEBT;
    ask=details.user.asksEBT;
    var finalObj = bid.concat(ask);
    console.log("userClosedOrders",finalObj);
    for( var i=0; i<finalObj.length; i++)
    {
      if(finalObj[i].status == 1 )
      {
        if(finalObj[i].bidAmountEBT){
          $('#market_bid_ebt').append('<tr><td>'
            +finalObj[i].createdAt+
            '</td><td>BID</td><td>'
            +finalObj[i].bidAmountEBT+
            '</td><td>'
            +finalObj[i].bidRate+
            '</td><td>'
            +finalObj[i].totalbidAmountEBT+
            '</td><td>'
            +finalObj[i].totalbidAmountBTC+
            '</td></tr>');
        }
        else{
          $('#market_ask_ebt').append('<tr><td>'
            +finalObj[i].createdAt+
            '</td><td>ask</td><td>'
            +finalObj[i].askAmountEBT+
            '</td><td>'
            +finalObj[i].askRate+
            '</td><td>'
            +finalObj[i].totalaskAmountEBT+
            '</td><td>'
            +finalObj[i].totalaskAmountBTC+
            '</td></tr>');
        }
      }
    }
  }

  io.socket.on('EBT_BID_ADDED', function bidCreated(data){
    io.socket.get(url_api+'/tradeebtmarket/getAllBidEBT',function(err,data){
      console.log("EBT_BID_ADDED::: getAllBidEBT:::", data.body);
      orderBookBidEBT(data.body);
      getCurrentBidPriceEBT(data.body);
      getAllBidTotalEBT(data.body);

    });
    io.socket.post(url_api+'/user/getAllDetailsOfUser', { userMailId: '<?php echo $user_session;?>'},function(err,details){
      console.log("EBT_BID_ADDED::: getAllDetailsOfUser:::", details.body);
      getUserBTCBalance(details.body);
      getUserEBTBalance(details.body);
      userEBTOpenOrders(details.body);
    });
  });
  io.socket.on('EBT_ASK_ADDED', function bidCreated(data){
    io.socket.get(url_api+'/tradeebtmarket/getAllASKEBT',function(err,data){
      console.log("EBT_ASK_ADDED::: getAllASKEBT:::", data.body);

      getCurrentAskPriceEBT(data.body);
      orderBookAskEBT (data.body);
      getAllAskTotalEBT(data.body);
    });
    io.socket.post(url_api+'/user/getAllDetailsOfUser',{ userMailId: '<?php echo $user_session;?>'},function(err,details){
      console.log("EBT_ASK_ADDED::: getAllDetailsOfUser:::", details.body);
      getUserBTCBalance(details.body);
      getUserEBTBalance(details.body);
      userEBTOpenOrders(details.body);
    });
  });

  io.socket.on('EBT_BID_DESTROYED', function bidCreated(data){
    io.socket.get(url_api+'/tradeebtmarket/getAllBidEBT',function(err,data){
    //update all market bids and update bid_btc_ebt
    console.log("EBT_BID_DESTROYED::: getAllBidEBT:::", data.body);
    getCurrentBidPriceEBT(data.body);
    orderBookBidEBT(data.body);
  });
    io.socket.post(url_api+'/user/getAllDetailsOfUser', { userMailId: '<?php echo $user_session;?>'},function(err,details){
      console.log("EBT_BID_DESTROYED::: getAllDetailsOfUser:::", details.body);
      getUserBTCBalance(details.body);
      getUserEBTBalance(details.body);
      userEBTClosedOrders(details.body);
      userEBTOpenOrders(details.body);
    });
  });
  io.socket.on('EBT_ASK_DESTROYED', function bidCreated(data){
    io.socket.get(url_api+'/tradeebtmarket/getAllASKEBT',function(err,data){
      console.log("EBT_ASK_DESTROYED::: getAllASKEBT:::", data.body);

      getCurrentAskPriceEBT(data.body);
      orderBookAskEBT (data.body);
    });
    io.socket.post(url_api+'/user/getAllDetailsOfUser',{ userMailId: '<?php echo $user_session;?>'},function(err,details){
      console.log("EBT_ASK_DESTROYED::: getAllDetailsOfUser:::", details.body);
      getUserBTCBalance(details.body);
      getUserEBTBalance(details.body);
      userEBTClosedOrders(details.body);
      userEBTsOpenOrders(details.body);
    });
  });

  function sum_EBT() {
        var a = document.getElementById('bidRate').value;
        var b = document.getElementById('bidAmountEBT').value;
        var result = (parseFloat(a) * parseFloat(b)).toFixed(6);
        if (!isNaN(result)) {
            document.getElementById('bidAmountBTC').value = result;
      
        }
        
    }
    function sumTotalEbt()
    {
       var a = document.getElementById('bidRate').value;
        var b = document.getElementById('bidAmountEBT').value;
       var res=document.getElementById('bidAmountBTC').value;
        if (res) {
          var equal=res/a;
            document.getElementById('bidAmountEBT').value = equal;
        }
    }
    function sumsell() {
        var a = document.getElementById('askRate').value;
        var b = document.getElementById('askAmountEBT').value;
        var result = (parseFloat(a) * parseFloat(b)).toFixed(6);
        if (!isNaN(result)) {
           document.getElementById('askAmountBTC').value = result;
          
        }
        
    }
    function sumTotalSell()
    {
      var a = document.getElementById('askRate').value;
        var b = document.getElementById('askAmountEBT').value;
        var res=document.getElementById('askAmountBTC').value;
        if (res) {
          var equal=res/b;
           document.getElementById('askRate').value = equal;
          
        }
    }

function del(bidIdEBT,bidownerId) {

  if (confirm("Do You Want To Delete!")) {
    $.ajax({
      type: "POST",
      url: url_api + '/tradeebtmarket/removeBidEBTMarket',
      data: {
        "bidIdEBT": bidIdEBT,
        "bidownerId": bidownerId
      },
      success: function(result){

      }
    });
  }
}
function del_ask(askIdEBT,askownerId) {
  if (confirm("Do You Want To Delete!")) {
    $.ajax({
      type: "POST",
      url: url_api + '/tradeebtmarket/removeAskEBTMarket',
      data: {
        "askIdEBT":askIdEBT,
        "askownerId":askownerId

      },
      success: function(result){

      }
    });
  }
}


/**********************buy data*********************************************************************************/
function buy_data() {


  var bidRate = document.getElementById('bidRate').value;
  var bidAmountEBT = document.getElementById('bidAmountEBT').value;
  var bidAmountBTC = document.getElementById('bidAmountBTC').value;
  var bidownerId=user_details.id;
  var spendingPassword='12';

  var json_bid_ebt = {
    "bidAmountBTC":bidAmountBTC,
    "bidAmountEBT":bidAmountEBT,
    "bidRate":bidRate,
    "bidownerId":bidownerId,
    "spendingPassword":spendingPassword
  }

  $.ajax({
    type: "POST",
    contentType: "application/json",
    url: url_api+"/tradeebtmarket/addBidEBTMarket",
    data: JSON.stringify(json_bid_ebt),
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

  var askAmountEBT = document.getElementById('askAmountEBT').value;
  var askRate = document.getElementById('askRate').value;
  var askAmountBTC = document.getElementById('askAmountBTC').value;
  var bidownerId=user_details.id;
  console.log(bidownerId);
  var spendingPassword='12';

  var json_ask_ebt = {
    "askAmountBTC":askAmountBTC,
    "askAmountEBT":askAmountEBT,
    "askRate":askRate,
    "askownerId":bidownerId,
    "spendingPassword":spendingPassword
  }

  $.ajax({
    type: "POST",
    contentType: "application/json",
    url: url_api+"/tradeebtmarket/addAskEBTMarket",
    data: JSON.stringify(json_ask_ebt),
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
  $.getJSON(url_api + '/tradeebtmarket/getAllBidEBT', function (data) {
    var datanew = [];
   //console.log(data);
     /* var bid_orders = $.parseJSON(data);
    for(var i = 0; i < data.length ; i++){
           console.log('jfd' + bid_orders.bidsBCH[i].bidRate + bid_orders.bidsBCH[i].createdAt);
         }*/
         var arrayObject = [];
         var  temp =data.bidsEBT;
         var date = 1317888000000;
         if(temp){
          for (var i = 0; i < temp.length; i++) {

            date = date + 60000;
            arrayObject.push([date , temp[i].bidRate]);

          }
        }
    // Create the chart
    Highcharts.stockChart('container3', {


      title: {
        text: 'EBT Price'
      },

      subtitle: {
        text: 'EBT Classic Price Chart'
      },

      xAxis: {
            breaks: [{ // Nights
              from: Date.UTC(2011, 9, 6, 16),
              to: Date.UTC(2011, 9, 7, 8),
              repeat: 24 * 36e5
            }, { // Weekends
              from: Date.UTC(2011, 9, 7, 16),
              to: Date.UTC(2011, 9, 10, 8),
              repeat: 7 * 24 * 36e5
            }]
          },

          rangeSelector: {
            buttons: [{
              type: 'hour',
              count: 1,
              text: '1h'
            }, {
              type: 'day',
              count: 1,
              text: '1D'
            }, {
              type: 'all',
              count: 1,
              text: 'All'
            }],
            selected: 1,
            inputEnabled: false
          },

          series: [{
            name: 'EBT',
            type: 'area',
            data: arrayObject,
            gapSize: 5,
            tooltip: {
              valueDecimals: 2
            },
            fillColor: {
              linearGradient: {
                x1: 0,
                y1: 0,
                x2: 0,
                y2: 1
              },
              stops: [
              [0, Highcharts.getOptions().colors[0]],
              [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
              ]
            },
            threshold: null
          }]
        });


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

</script>
