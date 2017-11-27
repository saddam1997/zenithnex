
<!DOCTYPE html>
<html>
<head>
<script  src="js/jquery.min.js"></script>
</head>
<body>
<script type="text/javascript">
function disablefirstbutton() {
    document.getElementById("firstbutton").disabled = true;
    document.getElementById("secondbutton").disabled = false;
}

function disablesecondbutton() {
    document.getElementById("secondbutton").disabled = true;
    document.getElementById("firstbutton").disabled = false;
}
</script>


<button id="firstbutton" onclick="disablefirstbutton()">button 1</button>
<button id="secondbutton" onclick="disablesecondbutton()">button 2</button>

</body>
</html>
</script>

