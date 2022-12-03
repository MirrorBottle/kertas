$(document).ready(function() {

  // *UTILITY
  $('.select2').select2();

  $('.datatable').DataTable();
  
  if($('.editor').length > 0) {
    var quill = new Quill('.editor', {
      theme: 'snow'
    });
  }
});