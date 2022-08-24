  <!-- JAVASCRIPT -->
  <script src="assets/libs/jquery/jquery.min.js"></script>
  <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/libs/metismenu/metisMenu.min.js"></script>
  <script src="assets/libs/simplebar/simplebar.min.js"></script>
  <script src="assets/libs/node-waves/waves.min.js"></script>
  <script src="assets/libs/waypoints/lib/jquery.waypoints.min.js"></script>
  <script src="assets/libs/jquery.counterup/jquery.counterup.min.js"></script>

  <!-- ckeditor -->
  <script src="assets/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>

  <!--tinymce js-->
  <script src="assets/libs/tinymce/tinymce.min.js"></script>

  <!-- init js -->
  <script src="assets/js/pages/form-editor.init.js"></script>

  <!-- App js -->
  <script src="assets/js/app.js"></script>
  <!-- Required datatable js -->
  <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
  <!-- Buttons examples -->
  <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
  <script src="assets/libs/jszip/jszip.min.js"></script>
  <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
  <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
  <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

  <!-- Responsive examples -->
  <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

  <!-- Datatable init js -->
  <script src="assets/js/pages/datatables.init.js"></script>
  <!-- parsleyjs -->
  <script src="assets/libs/parsleyjs/parsley.min.js"></script>
  <script src="./assets/js/pages/chosen.jquery.js"></script>
  <!--------Date picker--------->
  <script src="assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>


  <script src="assets/js/pages/form-validation.init.js"></script>
  <!-- Table Editable plugin -->
  <script src="assets/libs/table-edits/build/table-edits.min.js"></script>
  <script src="assets/js/pages/table-editable.int.js"></script>
  <!-------POPPER--------->
  <script src="assets/js/popper.min.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script> -->
  <!---------AJAX--------->
  <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script>
      $(document).ready(function() {
          setTimeout(function() {
              $('#load2aab').load("test3.php").fadeIn("slow");
          }, 700);
          setInterval(function() {
              $('#load2aab').load("test3.php").fadeIn("slow");
          }, 1000);


      });
  </script>
  <script>
      $(document).ready(function() {
          setTimeout(function() {
              $('#loadnewnumber').load("test4.php").fadeIn("slow");
          }, 800);
          setInterval(function() {
              $('#loadnewnumber').load("test4.php").fadeIn("slow");
          }, 1000);


      });
  </script>
  <script>
      $("#filter").keyup(function() {

          // Retrieve the input field text and reset the count to zero
          var filter = $(this).val(),
              count = 0;

          // Loop through the comment list
          $('#results div').each(function() {


              // If the list item does not contain the text phrase fade it out
              if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                  $(this).hide(); // MY CHANGE

                  // Show the list item if the phrase matches and increase the count by 1
              } else {
                  $(this).show(); // MY CHANGE
                  count++;
              }

          });

      });
      //-----------------------------for multi insert invoice
      $(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
	var actions = $("table td:last-child").html();
	// Append table with add row form on add new button click
    $(".add-new").click(function(){
		$(this).attr("disabled", "disabled");
		var index = $("table tbody tr:last-child").index();
        var row = '<tr>' +
            '<td><input type="text" class="form-control" name="name" id="name"></td>' +
            '<td><input type="text" class="form-control" name="department" id="department"></td>' +
            '<td><input type="text" class="form-control" name="phone" id="phone"></td>' +'<td><input type="text" class="form-control" name="phone" id="phone"></td>' +'<td><input type="text" class="form-control" name="phone" id="phone"></td>' +
			'<td>' + actions + '</td>' +
        '</tr>';
    	$("table").append(row);		
		$("table tbody tr").eq(index + 1).find(".add, .edit").toggle();
        $('[data-toggle="tooltip"]').tooltip();
    });
	// Add row on add button click
	$(document).on("click", ".add", function(){
		var empty = false;
		var input = $(this).parents("tr").find('input[type="text"]');
        input.each(function(){
			if(!$(this).val()){
				$(this).addClass("error");
				empty = true;
			} else{
                $(this).removeClass("error");
            }
		});
		$(this).parents("tr").find(".error").first().focus();
		if(!empty){
			input.each(function(){
				$(this).parent("td").html($(this).val());
			});			
			$(this).parents("tr").find(".add, .edit").toggle();
			$(".add-new").removeAttr("disabled");
		}		
    });
	// Edit row on edit button click
	$(document).on("click", ".edit", function(){		
        $(this).parents("tr").find("td:not(:last-child)").each(function(){
			$(this).html('<input type="text" class="form-control" value="' + $(this).text() + '">');
		});		
		$(this).parents("tr").find(".add, .edit").toggle();
		$(".add-new").attr("disabled", "disabled");
    });
	// Delete row on delete button click
	$(document).on("click", ".delete", function(){
        $(this).parents("tr").remove();
		$(".add-new").removeAttr("disabled");
    });
});
  </script>
  <!-- jQuery UI -->