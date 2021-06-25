$(function()
{
    $("form[name='prijava']").validate({
        rules:
		{
            ime:
			{
                required: true,
            },
            prezime:
			{
                required: true,
            },
            user:
			{
                required: true,
            },
            password:
			{
                required: true,
            },
            password1:
			{
                required: true,
                equalTo: "#password"
            }
        },
        messages:
		{
            ime:
			{
                required: "Name is required",
            },
            prezime:
			{
                required: "Surname is required",
            },
            user:
			{
                required: "Username is required",
            },
            password:
			{
                required: "Password is required",
            },
            password1:
			{
                required: "Please repeat password",
                equalTo: "Passwords must match"
            }
        },
        submitHandler: function(form)
		{
            form.submit();
        }
    });
});  