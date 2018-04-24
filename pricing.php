<?php include 'inc/header.php' ?>
<div class="page-header">
<h1>
	Pricing Tables
	<small>
		<i class="ace-icon fa fa-angle-double-right"></i>
		At a glance
	</small>
</h1>
</div><!-- /.page-header -->

<div class="row">
<div class="col-xs-12">
	<!-- PAGE CONTENT BEGINS -->
	<div class="row">
	<?php
		$query ="SELECT * FROM tbl_productdetails order by id desc";
		$installment = $db->select($query);
		if ($installment) {
			$i=0;
			while ($result = $installment->fetch_assoc()) {
				$i++;
			?>
		<div class="col-xs-6 col-sm-3 pricing-box">
			<div class="widget-box widget-color-blue">
				<div class="widget-header">
					<h5 class="widget-title bigger lighter"><?php echo $result['name'];?></h5>
				</div>

				<div class="widget-body">
					<div class="widget-main">
						<ul class="list-unstyled spaced2">
							<li>
								<i class="ace-icon fa fa-check green"></i>
								<?php echo $result['size'];?>
							</li>

							<li>
								<i class="ace-icon fa fa-check green"></i>
								<?php echo $result['garrenty'];?>
							</li>

							<li>
								<i class="ace-icon fa fa-check green"></i>
								<?php echo $result['warrenty'];?>
							</li>

							<li>
								<i class="ace-icon fa fa-check green"></i>
								<?php echo "Product Price : Tk. ".$result['picec'];?>
							</li>

							<li>
								<i class="ace-icon fa fa-check green"></i>
								<?php echo "Down Payment : ".$result['downPayment']."%";?>
							</li>

							<li>
								<i class="ace-icon fa fa-check green"></i>
								Installment : (Total Price-35%)/(<?php echo $result['ins_time'];?>*4)
							</li>
						</ul>

						<hr />
						<div class="price">
							<?php echo "Tk. ".$result['picec'];?>
							<small> Weekly</small>
						</div>
					</div>

					<div>
						<a href="" class="btn btn-block btn-danger">
							<i class="ace-icon fa fa-shopping-cart bigger-110"></i>
							<span>Buy</span>
						</a>
					</div>
				</div>
			</div>
		</div>
		<?php } } ?>
	</div>
	</div>
	</div>

	<!-- 
		<div class="space-24"></div>
	<h3 class="header smaller red">Small Style</h3>

	<div class="row">
		<div class="col-xs-4 col-sm-3 pricing-span-header">
			<div class="widget-box transparent">
				<div class="widget-header">
					<h5 class="widget-title bigger lighter">Package Name</h5>
				</div>

				<div class="widget-body">
					<div class="widget-main no-padding">
						<ul class="list-unstyled list-striped pricing-table-header">
							<li>Disk Space </li>
							<li>Bandwidth </li>
							<li>Email Accounts </li>
							<li>MySQL Databases </li>
							<li>Ad Credit </li>
							<li>Free Domain </li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="col-xs-8 col-sm-9 pricing-span-body">
			<div class="pricing-span">
				<div class="widget-box pricing-box-small widget-color-red3">
					<div class="widget-header">
						<h5 class="widget-title bigger lighter">Basic</h5>
					</div>

					<div class="widget-body">
						<div class="widget-main no-padding">
							<ul class="list-unstyled list-striped pricing-table">
								<li> 10 GB </li>
								<li> 200 GB </li>
								<li> 100 </li>
								<li> 10 </li>
								<li> $10 </li>

								<li>
									<i class="ace-icon fa fa-times red"></i>
								</li>
							</ul>

							<div class="price">
								<span class="label label-lg label-inverse arrowed-in arrowed-in-right">
									$5
									<small>/month</small>
								</span>
							</div>
						</div>

						<div>
							<a href="#" class="btn btn-block btn-sm btn-danger">
								<span>Buy</span>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="pricing-span">
				<div class="widget-box pricing-box-small widget-color-orange">
					<div class="widget-header">
						<h5 class="widget-title bigger lighter">Starter</h5>
					</div>

					<div class="widget-body">
						<div class="widget-main no-padding">
							<ul class="list-unstyled list-striped pricing-table">
								<li> 50 GB </li>
								<li> 1 TB </li>
								<li> 1000 </li>
								<li> 100 </li>
								<li> $25 </li>

								<li>
									<i class="ace-icon fa fa-check green"></i>
									1
								</li>
							</ul>

							<div class="price">
								<span class="label label-lg label-inverse arrowed-in arrowed-in-right">
									$10
									<small>/month</small>
								</span>
							</div>
						</div>

						<div>
							<a href="#" class="btn btn-block btn-sm btn-warning">
								<span>Buy</span>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="pricing-span">
				<div class="widget-box pricing-box-small widget-color-blue">
					<div class="widget-header">
						<h5 class="widget-title bigger lighter">Business</h5>
					</div>

					<div class="widget-body">
						<div class="widget-main no-padding">
							<ul class="list-unstyled list-striped pricing-table">
								<li> 200 GB </li>
								<li> Unlimited </li>
								<li> 1000 </li>
								<li> 200 </li>
								<li> $25 </li>

								<li>
									<i class="ace-icon fa fa-check green"></i>
									1
								</li>
							</ul>

							<div class="price">
								<span class="label label-lg label-inverse arrowed-in arrowed-in-right">
									$15
									<small>/month</small>
								</span>
							</div>
						</div>

						<div>
							<a href="#" class="btn btn-block btn-sm btn-primary">
								<span>Buy</span>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="pricing-span">
				<div class="widget-box pricing-box-small widget-color-green">
					<div class="widget-header">
						<h5 class="widget-title bigger lighter">Unlimited</h5>
					</div>

					<div class="widget-body">
						<div class="widget-main no-padding">
							<ul class="list-unstyled list-striped pricing-table">
								<li> Unlimited </li>
								<li> Unlimited </li>
								<li> Unlimited </li>
								<li> Unlimited </li>
								<li> $50 </li>

								<li>
									<i class="ace-icon fa fa-check green"></i>
									2
								</li>
							</ul>

							<div class="price">
								<span class="label label-lg label-inverse arrowed-in arrowed-in-right">
									$25
									<small>/month</small>
								</span>
							</div>
						</div>

						<div>
							<a href="#" class="btn btn-block btn-sm btn-success">
								<span>Buy</span>
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="pricing-span">
				<div class="widget-box pricing-box-small widget-color-grey">
					<div class="widget-header">
						<h5 class="widget-title bigger lighter">Extreme</h5>
					</div>

					<div class="widget-body">
						<div class="widget-main no-padding">
							<ul class="list-unstyled list-striped pricing-table">
								<li> Unlimited </li>
								<li> Unlimited </li>
								<li> Unlimited </li>
								<li> Unlimited </li>
								<li> $100 </li>

								<li>
									<i class="ace-icon fa fa-check green"></i>
									3
								</li>
							</ul>

							<div class="price">
								<span class="label label-lg label-inverse arrowed-in arrowed-in-right">
									$30
									<small>/month</small>
								</span>
							</div>
						</div>

						<div>
							<a href="#" class="btn btn-block btn-sm btn-grey">
								<span>Buy</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div><!-- PAGE CONTENT ENDS --
	 -->


</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->
<?php include 'inc/footer.php' ?>