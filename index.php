<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<style type="text/css">
body {
	margin: 15px;
}
</style>
<body onload="fetch2()">
    Coded by: <a href="https://www.linkedin.com/in/shekharchatterjee" target="_new">Shekhar Chatterjee</a><br><br>
    <div class="panel panel-default">
        <div class="panel-heading">
            Branch Autocomplete
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-3">
                    <input type="text" class="form-control" id="q1" placeholder="Enter Search Value" value="">
                </div>
                <div class="col-lg-3">
                    <input type="number" step="1" class="form-control" id="limit1" placeholder="Enter Limit" value="5">
                </div>
                <div class="col-lg-3">
                    <input type="number" step="1" class="form-control" id="offset1" placeholder="Enter Offset" value="0">
                </div>
                <div class="col-lg-3">
                    <button class="btn btn-primary" id="fetchButton" onclick="fetch1()">Fetch Data</button>
                </div>
            </div>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            Search by any column
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-3">
                    <input type="text" class="form-control" id="q2" placeholder="Enter Search Value">
                </div>
                <div class="col-lg-3">
                    <input type="number" step="1" class="form-control" id="limit2" placeholder="Enter Limit" value="5">
                </div>
                <div class="col-lg-3">
                    <input type="number" step="1" class="form-control" id="offset2" placeholder="Enter Offset" value="0">
                </div>
                <div class="col-lg-3">
                    <button class="btn btn-primary" id="fetchButton" onclick="fetch2()">Fetch Data</button>
                </div>
            </div>
        </div>
    </div>
<div class="page-body">
            <div class="panel panel-default">
                <div class="panel-heading">
                    List of Branches
                </div><Br>
                <div class="panel-body cart-panel">
                    <div class="table-responsive">
                        <table class="table table-hover cart" id="invTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th width="4%" style="text-align:left">IFSC</th>
                                    <th width="7%" style="text-align:left">Bank ID</th>
                                    <th width="8%" style="text-align:left">Branch</th>           
                                    <th width="34%" style="text-align:left">Address</th>                                   
                                    <th width="12%" style="text-align:left">City</th>
                                    <th width="12%" style="text-align:left">District</th>
                                    <th width="8%" style="text-align:left">State</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                   
                  
            </div>
        </div>
    </body>
    <script type="text/javascript">

function fetch1() {
    //alert("a");
    $("#invTable > tbody").html("");
            var rowContent = '<tr><th scope="row" colspan="8" style="text-align:center">Processing..</th></tr>';
            $('#invTable tbody').append(rowContent);
    var q = document.getElementById("q1").value;
    var limit = document.getElementById("limit1").value;
    var offset = document.getElementById("offset1").value;
    var url = "branches/autocomplete?q="+q+"&limit="+limit+"&offset="+offset;
    //alert(url);
    $.post(url, function(data) {
        $("#invTable > tbody").html("");
        if (data != "") {
            j = $.parseJSON(data);
            j = j["branches"];
            //alert(j["branches"][1].ifsc);            
            l = Object.keys(data).length;
            for ($i = 0; $i <= l; $i++) {

                cell1 = ($i + 1);
                cell2 = j[$i].ifsc;
                cell3 = j[$i].bank_id;
                cell4 = j[$i].branch;
                cell9 = j[$i].address;
                cell5 = j[$i].city;
                cell6 = j[$i].district;
                cell7 = j[$i].state;

                var rowContent = '<tr><th scope="row">'+cell1+'</th><td style="text-align:left">'+cell2+'</td><td class="text-left">'+cell3+'</td><td class="text-left">'+cell4+ '</td><td class="text-left">' + cell9 + '</td><td class="text-left">' + cell5 + '</td><td class="text-left">' + cell6 + '</td><td class="text-left">' + cell7 + '</td></tr>';

                //alert(rowContent);
                $('#invTable tbody').append(rowContent);


            }

        } else {
            $("#invTable > tbody").html("");
            var rowContent = '<tr><th scope="row" colspan="8" style="text-align:center">No results to list</tr>';
            $('#invTable tbody').append(rowContent);
        }

    });
}

function fetch2() {
    //alert("a");
    $("#invTable > tbody").html("");
    var rowContent = '<tr><th scope="row" colspan="8" style="text-align:center">Processing..</th></tr>';
    $('#invTable tbody').append(rowContent);
    var q = document.getElementById("q2").value;
    var limit = document.getElementById("limit2").value;
    var offset = document.getElementById("offset2").value;
    var url = "branches/?q="+q+"&limit="+limit+"&offset="+offset;
    //alert(url);
    $.post(url, function(data) {
        $("#invTable > tbody").html("");
        if (data != "") {
            j = $.parseJSON(data);
            j = j["branches"];
            //alert(j["branches"][1].ifsc);            
            l = Object.keys(data).length;
            for ($i = 0; $i <= l; $i++) {

                cell1 = ($i + 1);
                cell2 = j[$i].ifsc;
                cell3 = j[$i].bank_id;
                cell4 = j[$i].branch;
                cell9 = j[$i].address;
                cell5 = j[$i].city;
                cell6 = j[$i].district;
                cell7 = j[$i].state;

                var rowContent = '<tr><th scope="row">' + cell1 + '</th><td style="text-align:left">' + cell2 + '</td><td class="text-left">' + cell3 + '</td><td class="text-left">' + cell4 + '</td><td class="text-left">' + cell9 + '</td><td class="text-left">' + cell5 + '</td><td class="text-left">' + cell6 + '</td><td class="text-left">' + cell7 + '</td></tr>';

                //alert(rowContent);
                $('#invTable tbody').append(rowContent);


            }

        } else {
            $("#invTable > tbody").html("");
            var rowContent = '<tr><th scope="row" colspan="8" style="text-align:center">No results to list</tr>';
            $('#invTable tbody').append(rowContent);
        }

    });
} 
</script>

