@extends('layouts.app')

@section('user_content')

<h1 style="color:#000;text-align:center"> Final Registration for Convocation </h1>

<?php $final_key = Auth::user()->final_key ?>
@if($final_key==1)
<div class="row">
<div class="col-md-2"></div>
	<div class="col-md-8">
			<h4 class="text-color-black btn btn-info" >You have finally registered. You can update your record till 5/1/2020.</h4>
				<br/>	
			<h5 class="text-color-black btn btn-warning"	>You can download your Entry card later.</h5>
	</div>
	<div class="col-md-2 "></div>
</div>
		
@elseif($final_key == 0) 
<div style="padding:30px">
<span style="color:red"><small>* required fields [Please fill all the required fields carefully.]</small></span>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="final-register" method="post" enctype="multipart/form-data">
		@csrf

		<table class="table">
			<tr>
				<td scope="row" class="text-color-black">Student's name <span style="color:red">*</span></td>
				<td scope="row"><input type="text" name="name" required value="{{ old('name') }}"></td>
			</tr>

			<tr>
				<td scope="row" class="text-color-black">Father's name <span style="color:red">*</span></td>
				<td scope="row"><input type="text" name="father" required value="{{ old('father') }}"></td>
			</tr>

			<tr>
				<td scope="row" class="text-color-black">Mother's name <span style="color:red">*</span></td>
				<td scope="row"><input type="text" name="mother" required value="{{ old('mother') }}"></td>
			</tr>

			<tr>
				<td scope="row" class="text-color-black">Hall <span style="color:red">*</span></td>
				<td scope="row">
					<select name="hall"  >
							<option selected="true" disabled="disabled">Choose hall</option>
							<option  value="Kazi Nazrul Islam Hall">Kazi Nazrul Islam Hall</option>
								<option  value="Shahid Dhirendronath Dutta Hall">Shahid Dhirendronath Dutta Hall</option> 
								<option  value="Nawab Faizunnesa Chowdhurani Hall">Nawab Faizunnesa Chowdhurani Hall</option> 
							<option  value=">Bangabandhu Sheikh Mujibur Rahman Hall">Bangabandhu Sheikh Mujibur Rahman Hall</option>
						 
							
							
					</select>


				</td>
			</tr>

					<tr style="border:1px solid #826acf;background-color:#d4cae6">
						<td scope="row" class="text-color-black">Select Faculty <span style="color:red">*</span><span style="color:blue"><small>[You can select department after selecting faculty]</small></span></td>
						<td scope="row">
							
						<select name="faculty" id="faculty"  />
							<option selected="true" disabled="disabled">Choose Faculty</option> 
						  
							<option id="f_science" value="Science">Science</option>
							<option id="f_arts" value="Arts and Humanities">Arts and Humanities</option>
							<option id="f_social" value="Social Science">Social Science</option>
							<option id="f_buisness" value="Business Studies">Business Studies</option>
								<option id="f_engineering" value="Engineering">Engineering</option>
							<!-- <option id="f_law" value="Law">Law</option> -->
							
						</select>

						</td>

					</tr>


									<tr id="d_engineering" style="background-color:#826acf;">
										<td scope="row" class="text-color-black">Select Department <span style="color:red">*</span></td>
											<td scope="row">
											<select name="dept"  />
											<option selected="true" disabled="disabled">Choose Department</option>  
												<option value="CSE">Computer Science And Engineering</option>
												<option value="ICT">Information And Communication Technology</option>
									
											</select>
										</td>
									</tr>


									<tr id="d_arts" style="background-color:#826acf;">
										<td scope="row" class="text-color-black">Select Department <span style="color:red">*</span></td>
											<td scope="row">
											<select name="dept"  />
											<option selected="true" disabled="disabled">Choose Department</option>  
											
												<option value="English">English</option>
												<option value="Bangla">Bangla</option>
											</select>
										</td>
									</tr>



									<tr id="d_science" style="background-color:#826acf;">
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
										</td>
									</tr>

									<tr id="d_business" style="background-color:#826acf;">
										<td scope="row" class="text-color-black">Select Department <span style="color:red">*</span></td>
											<td scope="row">
											<select name="dept"  />
											<option selected="true" disabled="disabled">Choose Department <span style="color:red">*</span></option>  
												<option value="Management Studies">Management Studies</option>
												<option value="Accounting And Information System">Accounting And Information System</option>
												<option value="Marketing">Marketing</option>
												<option value="Finance And Banking">Finance And Banking</option>
											</select>
										</td>
									</tr>

									<tr id="d_social" style="background-color:#826acf;">
> 										<td scope="row" class="text-color-black">Select Department <span style="color:red">*</span></td>
											<td scope="row">
											<select name="dept"  />
											<option selected="true" disabled="disabled">Choose Department <span style="color:red">*</span></option>  
												<option value="Archeology">Archeology</option>
												<option value="Economics">Economics</option>
												<option value="Public Administration">Public Administration</option>
												<option value="Anthropology">Anthropology</option>
												<!-- <option value="Mass Communication And Journalism">Mass Communication And Journalism</option> -->
											</select>
										</td>
									</tr>
