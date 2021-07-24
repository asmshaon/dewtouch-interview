<div class="portlet box yellow">
	<div class="portlet-title">
		<div class="caption">
			<?php echo __($title)?>
		</div>
	</div>
	<div class="portlet-body">
		<div class="row-fluid view_info">
			<div class="span12 ">

				<div class="tabbable tabbable-custom tabbable-full-width">
					<ul class="nav nav-tabs">

						<li class="active"><a href="#tab_item" data-toggle="tab"><?php echo __('Answer')?>
						</a></li>

					</ul>

					<div class="tab-content">
						
						<div class="tab-pane row-fluid active" id="tab_item">

							<div class="row-fluid">
								<table class="table table-bordered dataTable" id="table_orders">
									<thead>
										<tr>
											<th style="width:10%">S/N</th>
											<th colspan="2">Order Name</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach($order_reports as $order => $order_report):?>
										<tr class="item_tr" style="background-color:#fff;">
											<td><span class="row-details row-details-close"></span></td>
											<td colspan="2"><?php echo $order?></td>
										</tr>
										<tr class="hide">
											<td></td>
											<td colspan="2">
                                                <table style="width:100%">
                                                    <thead>
                                                    <tr>
                                                        <th style="border-left:none;width:50%">Item Name</th>
                                                        <th>Quantity</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach($order_reports[$order] as $q => $val):?>
                                                        <tr class="item_tr" style="background-color:#fff;">
                                                            <td style="border-left:none;width:50%"><span class="row-details row-details-close"></span> <?php echo $val['item']?></td>
                                                            <td style="width:50%"><?php echo $val['quantity']?></td>
                                                        </tr>
                                                        <tr class="hide">
                                                            <td class="2" style="border-right: 1px solid #ddd">
                                                                <table style="width:100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th style="border-left:none;width:50%">Ingredient  Name</th>
                                                                            <th>Value</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <?php foreach($val['ingredients'] as $q => $ingredient):?>
                                                                        <tr>
                                                                            <td style="border-left:none;width:50%"><?php echo $ingredient['name'] ?></td>
                                                                            <td><?php echo $ingredient['value'] ?></td>
                                                                        </tr>
                                                                    <?php endforeach;?>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach;?>
                                                    </tbody>
                                                </table>
											</td>
										</tr>
									<?php endforeach;?>
									</tbody>
								</table>
							</div>
						</div>

					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<?php $this->start('script_own')?>
<script>
$(document).ready(function(){
	
	$("body").on('click','tbody tr.item_tr',function(){

	  	if($(this).next().hasClass("hide")) {
			$(this).next().removeClass("hide");
	   		$(this).find("td").eq(0).find("span").eq(0).removeClass("row-details-close").addClass("row-details-open");
	 	}else{
	   		$(this).next().addClass("hide");
	   		$(this).find("td").eq(0).find("span").eq(0).removeClass("row-details-open").addClass("row-details-close");
	 	}

	  return false;
	 });
	
})
</script>
<?php $this->end()?>