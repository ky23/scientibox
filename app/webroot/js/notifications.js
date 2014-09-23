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