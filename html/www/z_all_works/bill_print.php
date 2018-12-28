<html>

<head>

   <title>SPY HUnter</title>

    <meta charset="UTF-8">


    <style type="text/css" media="all">
    	td{
    		padding: 5px; 

    	}

    	table{
    		width: 100%;
    	}
    	
    	.bgcolor{
    		background-color: #dbdde0 !important;


    	}

    	.tcenter{
    		text-align: center;
    	}

    	body{
			  -webkit-print-color-adjust:exact;
		}
		
		@page {
  			  size: auto;   /* auto is the initial value */
  			  margin: 0;  /* this affects the margin in the printer settings */
		}
		.btnprint{
			margin: 10px;
			padding: 10px;
		}
		table{
			
		}

		.border{
			border: 1px solid #a6a7a8;
		}

		.ucase {
    		text-transform: uppercase;
		}

    </style>

    <style type="text/css" media="print">
    	.btnprint{
    		display: none;
    	}
    </style>


    <script type="text/javascript">
    	
    	function printPage(obj){
    		//document.getElementById("hide").style.display="none";
    		window.print();
    	}
    
    </script>

</head>

<body> 
<div id="hide">			
				<input type="button" class="btnprint" name="" value="PRINT" onclick="printPage(this)">
			
				<a href=<?php //echo base_url()."index.php/CCreateInvoise"; ?> ><button class="btnprint">BACK</button></a>
			
				<a href=<?php //echo base_url()."index.php/CSellEntry"; ?> ><button class="btnprint">SHOW ALL INVOISE</button></a>
</div>
	
<table class="tmain">


<tr ><!--header-->
	<table class="border bgcolor">
		<tr>
			<td width="10%"></td>
			<td width="70%" align="center">
			<span class="ucase"><?php echo @$store['cname']; ?></span>
				<br><?php echo @$store['area'].",".@$store['city']; ?>
				<br><?php echo @$store['state']."-".@$store['pincode']; ?>
			</td>
			<td width="20%">
				<?php echo @$store['email']; ?><br>
				+91 <?php echo @$store['mobile']; ?>
			</td>
		</tr>
	</table>
</tr>

<tr><!--compney details-->
	<table class="border">
		<tr>
			<td>Gstin Number: <?php echo @$store['gstin']; ?></td>
			<td align="right">Invoice Date:<?php echo @$sell['idate']; ?></td>
		</tr>
		<tr>
			<td >Invoice Serial Number: #SN<?php echo @$sell['sno']; ?></td>
			<td align="right">Tax Is Payable On Reverse Charge: <?php echo (@$sell['tprcharg']==0) ? "No": "YES"; ?></td>
		</tr>
	</table>
</tr>

<tr><!--customer shiping details-->
	<table>
		
		<tr class="bgcolor">

			<td class="border" >Details of Receiver (Billed to)</td>
			<?php if(@$customer['darea']!=0){ ?>
				<td class="border" >Details of Consignee (Shipped to)</td>
			<?php } ?>
		
		</tr>
		
		<tr >

			<td class="border" >
				
				<table ><!--customer add-->

					<tr >
						<td>Name:</td>
						<td> <?php echo @$customer['name']; ?></td>
					</tr>
					<tr>
						<td>Mobile No:</td>
						<td><?php echo @$customer['mobile']; ?></td>
					</tr>
					<tr>
						<td>Address:</td>
						<td> <?php echo @$customer['barea'].",".@$customer['bcity']; ?></td> 
					</tr>
					<tr>
						<td>State:</td>
						<td><?php echo @$customer['bstate']."-".@$customer['bpincode']; ?></td>
					</tr>
					<tr>
						<td>GSTIN Number:</td>
						<td><?php echo @$customer['gstin']; ?></td>
					</tr>

				</table>

			</td>

			<?php if(@$customer['darea']!=0){ ?>
			
				<td class="border">
					
					<table ><!--shipping add-->
						
						<tr >
							<td>Name:</td>
							<td> <?php echo @$customer['name']; ?></td>
						</tr>
						<tr>
							<td>Mobile No:</td>
							<td><?php echo @$customer['mobile']; ?></td>
						</tr>
						<tr>
							<td>Address:</td>
							<td> <?php echo @$customer['darea'].",".@$customer['dcity']; ?></td> 
						</tr>
						<tr>
							<td>State:</td>
							<td><?php echo @$customer['dstate']."-".@$customer['dpincode']; ?></td>
						</tr>

					</table>

				</td>
			
			<?php } ?>
		
		</tr>
	
	</table>

</tr>

<tr><!--product details-->
	<table class="border">
		<tr class="bgcolor">
			<td>S.No</td>
			<td>Description of Goods</td>
			<td>HSN Code</td>
			<td>RATE</td>
			<td>QTY</td>
			<td>SGST</td>
			<td>CGST</td>
			<td>IGST</td>
			<td>AMOUNT</td>			
		</tr>

<?php
	@$i=1;

	foreach (@$product as $key ) {
		echo "<tr>";
			echo "<td>".@$i."</td>";
			echo "<td>".@$key['name']."</td>";
			echo "<td>".@$key['hsn']."</td>";
			echo "<td>".@$key['amt']."</td>";
			echo "<td>".@$key['qty']."</td>";
			@$tex=(@$sell['textype']==1) ? @$key['gst']/2 : "0";
			echo "<td>".@$tex."</td>";
			echo "<td>@$tex</td>";
			@$tex=(@$sell['textype']==2) ? @$key['gst'] : "0";
			echo "<td>".@$tex."</td>";
			echo "<td>".@$key['qty']*@$key['amt']."</td>";			
		echo "</tr>";	

		@$i++;
	}


?>



		<tr class="bgcolor">
			<td colspan="8" >DISSCOUNT(%)</td>
			<td> <?php echo @$sell['dcount']; ?> %</td>			
		</tr>
		<tr class="bgcolor">
			<td colspan="8" >TOTAL</td>
			<td>Rs. <?php echo @$sell['tamt']; ?> /-</td>			
		</tr>
		<tr class="bgcolor">
			<td colspan="2" >TOTAL(in words)</td>
			<td colspan="7" ></td>			
		</tr>
	</table>
</tr>

<tr><!--footer pmode signature ern-->	
	<table >
		<tr class="bgcolor tcenter" >
			<td class="border">Payment Mode</td>
			<td class="border">Electronic Reference Number</td>
		</tr>
		<tr class="tcenter">
			<td class="border"><?php echo (@$sell['ptype']==0) ? "no define" : (@$sell['ptype']==1) ? "cash" : "Bank"; ?></td>
			<td class="border">&nbsp;</td>
		</tr>
	</table>

	<table>
		<tr class="bgcolor tcenter">
			<td class="border">TERM & CONDITION</td>
			<td class="border">compney name</td>
		</tr>
		<tr class="tcenter">
			<td class="border">&nbsp; <br><br><br><br></td>
			<td class="border"><br><br>Signature:_______________</td>
		</tr>
	</table>
</tr>

</table>

</body>

</html>