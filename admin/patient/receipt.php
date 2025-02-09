<?php
include "../db.php";

$id = $_GET['id'];

$stmt = $dbpdo->prepare("SELECT * FROM patient_test AS pt JOIN test AS t ON pt.tid = t.t_id JOIN patients AS p ON pt.pid = p.p_id WHERE pt.pid = '$id'");
$stmt->execute();
$reports = $stmt->fetchAll();

$st = $dbpdo->prepare("SELECT * FROM company WHERE `id` = 1");
$st->execute();
$comp = $st->fetch(PDO::FETCH_ASSOC);


?>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../asset/css/bootstrap.min.css">
	<link rel="stylesheet" href="../asset/icons/bootstrap-icons.min.css">
	<link rel="stylesheet" href="../asset/style.css">
	<link rel="stylesheet" href="../asset/fontawesome.min.css">
	<script src="../asset/js/bootstrap.bundle.min.js"></script>
	<script src="../asset/js/jquery.min.js"></script>
	<script src="../asset/qrcode.min.js"></script>
	<script src="../asset/apexcharts.js"></script>
	<script src="../asset/JsBarcode.code128.min.js"></script>
    <title>Lab Report</title>
</head>
<link rel="stylesheet" href="../asset/receipt.css">
<body onload="window.print()">
        <div class="ticket text-center">
            <img src="../images/lablogo.png" alt="Logo" class="w-50 ">
            <p class="centered"><?php echo $comp['name'];  ?>
            <input type="hidden" value="<?php echo $id; ?>" name="qr-code-content" id="qr-content" autocomplete="off"> 
            <table>
                <thead>
                    <tr>
                        <th class="quantity">Q.</th>
                        <th class="description">Description</th>
                        <th class="price">Rs</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                        foreach($reports as $report){
                            $total =$total + $report['t_charges'];
                            echo "
                                                <tr>
                        <td class='quantity'>".$report['t_id']."</td>
                        <td class='description'>".$report['t_name']."</td>
                        <td class='price'>".$report['t_charges']."</td>
                    </tr>";
                        }                    
                        ?>
                        <tr>
                        <td class='quantity'></td>
                        <td class='description'>Sub Total</td>
                        <td class='price'><?php echo $total ?></td>
                    </tr>
                        <tr>
                        <td class='quantity'></td>
                        <td class='description'>Discount</td>
                        <td class='price'><?php echo $total - $reports[0]['p_charges'] ?></td>
                    </tr>
                    </tr>
                        <tr>
                        <td class='quantity'></td>
                        <td class='description'>Payable</td>
                        <td class='price'><?php echo $reports[0]['p_charges'] ?></td>
                    </tr>
                    
                </tbody>
            </table>
            <hr class="p-0 m-0">
            <div class="row  mt-2">
                <div class="col-sm-4"><div id="qr-code"></div></div>
                <div class="col-sm-8">            <p class="centered">Many Thanks
                <br>0346-7998485</p></div>
            

                </div>
        </div>
    </body>
    <script>
    let qrContentInput = document.getElementById("qr-content");
    let qrGenerationForm = document.getElementById("qr-generation-form");
    let qrCode;
    
    function generateQrCode(qrContent) {
      return new QRCode("qr-code", {
        text: qrContent,
        width: 45,
        height: 45,
        colorDark: "#000000",
        colorLight: "#ffffff",
        correctLevel: QRCode.CorrectLevel.H,
      });
    }

      let qrContent = qrContentInput.value;
      if (qrCode == null) {
        qrCode = generateQrCode(qrContent);
      } else {
        qrCode.makeCode(qrContent);
      }

    </script>