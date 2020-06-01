
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<p>test</p>
</body>
</html>
<!-- <!DOCTYPE html>
<html>
<head>
	<title></title>
	<script
  src="https://code.jquery.com/jquery-2.1.4.js"
  integrity="sha256-siFczlgw4jULnUICcdm9gjQPZkw/YPDqhQ9+nAOScE4="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>

</head>
<body>

<button type="button" id="pdfDownloader">Download</button>
<div id="printDiv">
<div id="test">
<p>test-{{$data->username}}</p>

<img src="{{asset('student_images')}}/{{$data->image}}"  >	
</div>
  <h2>Hello World</h2>
  <p>
    this content will be printed.
  </p>
</div>
<script type="text/javascript">
$(document).ready(function() {

  //pdf 다운로드 	
  $("#pdfDownloader").click(function() {

    html2canvas(document.getElementById("printDiv"), {
      onrendered: function(canvas) {

        var imgData = canvas.toDataURL('image/png');
        console.log('Report Image URL: ' + imgData);
        var doc = new jsPDF('p', 'mm', [297, 210]); //210mm wide and 297mm high

        doc.addImage(imgData, 'PNG', 10, 10);
        doc.save('sample.pdf');
      }
    });

  });


})
</script> -->
</body>
</html>


<!-- <!-- <!-- <!-- <!-- <!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body {
  background: #ffdeaa;
  color: #3d3d3d;
  margin: 20px;
}

#imgCat {
  width: 25%;
}
	</style>
	<!-- <script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
	<script type="text/javascript" src="{{asset('pdfjs')}}/html2canvas.min.js"></script> -->
<!-- 	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
</head>
<body>

<div id="txtContent">
<p>test-{{$data->username}}</p>

<img src="{{asset('student_images')}}/{{$data->image}}"  >	
</div>

<h1>jsPDF Demo</h1>
<p>This is a sample of how to use  <a href="https://parall.ax/products/jspdf">jsPDF</a>.</p>
<p> Write some text and donwload a pdf file with your content</p>


<textarea id="txtContent" cols="60" rows="15"></textarea>
<br />
<button id="btnDownload"> Download PDF </button>

<script type="text/javascript">
	var content = document.getElementById('txtContent'),
button = document.getElementById('btnDownload');

function generatePDF(){
  var doc = new jsPDF();

  doc.setFontSize(14);
  doc.text(20, 20, content.value);
  //doc.text(35, 25, "Paranyan loves jsPDF");
  //doc.addImage(imgData, 'JPEG', 15, 40, 180, 160);
  doc.save('my.pdf');
}

button.addEventListener('click', generatePDF);
</script>
</body>
</html>
	 -->

<!-- 
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>
	<script type="text/javascript" src="{{asset('pdfjs')}}/html2canvas.min.js"></script>

<script type="text/javascript">
	
	function genPDF(){
			var p="";
console.log('got');
		html2canvas(document.getElementById("test"),{

			onrendered: function(canvas){
				var p="got test";	
				var img = canvas.toDataURL("image/png");
				var doc=new jsPDF();
				doc.addImage(img,'JPEG',20,20);
				doc.save('test.pdf');
			}

			});
		console.log(p);
	}

</script>

</head>
<body>
<div id="test">
<p>test-{{$data->username}}</p>

<img src="{{asset('student_images')}}/{{$data->image}}"  >	
</div>
<a href="javascript:genPDF()">Download</a>
</body>
	 --> --> --> --> --> -->