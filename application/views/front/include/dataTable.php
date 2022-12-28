<script>
	//fetch sub retailor in datatable with ajax
	var csrf=$(document).CsrfAjaxGet();

	oTable=$('#customerDetTable').dataTable({
		// "aaSorting": [[1, "desc"], [2, "desc"]],
		"aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
		"iDisplayLength": 10,
		'bProcessing': true, 'ServerSide': true,
		'sAjaxSource': '<?=base_url('admin/Customer/getCusData/')?>',
		'fnServerData': function (sSource, aoData, fnCallback) {
			aoData.push( { "name": "<?= $this->security->get_csrf_token_name(); ?>", "value": "<?=$this->security->get_csrf_hash()?>"});
			$.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
		},
		"aoColumns": [{"mRender": function (data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
					}  },null,null, null,null,null,null, {"bSortable": false}],
		'fnRowCallback': function (nRow, aData, iDisplayIndex) {
			var oSettings = oTable.fnSettings();
			nRow.id = aData[0];
			nRow.className = "";
			return nRow;
		}
	});

	oTable1=$('#customerRefTable').dataTable({
		"aaSorting": [[1, "desc"], [2, "desc"]],
		"aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
		"iDisplayLength": 10,
		'bProcessing': true, 'ServerSide': true,
		'sAjaxSource': '<?=base_url('admin/Customer_referral/getCusRefData/')?>',
		'fnServerData': function (sSource, aoData, fnCallback) {
			aoData.push( { "name": "<?= $this->security->get_csrf_token_name(); ?>", "value": "<?=$this->security->get_csrf_hash()?>"});
			$.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
		},
		"aoColumns": [{"mRender": function (data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
					}  }, null, null,null,null, {"bSortable": false}],
		'fnRowCallback': function (nRow, aData, iDisplayIndex) {
			var oSettings = oTable1.fnSettings();
			nRow.id = aData[0];
			nRow.className = "";
			return nRow;
		}
	});

	oTable2=$('#compUserTable').dataTable({
		"aaSorting": [[1, "desc"], [2, "desc"]],
		"aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
		"iDisplayLength": 10,
		'bProcessing': true, 'ServerSide': true,
		'sAjaxSource': '<?=base_url('admin/Company/getCompUserData/')?>',
		'fnServerData': function (sSource, aoData, fnCallback) {
			aoData.push( { "name": "<?= $this->security->get_csrf_token_name(); ?>", "value": "<?=$this->security->get_csrf_hash()?>"});
			$.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
		},
		"aoColumns": [{"mRender": function (data, type, row, meta) {
					return meta.row + meta.settings._iDisplayStart + 1;
					}  }, null, null,null,null,null,{"bSortable": false}],
		'fnRowCallback': function (nRow, aData, iDisplayIndex) {
			var oSettings = oTable2.fnSettings();
			nRow.id = aData[0];
			nRow.className = "";
			return nRow;
		}
	});

	oTable3=$('#compTable').dataTable({
		//"aaSorting": [[1, "desc"], [2, "desc"]],
		"aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
		"iDisplayLength": 10,
		'bProcessing': true, 
		'ServerSide': true,
		
		'sAjaxSource': '<?=base_url('admin/Company/getCompData/')?>',
		'fnServerData': function (sSource, aoData, fnCallback) {
			aoData.push( { "name": "<?= $this->security->get_csrf_token_name(); ?>", "value": "<?=$this->security->get_csrf_hash()?>"});
			$.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
		},
		"aoColumns": [
						{"mRender": function (data, type, row, meta) {
							return meta.row + meta.settings._iDisplayStart + 1;}  
						},
						{
						"mData": "IMAGE", "aTargets": [0],
							"render": function (data, type, row, meta) {
								// alert(data);
								return '<img src="../upload/company_logo/'+row[1]+'" height="20" weight="20"  alt="logo" class="avatar-xl rounded-circle" />';
							}
						},
						{
						"mData": "link", "aTargets": [0],
							"render": function (data, type, row, meta) {
								// alert(data);
								return '<a href="Company/company_detail/'+row[0]+'" />'+row[2]+'</a>';
							}
						},{"width": "10%"},null,null,{"bSortable": false}],
		'fnRowCallback': function (nRow, aData, iDisplayIndex) {
			var oSettings = oTable3.fnSettings();
			nRow.id = aData[0];
			nRow.className = "";
			return nRow;
		}
	});

	oTable4=$('#pending-quotationTable').dataTable({
		//"aaSorting": [[1, "desc"], [2, "desc"]],
		"aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
		"iDisplayLength": 10,
		// "scrollX": true,
		'bProcessing': true, 
		'ServerSide': true,
		'sAjaxSource': '<?=base_url('admin/Quotation/getQuotData/pending')?>',
		'fnServerData': function (sSource, aoData, fnCallback) {
			aoData.push( { "name": "<?= $this->security->get_csrf_token_name(); ?>", "value": "<?=$this->security->get_csrf_hash()?>"});
			$.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
		},
		"aoColumns": [
						{"mRender": function (data, type, row, meta) {
							return meta.row + meta.settings._iDisplayStart + 1;}  
						},null,null,null,null,null,null,null,{"bSortable": false}],
		'fnRowCallback': function (nRow, aData, iDisplayIndex) {
			var oSettings = oTable4.fnSettings();
			nRow.id = aData[0];
			nRow.className = "";
			return nRow;
		}
	});

	oTable5=$('#cancel-quotationTable').dataTable({
		//"aaSorting": [[1, "desc"], [2, "desc"]],
		"aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
		"iDisplayLength": 10,
		// "scrollX": true,
		'bProcessing': true, 
		'ServerSide': true,
		'sAjaxSource': '<?=base_url('admin/Quotation/getQuotData/cancel')?>',
		'fnServerData': function (sSource, aoData, fnCallback) {
			aoData.push( { "name": "<?= $this->security->get_csrf_token_name(); ?>", "value": "<?=$this->security->get_csrf_hash()?>"});
			$.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
		},
		"aoColumns": [
						{"mRender": function (data, type, row, meta) {
							return meta.row + meta.settings._iDisplayStart + 1;}  
						},null,null,null,null,null,null,null,{"bSortable": false}],
		'fnRowCallback': function (nRow, aData, iDisplayIndex) {
			var oSettings = oTable5.fnSettings();
			nRow.id = aData[0];
			nRow.className = "";
			return nRow;
		}
	});

	oTable6=$('#confirm-quotationTable').dataTable({
		//"aaSorting": [[1, "desc"], [2, "desc"]],
		"aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
		"iDisplayLength": 10,
		// "scrollX": true,
		'bProcessing': true, 
		'ServerSide': true,
		'sAjaxSource': '<?=base_url('admin/Quotation/getQuotData/confirm')?>',
		'fnServerData': function (sSource, aoData, fnCallback) {
			aoData.push( { "name": "<?= $this->security->get_csrf_token_name(); ?>", "value": "<?=$this->security->get_csrf_hash()?>"});
			$.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
		},
		"aoColumns": [
						{"mRender": function (data, type, row, meta) {
							return meta.row + meta.settings._iDisplayStart + 1;}  
						},null,null,null,null,null,null,null,{"bSortable": false}],
		'fnRowCallback': function (nRow, aData, iDisplayIndex) {
			var oSettings = oTable6.fnSettings();
			nRow.id = aData[0];
			nRow.className = "";
			return nRow;
		}
	});

	oTable7=$('#user-Table').dataTable({
		//"aaSorting": [[1, "desc"], [2, "desc"]],
		"aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
		"iDisplayLength": 10,
		// "scrollX": true,
		'bProcessing': true, 
		'ServerSide': true,
		'sAjaxSource': '<?=base_url('admin/User/getUserData')?>',
		'fnServerData': function (sSource, aoData, fnCallback) {
			aoData.push( { "name": "<?= $this->security->get_csrf_token_name(); ?>", "value": "<?=$this->security->get_csrf_hash()?>"});
			$.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
		},
		"aoColumns": [
						{"mRender": function (data, type, row, meta) {
							return meta.row + meta.settings._iDisplayStart + 1;}  
						},null,null,null,{"mRender":MaskCharacter},{"bSortable": false}],
		'fnRowCallback': function (nRow, aData, iDisplayIndex) {
			var oSettings = oTable7.fnSettings();
			nRow.id = aData[0];
			nRow.className = "";
			return nRow;
		}
	});
</script>
