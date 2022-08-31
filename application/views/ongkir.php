<html>

<head>
    <title>cekONGKIR - erfandibagus.com</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <style type="text/css">
        .content {
            margin-top: 45px;
        }

        .title-bar {
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <div class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
        <div class="container">
            <a href="../" class="navbar-brand">cekONGKIR</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> &nbsp;Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container content">
        <div class="row">
            <div class="col-md-12">
                <form action="<?php echo base_url('check/cost'); ?>" method="GET">
                    <h6 class="title-bar"><i class="fa fa-caret-square-o-right"></i> KOTA ASAL</h6>
                    <hr />
                    <div class="form-group">
                        <label for="originprovince">Provinsi</label>
                        <select class="form-control" name="originprovince" id="originprovince" required="" onchange="showOrig(this.value)">
                            <option value="">- Provinsi -</option>
                            <?php foreach ($province->rajaongkir->results as $prov) { ?>
                                <option value="<?php echo $prov->province_id; ?>"><?php echo $prov->province; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="origincity">Kota</label>
                        <select class="form-control" name="origincity" id="origincity" required="">
                            <option value="">- Pilih Kota -</option>
                        </select>
                    </div>
                    <h6 class="title-bar"><i class="fa fa-caret-square-o-right"></i> KOTA TUJUAN</h6>
                    <hr />
                    <div class="form-group">
                        <label for="destinationprovince">Provinsi</label>
                        <select class="form-control" name="destinationprovince" id="destinationprovince" required="" onchange="showDest(this.value)">
                            <option value="">- Provinsi -</option>
                            <?php foreach ($province->rajaongkir->results as $dest) { ?>
                                <option value="<?php echo $dest->province_id; ?>"><?php echo $dest->province; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="destinationcity">Kota</label>
                        <select class="form-control" name="destinationcity" id="destinationcity" required="">
                            <option value="">- Pilih Kota -</option>
                        </select>
                    </div>
                    <br />
                    <div class="form-group">
                        <label for="courier">Kurir</label>
                        <select class="form-control" name="courier" id="courier" required="">
                            <option value="">- Pilih Kurir -</option>
                            <option value="jne">JNE</option>
                            <option value="tiki">TIKI</option>
                            <option value="pos">Pos Indonesia</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="weight">Berat (Kg)</label>
                        <input class="form-control" type="number" name="weight" id="weight" required="">
                    </div>
                    <div class="form-group">
                        <input class="btn btn-secondary btn-sm" type="submit" value="CEK ONGKIR">
                    </div>
                </form>
            </div>
        </div>
    </div>



</body>
<script>
    function showOrig(str) {
        if (str == "") {
            document.getElementById("origincity").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("origincity").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "<?php echo base_url('check/city/'); ?>?q=" + str, true);
            xmlhttp.send();
        }
    }

    function showDest(str) {
        if (str == "") {
            document.getElementById("destinationcity").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("destinationcity").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "<?php echo base_url('check/city/'); ?>?q=" + str, true);
            xmlhttp.send();
        }
    }
</script>

</html>