@extends('layouts.app')

@section('user_content')

<h1 style="color:#000;text-align:center">Edit Register</h1>

<?php $final_key = Auth::user()->final_key ?>
@if($final_key==1)

<div style="padding:30px">
<span><small>* required fields</small></span>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="edit-register" method="post" enctype="multipart/form-data">
		@csrf

		<table class="table">
			<tr>
				<td scope="row" class="text-color-black">First name *</td>
				<td scope="row"><input type="text" name="name" required value="{{ $data->username }}"></td>
			</tr>

			<tr>
				<td scope="row" class="text-color-black">Father's name *</td>
				<td scope="row"><input type="text" name="father" required value="{{ $data->father }}"></td>
			</tr>

			<tr>
				<td scope="row" class="text-color-black">Mother's name *</td>
				<td scope="row"><input type="text" name="mother" required value="{{ $data->mother }}"></td>
			</tr>

			<tr>
				<td scope="row" class="text-color-black">Hall *</td>
				<td scope="row">
					<select name="hall" required >
							<option selected="true" disabled="disabled">Choose hall</option>
								<option  value="Kazi Nazrul Islam Hall" <?php if($data->hall=="Kazi Nazrul Islam Hall") echo "selected"?>>Kazi Nazrul Islam Hall</option>
											<option  value="Shahid Dhirendronath Dutta Hall" <?php if($data->hall=="Shahid Dhirendronath Dutta Hall" ) echo "selected"?>>Shahid Dhirendronath Dutta Hall</option>	
							<option  value="Nawab Faizunnesa Chowdhurani Hall" <?php if($data->hall=="Nawab Faizunnesa Chowdhurani Hall") echo "selected"?>>Nawab Faizunnesa Chowdhurani Hall</option>   
							<option  value="Bangabandhu Sheikh Mujibur Rahman Hall" <?php if($data->hall=="Bangabandhu Sheikh Mujibur Rahman Hall") echo "selected"?>> Bangabandhu Sheikh Mujibur Rahman Hall</option>
				
						
					</select>


				</td>
			</tr>

					<tr style="border:1px solid #c2b7e6;background-color:#d4cae6">
						<td scope="row" class="text-color-black">Select Faculty<span style="color:red">*</span><br><span style="color:blue"><small>[You can select department after selecting faculty]</small></span></td>
						<td scope="row">
							
						<select name="faculty" id="faculty"  />
							<option selected="true" disabled="disabled" >Choose Faculty</option> 
							 
							<option id="f_science" value="Science" >Science</option>
							<option id="f_arts" value="Arts and Humanities" >Arts and Humanities</option>
							<option id="f_social" value="Social Science" >Social Science</option>
							<option id="f_buisness" value="Business Studies" >Business Studies</option>
							<option id="f_engineering" value="Engineering"  >Engineering</option> 
						<!-- 	<option id="f_law" value="Law" >Law</option> -->
							
						</select>
						<p>{{$data->faculty}} faculty was inserted </p>

						</td>

					</tr>


									<tr id="d_engineering" style="background-color:#c2b7e6;">
										<td scope="row" class="text-color-black">Select Department <span style="color:red">*</span></td>
											<td scope="row">
											<select name="dept"  />
											<option selected="true" disabled="disabled">Choose Department</option>  
												<option value="CSE">Computer Science And Engineering</option>
												<option value="ICT">Information And Communication Technology</option>
									
											</select>
												<p>{{$data->dept}} department was inserted </p>
										</td>
									</tr>


									<tr id="d_arts" style="background-color:#c2b7e6;">
										<td scope="row" class="text-color-black">Select Department <span style="color:red">*</span></td>
											<td scope="row">
											<select name="dept"  />
											<option selected="true" disabled="disabled">Choose Department</option>  
											
												<option value="English">English</option>
												<option value="Bangla">Bangla</option>
											</select>
											<p>{{$data->dept}} department was inserted </p>
										</td>
									</tr>



									<tr id="d_science" style="background-color:#c2b7e6;">
										<td scope="row" class="text-color-black">Select Department <span style="color:red">*</span></td>
											<td scope="row">
											<select name="dept"  />
											<option selected="true" disabled="disabled">Choose Department <span style="color:red">*</span></option>  
												<option value="Mathematics">Mathematics</option>
												<option value="Chemistry">Chemistry</option>
												<option value="Physics">Physics</option>
												<option value="Statistics">Statistics</option>
												<option value="Pharmacy">Pharmacy</option>
											</select>
											<p>{{$data->dept}} department was inserted </p>
										</td>
									</tr>

									<tr id="d_business" style="background-color:#c2b7e6;">
										<td scope="row" class="text-color-black">Select Department <span style="color:red">*</span></td>
											<td scope="row">
											<select name="dept"  />
											<option selected="true" disabled="disabled">Choose Department <span style="color:red">*</span></option>  
												<option value="Management Studies">Management Studies</option>
												<option value="Accounting And Information System">Accounting And Information System</option>
												<option value="Marketing">Marketing</option>
												<option value="Finance And Banking">Finance And Banking</option>
											</select>
											<p>{{$data->dept}} department was inserted </p>
										</td>
									</tr>

									<tr id="d_social" style="background-color:#c2b7e6;">
