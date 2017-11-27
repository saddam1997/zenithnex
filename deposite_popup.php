<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<!-- send  id011-->
<div id="id011" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
        <div class="w3-center">
            <br>
            <span onclick="document.getElementById('id011').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span> Bitcoin Deposit
              </div><br>
               <form method="post">
               <div class="form-group">
                <label for="usr">BTC AMOUNT:</label>
                <input name="btcdepositammount" class="form-controll"  value="" placeholder="BTC Ammount" autocomplete="off" onkeypress="return isNumberKey(event)"  type="number" step="0.00000001">
              </div>
            <div class="form-group">
              <label for="pwd">Spending Password: </label>
            <input type="text" class="form-controll" name="btcdeposit"  value="" placeholder="Spending Password">
            </div> 
            <div class="form-group">
        
        <button name="btnbtcdeposit" >Deposit</button>
        <div id="error_message"></div>
      </div>
    </form>
     <br> <br> <br>
    </div>

</div>



<!-- close -->
<!-- send id012-->
<div id="id012" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
        <div class="w3-center">
            <br>
            <span onclick="document.getElementById('id012').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span> BCC Deposit
        </div><br>
         <form method="post">
         <div class="form-group">
          <label for="usr">BCC Ammount:</label>
          <input name="bccdepositammount" class="form-controll"  value="" placeholder="BCC Ammount" autocomplete="off" onkeypress="return isNumberKey(event)"  type="number" step="0.00000001">
        </div>
      <div class="form-group">
        <label for="pwd">Spending Password:</label>
        <input type="text" class="form-controll" name="bccdeposit"  value="" placeholder="Spending Password">
      </div> 
      <div class="form-group">
        
        <button name="btnbccdeposit" >Deposit</button>

      </div>
    </form> <br> <br> <br>
    </div>

</div>


<!-- close -->
<!-- model 013 -->

<div id="id013" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
        <div class="w3-center">
            <br>
            <span onclick="document.getElementById('id013').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span>Goods Coin Deposit
        </div><br>
         <form  method="post">
         <div class="form-group">
          <label for="usr">Goods Amount:</label>
          <input name="gdsdepositammount" class="form-controll"  value="" placeholder="GDS Ammount" autocomplete="off" onkeypress="return isNumberKey(event)"  type="number" step="0.00000001">
        </div>
      <div class="form-group">
        <label for="pwd">Spending Password:</label>
       <input type="text" class="form-controll" name="gdsdeposit"  value="" placeholder="Spending Password">
      </div> 
      <div class="form-group">
        
        <button name="btngdsdeposit" >Deposit</button>
      </div>
    </form> <br> <br> <br>
    </div>

</div>

<!-- start 14 -->
<div id="id014" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
        <div class="w3-center">
            <br>
            <span onclick="document.getElementById('id014').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span> EBT Coin Deposit
        </div><br>
         <form  method="post">
          <div class="form-group">
                <label for="usr">EBT AMOUNT:</label>
                <input name="ebtdepositammount" class="form-controll"  value="" placeholder="EBT Ammount" autocomplete="off" onkeypress="return isNumberKey(event)"  type="number" step="0.00000001">
              </div>
            <div class="form-group">
              <label for="pwd">Spending Password:</label>
             <input type="text" class="form-controll" name="ebtdeposit"  value="" placeholder="Spending Password">
            </div> 
            <div class="form-group">
        
       <button name="btnebtdeposit" >Deposit</button>
      </div>
    </form> <br> <br> <br>
    </div>

</div>
<!-- deposite -->
<!-- 15-->
<div id="id015" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
        <div class="w3-center">
            <br>
            <span onclick="document.getElementById('id015').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span> BCH Withdraw
        </div><br>
        <form method="post">
         <div class="form-group">
                <label for="usr">BTC AMOUNT:</label>
                <input  name="btcwithdrawammount"  class="form-controll" value="" placeholder="BTC Ammount" autocomplete="off" onkeypress="return isNumberKey(event)"  type="number" step="0.00000001">
              </div>
            <div class="form-group">
              <label for="pwd">Spending Password:</label>
              <input type="text" class="form-controll" name="btcwithdraw"  value="" placeholder="Spending Password">
            </div> 
            <div class="form-group">
        
        <button name="btnbtcwithdraw">Withdraw</button>
      </div>
    </form>
     <br> <br> <br>
    </div>

</div>
<!-- 16 -->
<div id="id016" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
        <div class="w3-center">
            <br>
            <span onclick="document.getElementById('id016').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span> BCC Coin Withdraw
        </div><br>
        <form method="post">
         <div class="form-group">
                <label for="usr">BTC AMOUNT:</label>
               <input  name="bccwithdrawammount" class="form-controll" value="" placeholder="BCC Ammount" autocomplete="off" onkeypress="return isNumberKey(event)"  type="number" step="0.00000001">
              </div>
            <div class="form-group">
              <label for="pwd">Spending Password:</label>
              <input type="text" class="form-controll" name="bccwithdraw"  value="" placeholder="Spending Password">
            </div> 
            <div class="form-group">
        
        <button name="btnbccwithdraw">Withdraw</button>
      </div>
    </form>
     <br> <br> <br>
    </div>

</div>
<!-- 17 -->
<div id="id017" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
        <div class="w3-center">
            <br>
            <span onclick="document.getElementById('id017').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span> GOODS Coin Withdraw
        </div><br>
        <form method="post">
         <div class="form-group">
                <label for="usr">GDS Ammount:</label>
                <input  name="gdswithdrawammount" class="form-controll" value="" placeholder="GDS Ammount" autocomplete="off" onkeypress="return isNumberKey(event)"  type="number" step="0.00000001">
              </div>
            <div class="form-group">
              <label for="pwd">Spending Password:</label>
              <input type="text" class="form-controll" name="gdswithdraw"  value="" placeholder="Spending Password">
            </div> 
            <div class="form-group">
        
       <button name="btngdswithdraw">Withdraw</button>
      </div>
    </form>
     <br> <br> <br>
    </div>

</div>
<!-- 18 -->
<div id="id018" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">
        <div class="w3-center">
            <br>
            <span onclick="document.getElementById('id018').style.display='none'" class="w3-button w3-xlarge w3-hover-red w3-display-topright" title="Close Modal">&times;</span> EBT Coin Withdraw
        </div><br>
        <form method="post">
         <div class="form-group">
                <label for="usr">EBT Ammount</label>
                <input  name="ebtwithdrawammount" class="form-controll" value="" placeholder="EBT Ammount" autocomplete="off" onkeypress="return isNumberKey(event)"  type="number" step="0.00000001">
              </div>
            <div class="form-group">
              <label for="pwd">Spending Password:</label>
              <input type="text" class="form-controll" name="ebtwithdraw"  value="" placeholder="Spending Password">
            </div> 
            <div class="form-group">
       <button name="btnebtwithdraw">Withdraw</button>
      </div>
    </form>
     <br> <br> <br>
    </div>

</div>

