
$(function() {

  $("form[name='timeinsert']").validate({

    rules: {
      date: "required",
	  start_datetime: "required",
	  end_datetime: "required",
	  subject: "required",
	  price: "required",
	  learn: "required",
	  locationtime: "required"
    },
    messages: {
      date: "*",
	  start_datetime: "*",
	  end_datetime: "*",
	  subject: "*",
	  price: "*",
	  learn: "*",
	  locationtime: "*"
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
});