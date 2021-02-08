$(document).ready(function() {
  let checkboxes = $("input[type=checkbox]");

  $("#add-form").on('submit', function(e) {
    let checker = 0;
    checkboxes.each(function() {
      if ($(this).prop('checked') == true) {
        checker = checker + 1;
      }
    });

    if (checker == 0) {
      e.preventDefault();
      alert('Необходимо выбрать хотя бы один тег!');
    } else if (checker > 3) {
      e.preventDefault();
      alert('Максимальное количество тегов для выбора: 3! Вы выбрали: ' + checker); 
    }
  });
});