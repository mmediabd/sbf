<?php include 'inc/header.php' ?>

<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<div class="space-6"></div>

		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
			<div class="well text-center col-lg-offset-3 col-lg-6">
				<div class="form-group">
					<label class="col-xs-4 col-sm-4 col-md-4 col-lg-4 control-label  hidden-480" for="form-field-1">Select Account Number :</label>
						<div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
							<select class="chosen-select col-xs-10 col-sm-3" id="form-field-1" name="acc_number" data-placeholder="Select Account Number...">
							<option value="">  </option>
						
								<?php
		                            $query = "select * from tbl_ptcpersonalinfo";
		                            $Category = $db->select($query);
		                            if ($Category) {
		                                while ($result = $Category->fetch_assoc()) { 
		                            ?>
		                            <option value="<?php echo $result['acc_number'];?>"><?php echo $result['acc_number'];?></option>
	                        	<?php } } ?>
							</select>
						</div>
					<div>
						<input class="btn btn-success btn-sm btn-round" type="submit" name="submit" value="Submit">
					</div>
				</div>
			</div>
		</form>

		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="widget-box transparent">
					<div class="widget-header widget-header-large">
						<h3 class="widget-title grey lighter">
							<i class="ace-icon fa fa-leaf green"></i>
							Customer Invoice
						</h3>

						<div class="widget-toolbar no-border invoice-info">
							<span class="invoice-info-label">Invoice:</span>
							<span class="red">#121212</span>

							<br />
							<span class="invoice-info-label">Date:</span>
							<span class="blue"><?php echo date('d-m-Y, g:i A'); ?></span>
						</div>

						<div class="widget-toolbar hidden-480" id="print" onclick="javascript:printlayer('div-id-name')">
								<button class="btn btn-app btn-light btn-xs">
									<i class="ace-icon fa fa-print bigger-160"></i>
									Print
								</button>
						</div>
					</div>

					<div class="widget-body" id="div-id-name">
						<div class="widget-main padding-24">
							<div class="row">
								<div class="col-sm-6">
									<div class="row">
										<div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
											<b style="font-size: 16px; ">Company Information</b>
										</div>
									</div>

									<div>
										<ul class="list-unstyled spaced">
											<li>
												<i class="ace-icon fa fa-caret-right blue"></i>Perfect Trading Corporation (P.T.C)
											</li>
											<li>
												<i class="ace-icon fa fa-caret-right blue"></i>Korara, Noya Para
											</li>

											<li>
												<i class="ace-icon fa fa-caret-right blue"></i>Madhab Pur, Habigonj
											</li>

											<li>
												<i class="ace-icon fa fa-caret-right blue"></i>Bangladesh.
											</li>

											<li>
												<i class="ace-icon fa fa-caret-right blue"></i>
												Phone:
												<b class="red">01725-25256292</b>
											</li>

											<li class="divider"></li>

											<li>
												<i class="ace-icon fa fa-caret-right blue"></i>
												Paymant Info
											</li>
										</ul>
									</div>
								</div><!-- /.col -->

								<div class="col-sm-6">
									<div class="row">
										<div class="col-xs-11 label label-lg label-success arrowed-in arrowed-right">
											<b>Customer Information</b>
										</div>
									</div>

									<div>
										<ul class="list-unstyled  spaced">
											<li>
												<i class="ace-icon fa fa-caret-right green"></i>Name : Abdul Karim.
											</li>
											
											<li>
												<i class="ace-icon fa fa-caret-right green"></i>Address : Noyapara, Kasipur.
											</li>
											
											<li>
												<i class="ace-icon fa fa-caret-right green"></i>Mobile Number : 01725256292
											</li>

											<li>
												<i class="ace-icon fa fa-caret-right green"></i>Country : Bangladesh
											</li>

											<li class="divider"></li>

											<li>
												<i class="ace-icon fa fa-caret-right green"></i>
												Account Number : <input type="text" name="" placeholder="Enter Account No......">
											</li>
										</ul>
									</div>
								</div><!-- /.col -->
							</div><!-- /.row -->

							<div class="space"></div>

							<div>
								<table class="table table-striped table-bordered">
									<thead>
										<tr>
											<th class="center">#</th>
											<th>Product</th>
											<th class="hidden-xs">Description</th>
											<th class="hidden-480">Discount</th>
											<th>Total</th>
										</tr>
									</thead>

									<tbody>
										<tr>
											<td class="center">1</td>

											<td>
												<a href="#">google.com</a>
											</td>
											<td class="hidden-xs">
												1 year domain registration
											</td>
											<td class="hidden-480"> --- </td>
											<td>$10</td>
										</tr>

										<tr>
											<td class="center">2</td>

											<td>
												<a href="#">yahoo.com</a>
											</td>
											<td class="hidden-xs">
												5 year domain registration
											</td>
											<td class="hidden-480"> 5% </td>
											<td>$45</td>
										</tr>

										<tr>
											<td class="center">3</td>
											<td>Hosting</td>
											<td class="hidden-xs"> 1 year basic hosting </td>
											<td class="hidden-480"> 10% </td>
											<td>$90</td>
										</tr>

										<tr>
											<td class="center">4</td>
											<td>Design</td>
											<td class="hidden-xs"> Theme customization </td>
											<td class="hidden-480"> 50% </td>
											<td>$250</td>
										</tr>
									</tbody>
								</table>
							</div>

							<div class="hr hr8 hr-double hr-dotted"></div>

							<div class="row">
								<div class="col-sm-5 pull-right">
									<h4 class="pull-right">
										Total amount :
										<span class="red">$395</span>
									</h4>
								</div>
								<div class="col-sm-7 pull-left"> Extra Information </div>
							</div>

							<div class="space-6"></div>
							<div class="well">
								Thank you for choosing <strong>Perfect Trading Corporation (P.T.C) products.</strong> We believe you will be satisfied by our services.
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->

<?php include 'inc/footer.php' ?>