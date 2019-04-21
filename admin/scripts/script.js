
    // function myFunction() {
    //     const filter = document.querySelector('#myInput').value.toUpperCase();
    //     const trs = document.querySelectorAll('#myTable tr:not(.header)');
    //     trs.forEach(tr => tr.style.display = [...tr.children].find(td => td.innerHTML.toUpperCase().includes(filter)) ? '' : 'none');
    //   }

      $(function () {
        $('#popover').popover();
      });

      // to change the button to input file
      
      $(function () {
        $("#img1").click(function () {
            $("#my_file").click();
        });
        $("#my_file").change(function () {
            var file_name = this.value.replace(/\\/g, '/').replace(/.*\//, '')
            $('#spanImageName').html(file_name);
            $('filePath').val($(this).val());
        });
    });     

    if(document.getElementById('check').checked) {
      $(".hide").css("display", "unset");
  } else {
      $(".hide").hide();
  }

  $('#check').click(function() {
    $(".hide").toggle(this.checked);
});