
	<form method="POST" action="import-buku.php" id="import_excel" name="import_excel" enctype="multipart/form-data">
		<div class="row">
			<div class="col-md-5">
				<div class="form-group">
					<label class="control-label">File Excel :</label>
					<input type="file" name="file_excel">
				</div>
				<button type="submit" name="btn_submit" class="btn btn-primary btn-sm" id="btn_submit">Import Excel</button>
				<a href="javascript:open()" class="btn btn-warning btn-sm">Lihat Format</a>
			</div>
		</div>
	</form>
		<script>
	</script>
	<!-- js untuk jquery -->
	<script src="js/jquery-1.11.2.min.js"></script>
	<!-- js untuk bootstrap -->
	<script src="js/bootstrap.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#import_excel').submit(function(evt){
            	evt.preventDefault();
            	var formData = new FormData(this);
            	$('#btn_submit').text('Importing...').addClass('disabled');
            	$.ajax({
                    type : 'POST',
                    url : $(this).attr('action'),
                    data : formData,
                    cache : false,
                    contentType : false,
                    processData : false,
                    success:function(response) {
                    	if(response.st==1) {
                    		//sukses
                    		alert(response.pesan);
                    		window.location.reload();
                    	}

                    	if(response.st==0) {
                    		//gagal
                    		alert(response.pesan);
                    		$('#btn_submit').text('Import Excel').removeClass('disabled');
                    	}	
	            	},dataType:'json'
	            });

            });
		});
	</script>