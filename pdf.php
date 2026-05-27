<?php 
include 'db.php';
require 'vendor/autoload.php';
$result=$conn->query('select id,item_name,description,price,category from menu_item');
$pdf = new TCPDF();

$pdf->AddPage();

$pdf->setFont('times','I', 12);
$pdf->Cell('0','10', 'Menu_items','0','1','C');

$html = '<table>
<tr>
<td>item name</td>
<td>description</td>
<td>price</td>
<td>category</td>
</tr>
';

while($row=$result->fetch_assoc()) {
    $html .= '<tr>
    <td>'.$row['id'].'</td>
    <td>'.$row['item_name'].'</td>
    <td>'.$row['description'].'</td>
    <td>'.$row['price'].'</td>
    <td>'.$row['category'].'</td>

    </tr>';
}

$html .= '</table>';
$pdf->writeHtml($html ,true,false,true,false,'');
$pdf->Output("Menu_items.pdf", 'D');
?>