<!DOCTYPE html>
<html>
<head>
	<title>bus manager list</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</head>
<body>	
		
    
	<form method="get" action="/system/busmanager/ajax/search">
		@csrf
			<div class="container box">
	     	<h3 align="center">bus manager list</h3><br />
			 <a href="/system/supportstaff/add">ADD<a>
			 <a href="/logout">Logout</a> 
		<div class="panel panel-default">
			<div class="panel-heading">Manager List</div>
			<div class="panel-body">
			<div class="form-group">
			<input type="text" name="search" id="search" class="form-control" placeholder="Search manager Data" />
			</div>
			<div class="table-responsive">
			<h3 align="center">Total Data : <span id="total_records"></span></h3>
			<table class="table table-striped table-bordered">
			<thead>
				<tr>
				
					<th>NAME</th>
					<th>EMAIL</th>
					<th>COMPANY</th>
					<th>REGISTERED</th>
					<th>ACTION</th>
				</tr>
			</thead>
			<tbody>
	
			</tbody>
			</table>
			</div>
			</div>    
		</div>
		</div>
  </form>
</body>
</html>
<script >
$(document).ready(function(){

 fetch_manager_data();

 function fetch_manager_data(query = '')
 {
  $.ajax({
   url:"{{ route('busmanager.search') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data.table_data);
    $('#total_records').text(data.total_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_manager_data(query);
 });
});
</script>

