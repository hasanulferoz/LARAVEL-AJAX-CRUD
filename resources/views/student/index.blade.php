<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
</head>
<body>
	
	
	
	<div class="wrap-table">
		<a id="add_student_modal_btn" href="" class="btn btn-primary btn-sm">Add new Student</a>
		<div class="card  shadow">
			<div class="card-body">
				<h2>All Students</h2>
				<p class="msg"></p>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Username</th>
							<th>Gender</th>
							<th>Photo</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="all_student">
						

					</tbody>
				</table>
			</div>
		</div>
	</div>
	
	
{{-- student add modal --}}
{{-- <div id="add_student_modal" class="modal fade">
	<div clas="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Add new student</h4>
			</div>
			<div class="modal-body">
				<form action="">
					<div class="form-group">
						<label for="">Name</label>
						<input class="form-control" type="text" name="name">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input class="form-control" type="text" name="email">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input class="form-control" type="text" name="cell">
					</div>
					<div class="form-group">
						<label for=""></label>
						<input class="btn btn-primary" type="submit" value="Submit">
					</div>
				</form>
			</div>
			
		</div>
	</div>
</div> --}}

<div id="add_student_modal" class="modal fade" id="modal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title">Add new student</h4>
			
		</div>
		<div class="modal-body">
			<p class="msg"></p>
			<form id="add_student_form" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="form-group">
					<label for="">Name</label>
					<input class="form-control" type="text" name="name">
				</div>
				<div class="form-group">
					<label for="">Email</label>
					<input class="form-control" type="text" name="email">
				</div>
				<div class="form-group">
					<label for="">Cell</label>
					<input class="form-control" type="text" name="cell">
				</div>
				<div class="form-group">
					<label for="">Username</label>
					<input class="form-control" type="text" name="uname">
				</div>
				<div class="form-group">
					<label for="">Gender</label>
					<input class="" type="radio" value="male" id="male" name="gender"><label for="male">Male</label>
					<input class="" type="radio" value="female" id="female" name="gender"><label for="female">Female</label>
				</div>

				<div class="form-group">
					<label for="">Photo</label>
					<input class="form-control-file" type="file" name="photo">
				</div>
				<div class="form-group">
					<label for=""></label>
					<input class="btn btn-primary" type="submit" value="Add">
					
				</div>
			</form>
		</div>
		
	  </div>
	</div>
  </div>


  <div id="stu_edit" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
		  
		</div>
		<div class="modal-body">
			<button class="close" data-dismiss="modal">&times;</button>
			<div class="student-single-data">
				<img src="" alt="">
				<h2>Hasan</h2>
				<h3>01726971756</h3>
				<table class="table table-striped">
					<tr>
						<td>Name</td>
						<td id="name">Name</td>
					</tr>
					<tr>
						<td>Email</td>
						<td id="email">Email</td>
					</tr>
					<tr>
						<td>Cell</td>
						<td id="cell">Cell</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="modal-footer">
		 
		</div>
	  </div>
	</div>
  </div>

	<!-- JS FILES  -->
	<script src={{asset("assets/js/jquery-3.4.1.min.js")}}></script>
	<script src={{asset("assets/js/popper.min.js")}}></script>
	<script src={{asset("assets/js/bootstrap.min.js")}}></script>
	<script src={{asset("assets/js/functions.js")}}></script>
	<script src={{asset("assets/js/custom.js")}}></script>
</body>
</html>