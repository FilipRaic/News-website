$(function()
{
    $("form[name='prijava']").validate({
        rules:
		{
            user:
			{
                required: true,
            },
            password:
			{
                required: true,
            }
        },
        messages:
		{
            user:
			{
                required: "Username is required",
            },
            password:
			{
                required: "Password is required",
            }
        },
        submitHandler: function(form)
		{
            form.submit();
        }
    });
});