> 										<td scope="row" class="text-color-black">Select Department <span style="color:red">*</span></td>
											<td scope="row">
											<select name="dept"  />
											<option selected="true" disabled="disabled">Choose Department <span style="color:red">*</span></option>  
												<option value="Archeology">Archeology</option>
												<option value="Economics">Economics</option>
												<option value="Public Administration">Public Administration</option>
												<option value="Anthropology">Anthropology</option>
									<!-- 			<option value="Mass Communication And Journalism">Mass Communication And Journalism</option> -->
											</select>
											<p>{{$data->dept}} department was inserted </p>
										</td>
									</tr>

									<tr id="d_law" style="background-color:#c2b7e6;">
										<td scope="row" class="text-color-black">Select Department<span style="color:red">*</span></td>
											<td scope="row">
											<select name="dept"  />
											<option selected="true" disabled="disabled">Choose Department <span style="color:red">*</span></option>  
												<option value="Law">Law</option>
												
											</select>
											<p>{{$data->dept}} department was inserted </p>
										</td>
									</tr>

			<tr style="border:1px solid #c2b7e6;background-color:#94aeca">

				<td scope="row" class="text-color-black" >Obtained Degree for convocation <span style="color:red">*</span><br><span style="color:blue"><small>[Additional fields will appear after selecting degree]</small></span></td>
				<td scope="row"><input type="radio" name="degree" value="Bachelor's" id="bsc" >Bachelor<br>
				<!-- <input type="radio" name="degree" value="Master's" id="msc">Master's<br> -->
				<input type="radio" name="degree" value="Bachelor's and Master's" id="both">Both [Bachelor and Master]<br>
				<p style="color:#ad00f5c9;border:1px solid #ad00f5c9;"><b>{{$data->degree}} was inserted</b></p>
				</td>
			</tr>


			<tr id="bscsession"  style="background-color:#c2b7e6;">
				<td scope="row" class="text-color-black" >Session <span style="color:red">*</span></td>
				<td scope="row">
					<select name="sessionbsc" >
						<option selected="true" disabled="disabled">Select Session (Bachelor) <span style="color:red">*</span></option>
						<option  value="None" <?php if($data->sessionbsc=="None") echo "selected"?>>None</option>
							<option  value="2006-2007" <?php if($data->sessionbsc=="2006-2007") echo "selected"?>>2006-2007</option>
							<option  value="2007-2008" <?php if($data->sessionbsc=="2007-2008") echo "selected"?>>2007-2008</option>
							<option  value="2008-2009" <?php if($data->sessionbsc=="2008-2009") echo "selected"?>>2008-2009</option>
							<option  value="2009-2010" <?php if($data->sessionbsc=="2009-2010") echo "selected"?>>2009-2010</option>
							<option  value="2010-2011" <?php if($data->sessionbsc=="2010-2011") echo "selected"?>>2010-2011</option>
							<option  value="2011-2012" <?php if($data->sessionbsc=="2011-2012") echo "selected"?>>2011-2012</option>
							<option  value="2012-2013" <?php if($data->sessionbsc=="2012-2013") echo "selected"?>>2012-2013</option>
							<option  value="2013-2014" <?php if($data->sessionbsc=="2013-2014") echo "selected"?>>2013-2014</option>
					</select>
				</td>
			</tr>

			<tr id="bscregistration" style="background-color:#c2b7e6;">
				<td scope="row" class="text-color-black" >Registration No (Bachelor)<span style="color:red">*</span></td>
				<td scope="row"><input type="text" name="registrationnobsc"  value="{{ $data->registrationnobsc }}"></td>
			</tr>

			<tr id="bscroll" style="background-color:#c2b7e6;">
				<td scope="row" class="text-color-black" >Roll No (Bachelor)<span style="color:red">*</span></td>
				<td scope="row"><input type="text" name="rollnobsc"  value="{{ $data->rollnobsc }}"></td>
			</tr>


		

			<tr id="bscresult" style="background-color:#c2b7e6;">
				<td scope="row" class="text-color-black">CGPA of Bachelor <span style="color:red">*</span></td>
				<td scope="row"><input type="text" name="resultbsc" value="{{ $data->resultbsc }}" ></td>
			</tr>

			<tr id="certificatebsc" style="background-color:#c2b7e6;">
				<td>Have you collected your provisional certificate (Bachelor)? <span style="color:red">*</span></td>
			
				<td scope="row"><input type="radio" name="certificateb" value="2" <?php if($data->certificateb=="2") echo "checked"?>>Yes<br><input type="radio" name="certificateb" value="0" <?php if($data->certificateb=="0") echo "checked"?>>No<br>
				</td>
			</tr>

				<tr id="mscsession" style="background-color:#6c75d2">
				<td scope="row" class="text-color-black" >Session <span style="color:red">*</span></td>
				<td scope="row">
					<select name="sessionmsc" >
						<option selected="true" disabled="disabled">Select Session (Master) <span style="color:red">*</span></option>
							<option  value="None" <?php if($data->sessionbsc=="None") echo "selected"?>>None</option>
						
							<option  value="2010-2011" <?php if($data->sessionmsc=="2010-2011") echo "selected"?>>2010-2011</option>
							<option  value="2011-2012" <?php if($data->sessionmsc=="2011-2012") echo "selected"?>>2011-2012</option>
							<option  value="2012-2013" <?php if($data->sessionmsc=="2012-2013") echo "selected"?>>2012-2013</option>
							<option  value="2013-2014" <?php if($data->sessionmsc=="2013-2014") echo "selected"?>>2013-2014</option>
							<option  value="2013-2014" <?php if($data->sessionmsc=="2014-2015") echo "selected"?>>2014-2015</option>
							<option  value="2013-2014" <?php if($data->sessionmsc=="2015-2016") echo "selected"?>>2015-2016</option>
					</select>
				</td>
			</tr>

			<tr id="mscregistration" style="background-color:#6c75d2	">
				<td scope="row" class="text-color-black" >Registration No (Master)<span style="color:red">*</span></td>
				<td scope="row"><input type="text" name="registrationnomsc"  value="{{ $data->registrationnomsc }}"></td>
			</tr>

			<tr id="mscroll" style="background-color:#6c75d2	">
				<td scope="row" class="text-color-black" >Roll No (Master)<span style="color:red">*</span></td>
				<td scope="row"><input type="text" name="rollnomsc"  value="{{$data->rollnomsc }}"></td>
			</tr>

			<tr id="mscresult" style="background-color:#6c75d2	">
				<td scope="row" class="text-color-black">CGPA of Master <span style="color:red">*</span></td>
				<td scope="row"><input type="text" name="resultmsc" value="{{ $data->resultmsc }}" ></td>
			</tr>

	

			

			<tr id="certificatemsc" style="background-color:#6c75d2	">
				<td>Have you collected your provisional certificate (Master)? <span style="color:red">*</span></td>
			
				<td scope="row"><input type="radio" name="certificatem" value="1" <?php if($data->certificatem=="1") echo "checked"?>>Yes<br><input type="radio" name="certificatem" value="0" <?php if($data->certificatem=="0") echo "checked"?>>No<br>
				</td>
			</tr>





			<tr>
				<td scope="row" class="text-color-black">Address(Mailing Address) *</td>
				<td scope="row"><input type="text" name="address" value="{{ $data->address }}"></td>
			</tr>

			<tr>
				<td scope="row" class="text-color-black">Current Affiliation(if any)</td>
				<td scope="row"><input type="text" name="job" value="{{ $data->job }}"></td>
			</tr>

		

<!-- 
			<tr>
				<td scope="row" class="text-color-black">Contact Mobile *</td>
				<td scope="row"><input type="text" name="mobile" required value="{{ $data->mobile }}" ></td>
			</tr>

			<tr>
				<td scope="row" class="text-color-black">Contact Email</td>
				<td scope="row"><input type="email" name="contactemail" value="{{ $data->contactemail }}" ></td>
			</tr> -->

				



			<tr>
				<td  class="text-color-black">Insert New image<small>(max size 600x600 pixels and max memory 2MB)</small> *</td>
				<td ><input type="file" name="image"></td>
				<td ><img src="{{asset('student_images')}}/{{$data->image}}" height="80px" width="50px"></td>
				<td ><a href="https://picresize.com/" target="_blank">Resize your image</a></td>
			</tr>				

			<tr>
				<td scope="row"></td>
				<td scope="row"><input type="submit" name="submit" class="btn btn-success"></td>
			</tr>

		</table>

</form>

</div>

@endif



@endsection