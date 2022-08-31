<?php

$asal = 481; //Kabupaten asal ongkir akan dihitung dari kota/kabupaten ini ID 39 adalah kabupaten Bantul, Yogyakarta
$id_kabupaten = $_POST['kab_id'];
$kurir = $_POST['kurir'];
$berat = 1000; //Berat barang menggunakan satuan gram
$subtotal = $this->cart->total();

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => "http://api.rajaongkir.com/starter/cost",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "origin=" . $asal . "&destination=" . $id_kabupaten . "&weight=" . $berat . "&courier=" . $kurir . "",
    CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "key:8b9e257a5e4d134dc057a4f7f2ee799b"
    ),
));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $data = json_decode($response, true);
}
?>
<?php
for ($k = 0; $k < count($data['rajaongkir']['results']); $k++) {
?>
    <div title="<?php echo strtoupper($data['rajaongkir']['results'][$k]['name']); ?>" style="padding:10px">


        <div class="controls">
            <select name="pilih_ongkir" id="pilih_ongkir" class="form-control">
                <option value="">Pilih Layanan</option>
                <?php
                for ($l = 0; $l < count($data['rajaongkir']['results'][$k]['costs']); $l++) {
                ?>
                    <option value="<?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value']; ?>">
                        <?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['service']; ?> | <?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['description']; ?> | <?php echo $data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['etd']; ?> Hari | Rp. <?php echo number_format($data['rajaongkir']['results'][$k]['costs'][$l]['cost'][0]['value']); ?>
                    </option>
                <?php
                }
                ?>
            </select>
        </div>
    <?php
}
    ?>

    <div class="col-md-12 form-group p_star">
        <input type="hidden" id="subtotal_input" value="<?php echo $subtotal ?>">
    </div>
    <div class="col-md-12 form-group p_star">
        <input type="hidden" class="form-control" id="total_input" name="total_input" value="">
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#pilih_ongkir').on('click', function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?php echo site_url('provinsi/get_biaya'); ?>",
                    method: "POST",
                    data: {
                        id: id
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        var biaya = $("#pilih_ongkir").val();
                        var subtotal = $("#subtotal_input").val();
                        var total = parseInt(biaya) + parseInt(subtotal);

                        $('#total_input').val(total);
                    }
                });
                return false;
            });

        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#pilih_ongkir').on('click', function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?php echo site_url('provinsi/get_biaya'); ?>",
                    method: "POST",
                    data: {
                        id: id
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        html = '';
                        var ongkir = $("#pilih_ongkir").val();

                        html += '<a value=' + '>' + 'Biaya Pengiriman <span>Rp ' + ongkir + '</span></a>'
                        $('#ongkir').html(html);
                    }
                });
                return false;
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#pilih_ongkir').on('click', function() {
                var id = $(this).val();
                $.ajax({
                    url: "<?php echo site_url('provinsi/get_biaya'); ?>",
                    method: "POST",
                    data: {
                        id: id
                    },
                    async: true,
                    dataType: 'json',
                    success: function(data) {
                        html = '';
                        var price = $("#total_input").val();

                        html += '<a value=' + '>' + 'Total <span>Rp ' + price + '</span></a>'
                        $('#total').html(html);
                    }
                });
                return false;
            });
        });
    </script>