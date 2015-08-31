<?php
	require_once('libPDF/config/lang/eng.php');
	require_once('libPDF/tcpdf.php');
	include("config.inc.php");
        include("lib/validaenvio.php");
	
	//handler de sesion
	$simsession = new SIMSession( SESSION_LIMIT );
	
	//traemos lo datos de la session
	$datos = $simsession->verificar();

        //datos del pedido
        $Pedido =$dbo->fetchAll("Pedido","IDPedido = '" . $_GET[IDPedido] . "' ","array");
	
	//parametros
	$Parametros =$dbo->fetchAll("Parametro","1","array");

        //proveedores de los productos del pedido seleccionado
        $ProveedoresDetalle = $dbo->query("SELECT Producto.IDProveedor FROM DetallePedido, Producto WHERE DetallePedido.IDProducto = Producto.IDProducto AND DetallePedido.IDPedido = '".$Pedido["IDPedido"]."'");
        while( $r = $dbo->fetchArray( $ProveedoresDetalle ) )
	    $ArrayProveedoresDetalle[$r[IDProveedor]]=$r[IDProveedor];

        //proveedores de los productos del pedido seleccionado
        $FechaEntregaDetalle = $dbo->query("SELECT Producto.IDProveedor , DetallePedido.FechaEntrega FROM DetallePedido, Producto WHERE DetallePedido.IDProducto = Producto.IDProducto AND DetallePedido.IDPedido = '".$Pedido["IDPedido"]."' ORDER BY Producto.IDProveedor, DetallePedido.FechaEntrega");
        while( $r = $dbo->fetchArray( $FechaEntregaDetalle ) )
             $ArrayFechaEntregaDetalle[$r[IDProveedor]]=$r["FechaEntrega"];

        foreach( $ArrayProveedoresDetalle as $IDProveedor)
        {
            //datos de proveedor del producto
            $DatosProveedor = $dbo->fetchAll("Proveedor","IDProveedor  = '" . $IDProveedor . "'","array");

            if($DatosProveedor[RecibeMail] == "S")
                {
                    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
                    $pdf->SetCreator(PDF_CREATOR);
                    $pdf->SetAuthor('Distripen Proveedor');
                    $pdf->SetTitle('Distripen Cotizacion Proveedor');
                    $pdf->SetSubject('Distripen Cotizacion Proveedor');
                    $pdf->SetKeywords('Distripen, Clientes Proveedor, Productos');
                    $pdf->SetHeaderData("logo_distripen_orden.jpg", "75" );
                    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
                    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
                    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
                    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
                    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
                    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
                    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
                    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
                    $pdf->setLanguageArray($l);
					//<td>Fecha O.C. : </td><td>'.SIMUtil::tiempo($Pedido["Fecha"]).'</td>
                    $html = '
                                    <br/><br/><br/>
                                    <table width="75%">
                                            <tr>
                                                    <td colspan="2"><h1>Orden de Compra No '.$Pedido[IDPedido].'</h1><br/></td>
                                            </tr>
                                            <tr>
                                                    <td>Fecha O.C. : </td><td>'.SIMUtil::tiempo(date("Y-m-d")).'</td>
                                            </tr>
                                            <tr>
                                                    <td>Fecha Entrega Del Proveedor : </td><td>'.SIMUtil::tiempo($ArrayFechaEntregaDetalle[$IDProveedor]).'</td>
                                            </tr>
                                            <tr>
                                                    <td colspan="2"><br/></td>
                                            </tr>
                                            <tr>
                                                    <td>Dirigido a.</td><td> '.$DatosProveedor[Contacto].'</td>
                                            </tr>
                                            <tr>
                                                    <td>Empresa : </td><td>'.$DatosProveedor[Nombre].'</td>
                                            </tr>
                                    </table>
                                    <br/>
                                    <table width="90%" border="1" bordercolor="red">
                                    <tr style="background-color:#CBCACA; color:#2B297D; font-weight:bold; text-decoration:none;" >
                                                <td align="center">Referencia</td>
												<td align="center">Nombre</td>
                                                <td align="center" style="width: 30%;">Descripci&oacute;n del Articulo</td>
                                                <td align="center">Comentarios</td>
                                                <td align="center" style="width: 10%;">Color</td>
                                                <td align="center" style="width: 10%;">Cantidad</td>
                                                <td align="center">Precio Unitario</td>
                                                <td align="center">Precio<br/> Total</td>
                                    </tr>';
                        //productos del pedido filtrado por proveedor
                        $TotalOrden = 0;
                        $ProductosProveedor = $dbo->query("SELECT Producto.* , DetallePedido.Color , DetallePedido.CantidadExtra , DetallePedido.ValorUnitario , DetallePedido.Comentarios  FROM DetallePedido, Producto WHERE DetallePedido.IDProducto = Producto.IDProducto AND DetallePedido.IDPedido = '".$Pedido["IDPedido"]."' AND Producto.IDProveedor = '".$IDProveedor."'");
                        while( $r = $dbo->fetchArray( $ProductosProveedor ) )
                        {
                            $html = $html . '
                                    <tr>
                                                    <td align="center">'.$r["Referencia"].'</td>
													<td align="center">'.$r["Nombre"].'</td>
                                                    <td align="center" style="width: 30%;">'.$r["Descripcion"].'</td>
                                                    <td align="center">'.$r["Comentarios"].'</td>
                                                    <td align="center" style="width: 10%;">'.$r["Color"].'</td>
                                                    <td align="center" style="width: 10%;">'.$r["CantidadExtra"].'</td>
                                                    <td align="center">$ '.round($r["ValorUnitario"]).'</td>
                                                    <td align="center">$ '.number_format($r["CantidadExtra"] * round($r["ValorUnitario"])).'</td>
                                    </tr>
                            ';
                           $TotalOrden = $TotalOrden + ($r["CantidadExtra"] * round($r["ValorUnitario"]));
                        }
                      $html = $html.'<tr>
                                                    <td></td>
                                                    <td style="width: 30%;"></td>
                                                    <td></td><td></td>
                                                    <td style="width: 10%;"></td>
                                                    <td style="width: 10%;"></td>
                                                    <td>Sub Total</td>
                                                    <td align="right">$ '.number_format($TotalOrden).'</td>
                                    </tr>
                                    <tr>
                                                    <td></td>
                                                    <td style="width: 30%;"></td>
                                                    <td></td><td></td>
                                                    <td style="width: 10%;"></td>
                                                    <td style="width: 10%;"></td>
                                                    <td>Iva ('.$Parametros[IVA].'%)</td>
                                                    <td align="right">$ '.number_format($TotalOrden * ($Parametros[IVA]/100)).'</td>
                                    </tr>
                                    <tr>
                                                    <td></td>
                                                    <td style="width: 30%;"></td>
                                                    <td></td><td></td>
                                                    <td style="width: 10%;"></td>
                                                    <td style="width: 10%;"></td>
                                                    <td>Total</td>
                                                    <td align="right">$ '.number_format($TotalOrden + ($TotalOrden * ($Parametros[IVA]/100))).'</td>
                                    </tr>
                                    </table>
                                    <br/><br/>
                                    <p>
                                    Por favor confirmar recibido de esta orden de compra por correo electronico y telefono, muchas gracias.
                                    <br/><br/>
                                    Pedidos Distripen SAS<br/>
									pedidos@distripen.com<br/>
									NIT: 830.055.991-1<br/>
									Bogota - Colombia.<br/>
                                    </p>
                                    ';
                      /*echo $html;
                      echo "<br/><br/><br/><br/>";*/
                    $pdf->SetFont('helvetica', '', 10);
                    $pdf->AddPage();
                    $pdf->writeHTML(utf8_encode($html), true, 0, true, true);
                    $pdf->Ln();
                    $pdf->lastPage();
                    $documentopdf = $pdf->Output('envioproveedor.pdf', 'S');
                    
                    $mail = new PHPMailer();
                    $mail->Host = "localhost";
                    $mail->From = "pedidos@distripen.com";
                    $mail->FromName = "Distripen";
                    $mail->Subject = "Orden De Compra #$_GET[IDPedido] Proveedor";

                    $EmailEnvios = explode(',',$DatosProveedor[Email]);

                    $BienMail = 0;
                    
                    foreach( $EmailEnvios as $ValorEmail )
                    {
                        if ( ! validateEmail($ValorEmail, true, true, 'pedidos@distripen.com', 'ns.paisweb.com', true) )
                        {
                            $mail->AddAddress($ValorEmail,"Nombre");
                            $BienMail = 1;
                        }
                    }
                    $mail->AddCC("ventas@distripen.com");
					$mail->AddCC("contabilidad@distripen.com");
					$mail->AddCC("pedidos@distripen.com");
                    $body  = "Buen dia,<br /><br />Adjunto se envia orden de compra, por favor confirmar el recibido.<br /><br />Atentamente,<br /><br /><br />DISTRIPEN<br />pedidos@distripen.com<br /><br />";
					$mail->Body = $body;
                    $mail->AltBody = "Distripen Proveedor";
                    $mail->AddStringAttachment($documentopdf, "orden_compra_$_GET[IDPedido]_Distripen.pdf" , 'base64', 'application/pdf');
                    if( $BienMail == 1 )
                        $mail->Send();
                }

        }
?>
<script>
close();
</script>