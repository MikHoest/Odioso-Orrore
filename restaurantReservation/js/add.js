/**
 * Created by Notandi on 3.10.2016.
 */

var output = $(document).find('#output');

$('.tables').on('click', function()
{
    var data = $(this).data('number');
    if(data != "invalid")
    {
        if(output.val().indexOf(data)<= -1 && output.val().length === 0)
        {
            $(this).addClass('selected');
            output.val(data);
        }
        else
        {
            $(this).removeClass('selected');
            var clear = output.val().replace(data, "");
            output.val(clear);
        }
    }
});