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
              <div class="col-md-12">
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

              
            </div>
          </div>
            
            <div class=" text-center"><h3>Success Orders</h3></div>
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
                        <th>UNITS TOTAL BTC</th>

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
  getAllBidEBT();
  getAllAskEBT();
  getAllBidTotalEBT();
  getAllAskTotalEBT();
  getBidsEBTSuccess();
  getAsksEBTSuccess();


   function getAllBidEBT(){
    $.ajax({
      type: "POST",
      contentType: "application/json",
      url: url_api+"/tradeebtmarket/getAllBidEBT",
      data: {},
      success: function(data){
        $('#bid_btc_ebt').empty();

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
        $('#ask_btc_ebt').empty();

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
        $('#market_bid_ebt').empty();

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
        $('#market_ask_ebt').empty();
        var ask_orders = data;

        for (var i = 0; i < 10; i++){
          if(i==data.asksEBT.length) break;
          $('#market_ask_ebt').append('<tr><td>' + ask_orders.asksEBT[i].createTimeUTC + '</td>' +
            '</td><td>ASK</td><td>'+ ask_orders.asksEBT[i].askAmountBTC + '</td><td>' + ask_orders.asksEBT[i].askAmountEBT + '</td><td>'+ ask_orders.asksEBT[i].totalaskAmountBTC + '</td><td>'+ ask_orders.asksEBT[i].totalaskAmountEBT + '</td></tr>')
        }

      }
    });
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
  io.socket.on('EBT_BID_ADDED', function bidCreated(data){
    io.socket.get(url_api+'/tradeebtmarket/getAllBidEBT',function(err,data){
      console.log("EBT_BID_ADDED::: getAllBidEBT:::", data.body);
      orderBookBidEBT(data.body);
      
      getAllBidTotalEBT(data.body);

    });
    
  });
  io.socket.on('EBT_ASK_ADDED', function bidCreated(data){
    io.socket.get(url_api+'/tradeebtmarket/getAllASKEBT',function(err,data){
      console.log("EBT_ASK_ADDED::: getAllASKEBT:::", data.body);

      
      orderBookAskEBT (data.body);
      getAllAskTotalEBT(data.body);
    });
    
  });

  io.socket.on('EBT_BID_DESTROYED', function bidCreated(data){
    io.socket.get(url_api+'/tradeebtmarket/getAllBidEBT',function(err,data){
    //update all market bids and update bid_btc_ebt
    console.log("EBT_BID_DESTROYED::: getAllBidEBT:::", data.body);

    orderBookBidEBT(data.body);
    getBidsEBTSuccess();

  });

  });
  io.socket.on('EBT_ASK_DESTROYED', function bidCreated(data){
    io.socket.get(url_api+'/tradeebtmarket/getAllASKEBT',function(err,data){
      console.log("EBT_ASK_DESTROYED::: getAllASKEBT:::", data.body);

      orderBookAskEBT (data.body);

      getAsksEBTSuccess();
    });
    
  });

</script>
<script>
  $.getJSON(url_api + '/tradeebtmarket/getBidsEBTSuccess', function (data) {
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
