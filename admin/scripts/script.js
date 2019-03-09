// /*Dropdown Menu*/

// $('.dropdown').click(function () {
//         $(this).attr('tabindex', 1).focus();
//         $(this).toggleClass('active');
//         $(this).find('.dropdown-menu').slideToggle(300);
//     });
//     $('.dropdown').focusout(function () {
//         $(this).removeClass('active');
//         $(this).find('.dropdown-menu').slideUp(300);
//     });
//     $('.dropdown .dropdown-menu li').click(function () {
//         $(this).parents('.dropdown').find('span').text($(this).text());
//         $(this).parents('.dropdown').find('input').attr('value', $(this).attr('id'));
//     });
// /*End Dropdown Menu*/


// $('.dropdown-menu li').click(function () {
//   var input = '<strong>' + $(this).parents('.dropdown').find('input').val() + '</strong>',
//       msg = '<span class="msg">Hidden input value: ';
//   $('.msg').html(msg + input + '</span>');
// }); 

// Resources


//FOR LIVE FILTERS TABLE

// / function myFunction() {
    //   // Declare variables 
    //   var input, filter, table, tr, td, i, txtValue;
    //   input = document.getElementById("myInput");
    //   filter = input.value.toUpperCase();
    //   table = document.getElementById("myTable");
    //   tr = table.getElementsByTagName("tr");
    
    //   // Loop through all table rows, and hide those who don't match the search query
    //   for (i = 0; i < tr.length; i++) {
    //     td = tr[i].getElementsByTagName("td")[0,];
    //     if (td) {
    //       txtValue = td.textContent || td.innerText;
    //       if (txtValue.toUpperCase().indexOf(filter) > -1) {
    //         tr[i].style.display = "";
    //       } else {
    //         tr[i].style.display = "none";
    //       }
    //     } 
    //   }
    // }

    //FOR LIVE FILTERS TABLE(ALL THE TD)
    
    // function myFunction() {
    //   const input = document.getElementById("myInput");
    //   const inputStr = input.value.toUpperCase();
    //   document.querySelectorAll('#myTable tr:not(.header)').forEach((tr) => {
    //     const anyMatch = [...tr.children]
    //       .some(td => td.textContent.toUpperCase().includes(inputStr));
    //     if (anyMatch) tr.style.removeProperty('display');
    //     else tr.style.display = 'none';
    //   });
    // }
    

    function myFunction() {
        const filter = document.querySelector('#myInput').value.toUpperCase();
        const trs = document.querySelectorAll('#myTable tr:not(.header)');
        trs.forEach(tr => tr.style.display = [...tr.children].find(td => td.innerHTML.toUpperCase().includes(filter)) ? '' : 'none');
      }

      $(function () {
        $('#popover').popover();
      });