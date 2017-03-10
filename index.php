
<html>
	<head>
		<title>PRofile</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<style>
			body
			{
				margin:0;
				padding:0;
				background-color:#f1f1f1;
			}
			.box
			{
				width:1270px;
				padding:20px;
				background-color:#fff;
				border:1px solid #ccc;
				border-radius:5px;
				margin-top:5px;
			}
			
		</style>
	</head>
	<body>
		<div class="container box">
			<h5 align="center">TABLE</h5>
			<br />
			<div class="table-responsive">
				
				<table id="result" class="table table-bordered table-striped">
					
				</table>
				
			</div>
		</div>
		</body>
</html>

<div class="modal fade " id="insert-data" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
    <div class="well">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <th colspan="5"><a href="index.php"><h2><strong>Insert </strong></h2></a></th><br>
            </div>
				<div class="modal-body">
					<label>Enter NAME</label>
					<input type="text" name="name" id="name" class="form-control" />
					<br />
					<label>Enter Mobile</label>
					<input type="text" name="mobile" id="mobile" class="form-control" />
					<br />
					<label>Enter Email</label>
					<input type="text" name="email" id="email" class="form-control" />
					
					
				</div>
				<div class="modal-footer">
					<input type="hidden" name="user_id" id="user_id" />
					<input type="hidden" name="operation" id="operation" />
					<div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <a class="btn btn-info btn-ok" id="submit" data-dismiss="modal" >save</a>
				</div>
			</div>
		</form>
	</div>
</div>
</div>
</div>


 <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <font color="#ff000"> <h2>!Warning</h2></font>
            </div>

            <div class="modal-body">
                <h3><font face="Arial" color="#008CBA">Do You Really Want To Delete </font></h3>
            </div>
            <div class="modal-footer">
                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                   <button type="button" class="btn btn-danger btn-ok">delete</button>
              
            </div>
        </div>
    </div>
</div>
 


<div class="modal fade" id="confirm-edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
    <div class="well">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <th colspan="5"><h2><strong>update</strong></h2></a></th><br>
            </div>
			<div class="modal-body">
				 <div class="form-group">
				 	<label for="name">Your Name</label>
     <input type="text" class="form-control" name="name1" id="name1"    />
      </div>
    <div class="form-group">
	<label for="email1">Your Email</label>
     <input type="text" class="form-control" name="email1" id="email1"   />
      </div>

      <div class="form-group">
      	<label for="mobile1">Your Email</label>
      <input type="text" class="form-control" name="mobile1" id="mobile1"    />
      </div>
	   </div>
				<div class="modal-footer">
			
					<div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
               <a class="btn btn-info" id="btn-ys"  data-dismiss="modal" >Update</a>
			   
				</div>
			</div>
		
	</div>
</div>
</div>
</div>

<script type="text/javascript">
     
   $(document).ready(function(){

      viewData();

        function viewData(){
          $.ajax({
            type:"GET",
            url:"result.php",
            success: function (data)
            {
              $('#result').html(data);
              $('#result').DataTable();
            }
          });
        }
		
		/**---------EDIT A ROW ----------------*/
  $(document).on('click','#edit', function(e) {
    
        $("#btn-ys").attr('edit_id', $(this).attr('edit_id'));
        
        $("#name1").val($(this).attr('name'));
        $("#mobile1").val($(this).attr('mobile'));
        $("#email1").val($(this).attr('email'));
        
        //$("#confirm-edit").modal({show:'true'});
        
    });
      
       $("#btn-ys").click( function ()
        {
          
           var edit_id = $("#btn-ys").attr('edit_id'); 
           
           //console.log('edit id', edit_id);
           
           var name1= $('#name1').val();     
           var email = $('#email1').val();     
           var mobile = $('#mobile1').val();
        
           var result={"edtId":edit_id,"name":name1,"email":email,"mobile":mobile};
          
         $.ajax(
         {
           data:result,
           type: "POST",
           url: "edit.php",
           success: function(data)
           {
            $("#confirm-edit").modal('hide');
            viewData();
            
           }
        });
       });
 
		
		  /**-----------------DELETE A ROW------------------- */
      $(document).on('click','.delete', function(e) 
      {
         $(".btn-ok").attr('id', $(this).attr('delete_id'));
         $("#confirm-delete").modal({show:'true'});
      });
         $(".btn-ok").click( function () 
        {
           var delete_id = $(".btn-ok").attr('id');
         $.ajax(
          {
           data: {delete_id:delete_id},
           type: "POST",
           url: "delete.php",
           success: function(result)
        
           {
            $("#confirm-delete").modal('hide');
            viewData();
           
           }
          });
         
        }); 
    /**-------------INSERT A ROW ----------------*/
    $(document).on('click','.insert', function(e) 
    {
      $("#insert-data").modal({show:'true'});
    });
      
    
    $("#submit").click(function()
    {
      var name = $('#name').val();     
      var mobile = $('#mobile').val();     
      var email = $('#email').val();
      
      var data={"name":name,"mobile":mobile,"email":email};
     $.ajax(
      {
         data: data,
         type: "post",
         url: "add.php",
          success: function(data)
      {
        $('#name').val('');
        $('#mobile').val('');
        $('#email').val('');
        $("#insert-data").modal('hide');
        viewData();
         
      }
    }); 
    });
    
   
  }); 
  
  

 
</script>
</body>
</html>
