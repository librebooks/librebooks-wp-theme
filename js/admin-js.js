jQuery(function(jQuery) {
    jQuery('.repeatable-add').click(function() {
        field = jQuery(this).parent().find('.repeatable_group:last').clone(true);
        fieldLocation = jQuery(this).parent().find('.repeatable_group:last');
        jQuery('input', field).val('').attr('name', function(index, name) {
            return name.replace(/(\d+)/, function(fullMatch, n) {
                return Number(n) + 1;
            });
        })
        field.insertAfter(fieldLocation)
        return false;
    });

    jQuery('.repeatable-remove').click(function(){

	jQuery(this).parent().remove();
        return false;

    });

    jQuery('.repeatable_form').sortable({
        opacity: 0.6,
        revert: true,
        cursor: 'move',
        items: '.repeatable_group'
    });
});