<!-- 
									<tr id="d_law" style="background-color:#826acf;">
										<td scope="row" class="text-color-black">Select Department<span style="color:red">*</span></td>
											<td scope="row">
											<select name="dept"  />
											<option selected="true" disabled="disabled">Choose Department <span style="color:red">*</span></option>  
												<option value="Law">Law</option>
												
											</select>
										</td>
									</tr> -->

			<tr style="border:1px solid #826acf;background-color:#94aeca;color:black">

				<td scope="row" class="text-color-black" >Obtained Degree for convocation <span style="color:red">*</span><br><span style="color:blue"><small>[Additional fields will appear after selecting degree]</small></span></td>
				<td scope="row"><input type="radio" name="degree" value="Bachelor's" id="bsc" required>Bachelor<br>
				<!-- <input type="radio" name="degree" value="Master's" id="msc">Master's<br> -->
				<input type="radio" name="degree" value="Bachelor's and Master's" id="both">Both [Bachelor and Master]<br>

				</td>
			</tr>


			<tr id="bscsession"  style="background-color:#826acf;">
				<td scope="row" class="text-color-black" >Session <span style="color:red">*</span></td>
				<td scope="row">
					<select name="sessionbsc" >
						<option selected="true" disabled="disabled">Select Session (Bachelor) <span style="color:red">*</span></option>
							<option  value="None">None</option>
							<option  value="2006-2007">2006-2007</option>
							<option  value="2007-2008">2007-2008</option>
							<option  value="2008-2009">2008-2009</option>
							<option  value="2009-2010">2009-2010</option>
							<option  value="2010-2011">2010-2011</option>
							<option  value="2011-2012">2011-2012</option>
							<option  value="2012-2013">2012-2013</option>
							<option  value="2013-2014">2013-2014</option>
					</select>
				</td>
			</tr>

			<tr id="bscregistration" style="background-color:#826acf;">
				<td scope="row" class="text-color-black" >Registration No (Bachelor)<span style="color:red">*</span></td>
				<td scope="row"><input type="text" name="registrationnobsc"  value="{{ old('registrationno') }}"></td>
			</tr>

			<tr id="bscroll" style="background-color:#826acf;">
				<td scope="row" class="text-color-black" >Roll No (Bachelor)<span style="color:red">*</span></td>
				<td scope="row"><input type="text" name="rollnobsc"  value="{{ old('rollno') }}"></td>
			</tr>


		

			<tr id="bscresult" style="background-color:#826acf;">
				<td scope="row" class="text-color-black">CGPA of Bachelor <span style="color:red">*</span></td>
				<td scope="row"><input type="text" name="resultbsc" value="{{ old('resultbsc') }}" ></td>
			</tr>

			<tr id="certificatebsc" style="background-color:#826acf;">
				<td>Have you collected your provisional certificate (Bachelor)? <span style="color:red">*</span></td>
			
				<td scope="row"><input type="radio" name="certificateb" value="2">Yes<br><input type="radio" name="certificateb" value="0">No<br>
				</td>
			</tr>

				<tr id="mscsession" style="background-color:#6c75d2">
				<td scope="row" class="text-color-black" >Session <span style="color:red">*</span></td>
				<td scope="row">
					<select name="sessionmsc" >
						<option selected="true" disabled="disabled">Select Session (Master) <span style="color:red">*</span></option>
							<option  value="None">None</option>
							<!--<option  value="2006-2007">2006-2007</option>-->
							<!--<option  value="2007-2008">2007-2008</option>-->
							<!--<option  value="2008-2009">2008-2009</option>-->
							<!--<option  value="2009-2010">2009-2010</option>-->
							<option  value="2010-2011">2010-2011</option>
							<option  value="2011-2012">2011-2012</option>
							<option  value="2012-2013">2012-2013</option>
							<option  value="2013-2014">2013-2014</option>
							<option  value="2013-2014">2014-2015</option>
							<option  value="2013-2014">2015-2016</option>
					</select>
				</td>
			</tr>

			<tr id="mscregistration" style="background-color:#6c75d2	">
				<td scope="row" class="text-color-black" >Registration No (Master)<span style="color:red">*</span></td>
				<td scope="row"><input type="text" name="registrationnomsc"  value="{{ old('registrationno') }}"></td>
			</tr>

			<tr id="mscroll" style="background-color:#6c75d2	">
				<td scope="row" class="text-color-black" >Roll No (Master)<span style="color:red">*</span></td>
				<td scope="row"><input type="text" name="rollnomsc"  value="{{ old('rollno') }}"></td>
			</tr>

			<tr id="mscresult" style="background-color:#6c75d2	">
				<td scope="row" class="text-color-black">CGPA of Master <span style="color:red">*</span></td>
				<td scope="row"><input type="text" name="resultmsc" value="{{ old('resultmsc') }}" ></td>
			</tr>

	

			

			<tr id="certificatemsc" style="background-color:#6c75d2	">
				<td>Have you collected your provisional certificate (Master)? <span style="color:red">*</span></td>
			
				<td scope="row"><input type="radio" name="certificatem" value="1">Yes<br><input type="radio" name="certificatem" value="0">No<br>
				</td>
			</tr>

			<tr>
				<td scope="row" class="text-color-black">Address(Mailing Address) <span style="color:red">*</span></td>
				<td scope="row"><input type="text" name="address" value="{{ old('address') }}"></td>
			</tr>

			<tr>
				<td scope="row" class="text-color-black">Current Affiliation(if any)</td>
				<td scope="row"><input type="text" name="job" value="{{ old('job') }}" ></td>
			</tr>

		
<!-- 

			<tr>
				<td scope="row" class="text-color-black">Contact Mobile <span style="color:red">*</span></td>
				<td scope="row"><input type="text" name="mobile" required value="{{ old('mobile') }}" ></td>
			</tr>

			<tr>
				<td scope="row" class="text-color-black">Contact Email</td>
				<td scope="row"><input type="email" name="contactemail" value="{{ old('contactemail') }}" ></td>
			</tr> -->

				



			<tr></tr>>
				<td scope="row" class="text-color-black">Insert image<small>(max size 413 x 531 pixels (300 dpi) and max memory 2MB)</small> <span style="color:red">*</span></td>
				<td scope="row"><input type="file" name="image" required></td>
				<td><a href="https://picresize.com/" target="_blank">Resize your image</a></td>
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