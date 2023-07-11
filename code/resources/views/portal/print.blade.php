<!DOCTYPE html>
<html>
<head>
	<title>Print</title>
<style type="text/css">
	.print_container {
	    width: 50%;
	    margin: auto;
	}
	.exam_title {
	    text-align: center;
	}
	.info_block {
	    width: 50%;
	    float: left;
	    height: 50px;
	    line-height: 50px;
	    text-align: center;
	}
	.user_info_block {
	    margin-top: 74px;
	}
	.print_btn{
		text-align: center;
	}
</style>
</head>
<body>
<div class="print_container">
	<div class="exam_title">
		<h3><?php echo $exam_title ?></h3>
		<p>Exam Date : {{ date('d m,Y',strtotime($exam_date)) }}</p>
	</div>
	<div class="user_info_block">
		<div class="info_block">
			<label>Name : {{ $std_info->name }}</label>
		</div>
		<div class="info_block">
			<label>E-Mail : {{ $std_info->email }}</label>
		</div>
		<div class="info_block">
			<label>Mobile No : {{ $std_info->mobile_no }}</label>
		</div>
		<div class="info_block">
			<label>DOB : {{ date('d M,Y',strtotime($std_info->dob)) }}</label>
		</div>
	</div>
	<div class="print_btn"><br>
		<button onclick="window.print()">Print</button>
	</div>
</div>
</body>
</html>