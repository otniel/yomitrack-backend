$(document).ready(function(){
	$('.filter_options').change(function(){
		if ($(this).val() == 'BT') {
			var container = $(this).next();
			var element = $(container).find('input');
            $(element).removeClass('hasDatepicker');
			var endValue = $(element).clone();
            $(endValue).attr('id', $(endValue).attr('id')+'1');
			$(endValue).attr('name', $(endValue).attr('name') + '_end');
			$(element).attr('name', $(element).attr('name') + '_start');
			$(container).append('<span> Y </span>');
			$(container).append(endValue);
            
            //Recrear datepickerWidget despues de crear dinamicamente los filtros
            datepickerWidget();
		}
		else {
			var container = $(this).next();
			var inputs = $(container).find('input');
			if (inputs.length > 1 ) {
				$(inputs).last().remove();
				$(container).find('span').remove();
				$(inputs).attr('name', $(inputs).attr('name').replace('_start', ''));
			}
		}
	});
    
    var datepickerWidget = function(){
            $(".datepicker").datepicker({
            dateFormat: "yy-mm-dd"
        });
    };
    
    datepickerWidget();

    

});