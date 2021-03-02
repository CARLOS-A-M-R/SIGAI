$(function() {
    //oculta al hacer click fuera del elemnto (formulario)

    $(document).on("click", function(e) {
        var container = $("#notification-latest");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            //Se ha pulsado en cualquier lado fuera de los elementos contenidos en la variable container
            container.slideUp();
        }
    });

    //Muestra elento (formulario)
    $("#notification-icon").on("click", function(event) {
        $("#notification-latest").slideToggle();
        event.stopImmediatePropagation();
    });
});