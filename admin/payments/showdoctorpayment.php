<?php
include "../db.php";
$stmt = $dbpdo->prepare("SELECT * FROM doctorpayment AS dp JOIN doctors AS d ON dp.doctor_id = d.d_id");
$stmt->execute();
$doctorpayments = $stmt->fetchAll();
$output = "<table id='example' class='table table-bordered table-striped'>
                        <thead>
                            <th>ID</th>
                            <th>Doctor Name</th>
                            <th>Amount</th>
                            <th>Discription</th>
                            <th>Date</th>
                        </thead>
                        <tbody>";
if($doctorpayments > 0 ){
    foreach($doctorpayments as $doctorpayment){
        $output .= "
        <tr>
                                <td>{$doctorpayment['id']}</td>
                                <td>{$doctorpayment['d_name']}</td>
                                <td>{$doctorpayment['amount']}</td>
                                <td>{$doctorpayment['description']}</td>
                                <td>{$doctorpayment['date']}</td>
                            </tr>
        ";
    }
    $output .= "</tbody>
                </table>";
                echo $output;

}else{
    echo "Data Not Found !";
}
?>