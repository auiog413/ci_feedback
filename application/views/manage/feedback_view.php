<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->\
<html lang="en" class="no-js"><!--<![endif]--><!-- BEGIN HEAD --><head>
<meta charset="utf-8">
<title>Metronic | Data Tables - Advanced Datatables</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="" name="description">
<meta content="" name="author">
<meta name="MobileOptimized" content="320">
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="/statics/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="/statics/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="/statics/uniform.default.css" rel="stylesheet" type="text/css">
<!-- END GLOBAL MANDATORY STYLES -->
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="/statics/style-metronic.css" rel="stylesheet" type="text/css">
<link href="/statics/style.css" rel="stylesheet" type="text/css">
<link href="/statics/style-responsive.css" rel="stylesheet" type="text/css">
<link href="/statics/plugins.css" rel="stylesheet" type="text/css">
<link href="/statics/light.css" rel="stylesheet" type="text/css" id="style_color">
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico">
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed" style="">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse navbar-fixed-top">
	<!-- BEGIN TOP NAVIGATION BAR -->
	<div class="header-inner">
		<!-- BEGIN LOGO -->
		<a class="navbar-brand" href="index.html">
		<img src="/statics/logo-big.png" alt="logo" class="img-responsive">
		</a>
		<!-- END LOGO -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<ul class="nav navbar-nav pull-right">
			<!-- BEGIN USER LOGIN DROPDOWN -->
			<li class="dropdown user">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
				<img alt="" src="/statics/avatar1_small.jpg">
				<span class="username">
					<?php echo $logged_in;?>
				</span>
				<i class="fa fa-angle-down"></i>
				</a>
				<ul class="dropdown-menu">
					<li>
						<a href="/manage/logout"><i class="fa fa-key"></i> 注销</a>
					</li>
				</ul>
			</li>
			<!-- END USER LOGIN DROPDOWN -->
		</ul>
		<!-- END TOP NAVIGATION MENU -->
	</div>
	<!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN STYLE CUSTOMIZER -->
			
			<!-- END STYLE CUSTOMIZER -->
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					用户反馈 <small>advanced datatables</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb" style="display:none;">
						<li>
							<i class="fa fa-home"></i>
							<a href="#">全部</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">已读</a>
							<i class="fa fa-angle-right"></i>
						</li>
						<li>
							<a href="#">未读</a>
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-globe"></i> x
							</div>
							<div class="tools">
								<a href="javascript:;" class="reload"></a>
								<a href="javascript:;" class="remove"></a>
							</div>
						</div>
						<div class="portlet-body">
							<div id="sample_1_wrapper" class="dataTables_wrapper form-inline" role="grid"><div class="table-scrollable"><table class="table table-striped table-bordered table-hover dataTable" id="sample_1" aria-describedby="sample_1_info">
							<thead>
							<tr role="row">
								<th class="sorting_disabled" role="columnheader" rowspan="1" colspan="1" aria-label="" style="width: 32px;">
								</th><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="
									Rendering engine : activate to sort column descending" style="width: 550px;">
									反馈内容
								</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="
									Engine version : activate to sort column ascending" style="width: 150px;">
									联系信息
								</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="
									Engine version : activate to sort column ascending" style="width: 150px;">
									ip地址
								</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="
									Platform(s) : activate to sort column ascending" style="width: 150px;">
									反馈时间
								</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="sample_1" rowspan="1" colspan="1" aria-label="
									CSS grade : activate to sort column ascending" style="width: 80px;">
									操作
								</th></tr>
							</thead>
							
							<tbody role="alert" aria-live="polite" aria-relevant="all">
								<?php $seqs = 1; foreach ($fb_list->result() as $item):?>
									<?php $has_attachment = empty($item->attachments)?0:1;?>
									<tr class="odd" id="fbitem_<?php echo $item->id;?>"><?php $colspan=0;?>
										<?php $colspan++;?><td class=" "><?php echo $seqs;?></td>
										<?php $colspan++;?><td class="sorting_1" style="white-space:normal;"><?php if($item->title){echo '<strong style="color:green;">[</strong><strong style="color:orange;">' . $item->title . '</strong><strong style="color:green;">]</strong>&nbsp;';} echo $item->feed_content;?><?php if($has_attachment){ ?><a href="<?php echo $item->attachments;?>" target="_blank"><img src="/statics/image_s.gif" alt="图片附件" style="cursor:pointer;margin-left:5px;" rel="<?php echo $seqs;?>" ></a><?php } ?></td>
										<?php $colspan++;?>
										<td><?php
											$hascontent = '';
											if ($item->name) {echo $hascontent . '姓名：' . $item->name;$hascontent = '<br />';}
											if ($item->email){echo $hascontent . '邮箱：' . $item->email;$hascontent = '<br />';}
											if ($item->phone){echo $hascontent . '电话：' . $item->phone;$hascontent = '<br />';}
											if ($item->qq)   {echo $hascontent . 'QQ号：' . $item->qq;$hascontent = '<br />';}
										?></td>
										<?php $colspan++;?><td class=" "><?php echo $item->ip;?></td>
										<?php $colspan++;?><td class=" "><?php echo date('Y-m-d H:i', $item->datetime);?></td>
										<?php $colspan++;?><td class=" " align="right"><a data-id="<?php echo $item->id;?>" class="remove_items" id="remove_items_<?php echo $item->id;?>" href="javascript:void(0);">删除</a></td>
									</tr>
									<?php if($has_attachment){ ?>
										<tr id="attachment_<?php echo $seqs;?>" style="display:none;">
											<td class="details" colspan="<?php echo $colspan;?>">
												<table>
													<tbody>
														<tr>
															<td>附件</td>
															<td><img style="max-width:1280px;" src="<?php echo $item->attachments;?>" /></td>
														</tr>
													</tbody>
												</table>
											</td>
										</tr>
									<?php } ?>
									<?php $seqs++;?>
								<?php endforeach;?>
							</tbody>
						</table></div>
							<div class="row">
								<div class="col-md-5 col-sm-12">
									<div class="dataTables_info" id="sample_1_info">显示 <?php echo $start+1;?> 到 <?php echo $start+$perpage;?> 条。总数 <?php echo $total;?></div>
								</div>
								<div class="col-md-7 col-sm-12">
									<div class="dataTables_paginate paging_bootstrap">
										<ul class="pagination" style="visibility: visible;">
											<?php echo $paging_string;?>
										</ul>
									</div>
								</div>
							</div>
						</div>
						</div>
					</div>
					<!-- END EXAMPLE TABLE PORTLET-->
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="footer">
	<div class="footer-inner">
		2014 &copy; Cocos2d-x.org
	</div>
</div>
<!-- END FOOTER -->
<script src="/statics/jquery-1.8.3.min.js"></script>
<script src="/statics/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery('a.remove_items').click(function(){
		if(!confirm('确定要删除么？')){return false;}
		var id = jQuery(this).attr('data-id');
		jQuery.ajax({
			url: '<?php echo $base_url;?>manage/feedback/remove/',
			dataType: "json",
			cache: false,
			type: 'POST',
			data: {ids: id},
			success: function(data){
				jQuery('tr#fbitem_'+id).remove();
				jQuery('tr#attachment_'+id).remove();
			}
		});
	});
});
</script>
</body></html>
