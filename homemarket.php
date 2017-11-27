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
                    <div class="col-md-12">
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

                       
                        </div>
                    </div>
                    <div class="panel panel-default">
                  
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
  getAllBidTotalBCH();
  getAllAskTotalBCH();
  getBidsBCHSuccess();
  getAsksBCHSuccess();
  getAllBidBCH();
  getAllAskBCH();
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
  io.socket.on('BCH_BID_ADDED', function bidCreated(data){
    io.socket.get(url_api+'/tradebchmarket/getAllBidBCH',function(err,data){
      console.log("BCH_BID_ADDED::: getAllBidBCH:::", data.body);
      orderBookBidBCH(data.body);
      
      getAllBidTotalBCH(data.body);
      
      

    });
  });
  io.socket.on('BCH_ASK_ADDED', function bidCreated(data){
    io.socket.get(url_api+'/tradebchmarket/getAllASKBCH',function(err,data){
      console.log("BCH_ASK_ADDED::: getAllASKBCH:::", data.body);

      
      orderBookAskBCH (data.body);
      getAllAskTotalBCH(data.body);
    });
  });

  io.socket.on('BCH_BID_DESTROYED', function bidCreated(data){
    io.socket.get(url_api+'/tradebchmarket/getAllBidBCH',function(err,data){
    //update all market bids and update bid_btc_bch
    console.log("BCH_BID_DESTROYED::: getAllBidBCH:::", data.body);
   
    orderBookBidBCH(data.body);
    getBidsBCHSuccess(data.body);
  });
  });
  io.socket.on('BCH_ASK_DESTROYED', function bidCreated(data){
    io.socket.get(url_api+'/tradebchmarket/getAllASKBCH',function(err,data){
      console.log("BCH_ASK_DESTROYED::: getAllASKBCH:::", data.body);

      
      orderBookAskBCH (data.body);
      getAsksBCHSuccess(data.body);
    });
  });


</script>
   
<script>
    $.getJSON(url_api + '/tradebchmarket/getBidsBCHSuccess', function (data) {
        var datanew = [];
   //console.log(data);
     /* var bid_orders = $.parseJSON(data);
    for(var i = 0; i < data.length ; i++){
           console.log('jfd' + bid_orders.bidsBCH[i].bidRate + bid_orders.bidsBCH[i].createdAt);
       }*/
       var arrayObject = [];
       var  temp =data.bidsBCH;
       var date = 1317888000000;
       if(temp){
          for (var i = 0; i < temp.length; i++) {

            date = date + 60000;
            arrayObject.push([date , temp[i].bidRate]);

        }
    }
    else
        var arrayObject = [];
    // Create the chart
    Highcharts.stockChart('container1', {


        title: {
            text: 'BCH Price'
        },

        subtitle: {
            text: 'Bitcoin Cash Price Chart'
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
            name: 'BCH',
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
