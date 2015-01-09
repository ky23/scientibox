    function checkAll(ele) {
      var checkboxes = document.getElementsByTagName('input');
      console.log(checkboxes);
      if (ele.checked) {
        for (var i = 0; i < checkboxes.length; ++i) {
          if (checkboxes[i].type == 'checkbox') {
            checkboxes[i].checked = true;
          }
        }
      } else {
        for (var i = 0; i < checkboxes.length; ++i) {
          console.log(i)
          if (checkboxes[i].type == 'checkbox') {
            checkboxes[i].checked = false;
          }
        }
      }
    }

    function notif() {
      $.ajax({
        url: "/scientibox/notifications/new_message",
        dataType: 'json',
        ifModified: true,
        success: function(content){
          $('#notifications').html(content);
        }
      });
      setTimeout(notif, 10000);
    }
    notif();