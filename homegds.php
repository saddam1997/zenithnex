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
           <div class="panel-body chart-body" id="container2"></div>
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
                      <div class="panel-heading bidhead">BID <small class="pull-right" > BTC<span id ="bid_Total_btc"></span>  | GDS <span id ="bid_Total_gds"></span></small></div>
                      <div class="panel-body bidset">
                        <div class="table-responsive">
                          <table class="table table-striped order-table table-hover">
                            <thead class="thead-dark">
                              <tr>
                                <th>Total(BTC)</th>
                                <th>Vol(GDS)</th>
                                <th>Bid(BTC)</th>
                              </tr>
                            </thead>
                            <tbody id="bid_btc_gds">

                            </tbody>

                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-sm-5">
                    <div class="panel panel-default">
                     <div class="panel-heading askhead">ASK <small class="pull-right" > BTC  <span id ="ask_Total_btc"></span>| GDS <span id ="ask_Total_gds"></span></small></div>

                      <div class="panel-body askset">
                        <div class="table-responsive">
                          <table class="table table-striped table-hover">
                            <thead>
                              <tr>
                                <th>Total(BTC)</th>
                                <th>Vol(GDS)</th>
                                <th>Ask(BTC)</th>
                              </tr>
                            </thead>
                            <tbody id="ask_btc_gds">

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
                        <th>UNITS FILLED GDS</th>
                        <th>ACTUAL RATE</th>
                        <th>UNITS TOTAL GDS</th>
                        <th>UNITS TOTAL BTC</th>
                      </tr>
                    </thead>

                    <tbody id="market_bid_gds">

                    </tbody>
                    <tbody id="market_ask_gds">

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
getAllBidTotalGDS();
getAllAskTotalGDS();
getBidsGDSSuccess();
getAsksGDSSuccess();
getAllBidGDS();
getAllAskGDS();
function getAllBidGDS(){
  $.ajax({
    type: "POST",
    contentType: "application/json",
    url: url_api+"/tradegdsmarket/getAllBidGDS",
    data: {},
    success: function(data){

      var bid_orders = data;
      $('#bid_current_GDS').empty();
      console.log("bid_orders.bidsGDS",bid_orders.bidsGDS);
      $('#bid_current_GDS').append(" &nbsp;"+bid_orders.bidsGDS[0].bidRate+"");
      if(bid_orders.bidsGDS){
        for (var i = 0; i < bid_orders.bidsGDS.length; i++) {
          if(i==bid_orders.bidsGDS.length) break;
          if(data.bidsGDS[i].status != 1){

            $('#bid_btc_gds').append('<tr><td>' + bid_orders.bidsGDS[i].bidAmountBTC + '</td><td>' + bid_orders.bidsGDS[i].bidAmountGDS + '</td><td>' + bid_orders.bidsGDS[i].bidRate + '</td></tr>');
          }
        }
      }
      if (data.statusCode!=200)
      {
        $('#error_message1').append(" &nbsp;"+data.message+"");
      }
    }
  });
};
function getAllAskGDS(){
  $.ajax({
    type: "POST",
    contentType: "application/json",
    url: url_api+"/tradegdsmarket/getAllAskGDS",
    data: {},
    success: function(data){

      $('#ask_current_GDS').empty();
      $('#ask_current_GDS').append(" &nbsp;"+data.asksGDS[0].askRate+"");
      if(data.asksGDS){
        for (var i = 0; i < data.asksGDS.length; i++) {
          if(i==data.asksGDS.length) break;
          if(data.asksGDS[i].status != 1){
            $('#ask_btc_gds').append('<tr><td>' + data.asksGDS[i].askAmountBTC + '</td><td>' + data.asksGDS[i].askAmountGDS + '</td><td>' + data.asksGDS[i].askRate + '</td></tr>');
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

function getAllBidTotalGDS(){
  $.ajax({
    type: "POST",
    contentType: "application/json",
    url: url_api+"/tradegdsmarket/getAllBidGDS",
    data: {},
    success: function(data){

      var bid_orders = data;
      $('#bid_Total_btc').empty();
      $('#bid_Total_gds').empty();
      if(bid_orders.bidAmountBTCSum && bid_orders.bidAmountGDSSum) {

        $('#bid_Total_btc').append(" &nbsp;"+bid_orders.bidAmountBTCSum.toFixed(5)+"");
        $('#bid_Total_gds').append(" &nbsp;"+bid_orders.bidAmountGDSSum.toFixed(5)+"");

      }

    }
  });
};
function getAllAskTotalGDS(){
  $.ajax({
    type: "POST",
    contentType: "application/json",
    url: url_api+"/tradegdsmarket/getAllAskGDS",
    data: {},
    success: function(data){

      $('#ask_Total_btc').empty();
      $('#ask_Total_gds').empty();
      if(data.askAmountBTCSum && data.askAmountGDSSum)
      {
        $('#ask_Total_btc').append(" &nbsp;"+data.askAmountBTCSum.toFixed(5)+"");
        $('#ask_Total_gds').append(" &nbsp;"+data.askAmountGDSSum.toFixed(5)+"");
      }


    }
  });
}
function getBidsGDSSuccess(){
  $.ajax({
    type: "POST",
    contentType: "application/json",
    url: url_api+"/tradegdsmarket/getBidsGDSSuccess",
    data: {},
    success: function(data){
      $('#market_bid_gds').empty();

      var bid_orders = data;

      for (var i = 0; i < 10; i++) {
        if(i==bid_orders.bidsGDS.length) break;
        $('#market_bid_gds').append('<tr><td>' + bid_orders.bidsGDS[i].createTimeUTC + '</td>'+
          '</td><td>BID</td><td>' + bid_orders.bidsGDS[i].bidAmountBTC + '</td><td>' + bid_orders.bidsGDS[i].bidAmountGDS + '</td><td>'+ bid_orders.bidsGDS[i].totalbidAmountBTC + '</td><td>'+ bid_orders.bidsGDS[i].totalbidAmountGDS + '</td></tr>')
      }

    }
  });
}
function getAsksGDSSuccess(){
  $.ajax({
    type: "POST",
    contentType: "application/json",
    url: url_api+"/tradegdsmarket/getAsksGDSSuccess",
    data: {},
    success: function(data){
      $('#market_ask_gds').empty();
      var ask_orders = data;

      for (var i = 0; i < 10; i++){
        if(i==data.asksGDS.length) break;
        $('#market_ask_gds').append('<tr><td>' + ask_orders.asksGDS[i].createTimeUTC + '</td>' +
          '</td><td>ASK</td><td>'+ ask_orders.asksGDS[i].askAmountBTC + '</td><td>' + ask_orders.asksGDS[i].askAmountGDS + '</td><td>'+ ask_orders.asksGDS[i].totalaskAmountBTC + '</td><td>'+ ask_orders.asksGDS[i].totalaskAmountGDS + '</td></tr>')
      }

    }
  });
}
function orderBookBidGDS(data){
  console.log("orderBookBidGDS",data);
  var bid_orders = data;
  $('#bid_btc_gds').empty();

  if(data.bidsGDS){
    for (var i = 0; i < bid_orders.bidsGDS.length; i++) {
      if(i==bid_orders.bidsGDS.length) break;
      if(data.bidsGDS[i].status != 1){
        console.log("data.bidsGDS[i].status",data.bidsGDS[i].bidAmountBTC);

        $('#bid_btc_gds').append('<tr><td>' + bid_orders.bidsGDS[i].bidAmountBTC + '</td><td>' + bid_orders.bidsGDS[i].bidAmountGDS + '</td><td>' + bid_orders.bidsGDS[i].bidRate + '</td></tr>')
      }
    }
  }
}
function orderBookAskGDS (data) {
  console.log("orderBookAskGDS",data);
  $('#ask_btc_gds').empty();
  if(data.asksGDS){
    for (var j = 0; j < data.asksGDS.length; j++){
      if(j==data.asksGDS.length) break;
      if(data.asksGDS[j].status != 1){

        $('#ask_btc_gds').append('<tr><td>' + data.asksGDS[j].askAmountBTC + '</td><td>' + data.asksGDS[j].askAmountGDS + '</td><td>' + data.asksGDS[j].askRate + '</td></tr>');
      }
    }
  }
}
io.socket.on('GDS_BID_ADDED', function bidCreated(data){
  io.socket.get(url_api+'/tradegdsmarket/getAllBidGDS',function(err,data){
    console.log("GDS_BID_ADDED::: getAllBidGDS:::", data.body);
    orderBookBidGDS(data.body);
    
    getAllBidTotalGDS(data.body);
    
  });
});
io.socket.on('GDS_ASK_ADDED', function bidCreated(data){
  io.socket.get(url_api+'/tradegdsmarket/getAllASKGDS',function(err,data){
    console.log("GDS_ASK_ADDED::: getAllASKGDS:::", data.body);

   
    orderBookAskGDS (data.body);
    getAllAskTotalGDS(data.body);
    

  });
});
io.socket.on('GDS_BID_DESTROYED', function bidCreated(data){
  io.socket.get(url_api+'/tradegdsmarket/getAllBidGDS',function(err,data){
    //update all market bids and update bid_btc_gds
    console.log("GDS_BID_DESTROYED::: getAllBidGDS:::", data.body);
    
    orderBookBidGDS(data.body);
    
    getBidsGDSSuccess(data.body);

  });
});
io.socket.on('GDS_ASK_DESTROYED', function bidCreated(data){
  io.socket.get(url_api+'/tradegdsmarket/getAllASKGDS',function(err,data){
    console.log("GDS_ASK_DESTROYED::: getAllASKGDS:::", data.body);

    
    orderBookAskGDS (data.body);
     
    getAsksGDSSuccess(data.body);
  });
});
</script>
<script>
$.getJSON(url_api + '/tradegdsmarket/getAllBidGDS', function (data) {
    var datanew = [];
   //console.log(data);
     /* var bid_orders = $.parseJSON(data);
    for(var i = 0; i < data.length ; i++){
           console.log('jfd' + bid_orders.bidsBCH[i].bidRate + bid_orders.bidsBCH[i].createdAt);
    }*/
    var arrayObject = [];
    var  temp =data.bidsGDS;
    var date = 1317888000000;
    if(temp){
      for (var i = 0; i < temp.length; i++) {

        date = date + 60000;
        arrayObject.push([date , temp[i].bidRate]);

      }
    }

    // Create the chart
      Highcharts.stockChart('container2', {


        title: {
            text: 'GDS Price'
        },

        subtitle: {
            text: 'Goods Coin Price Chart'
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
            name: 'BID GDS',
            type: 'area',
            data: arrayObject,
            gapSize: 5,
            tooltip: {
                valueDecimals: 2
            },
            fillColor: {
                linearGradient: {
                    x1: 0,
                    y1: 0,x2: 0,y2: 1
                },
                stops: [
                    [0, Highcharts.getOptions().colors[2]],
                    [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                ]
            },
            threshold: null
        },
        {
            name: 'ASK GDS',
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
