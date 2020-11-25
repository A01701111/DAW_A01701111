$(document).ready(function() {
    function printTable(){
        $.ajax({
           url:"BackEnd/displayFruit.php",
           method: "POST",
           succes:function(data){
               $('#Table').html(data);
               console("si corrio")
           }
        });
    }
    var request;
    
    request = $.ajax({
        url: "BackEnd/displayFruit.php",
        type: "POST"
    });
    
    request.done(function (response){
        // Log a message to the console
        console.log(response);
        $('#Table').html(response);
    });
    

    $("#Agrega").submit(function(event){
        var request;

        event.preventDefault();
    
        if (request) {
            request.abort();
        }

        var $form = $(this);
    
        var $inputs = $form.find("input, select, button, textarea");
    
        var serializedData = $form.serialize();
    
        $inputs.prop("disabled", true);
    
        request = $.ajax({
            url: "BackEnd/addFruit.php",
            type: "post",
            data: serializedData
        });
    
        request.done(function (response, textStatus, jqXHR){
            // Log a message to the console
            console.log(response);
            $( '#Agrega' ).each(function(){
                this.reset();
            });
            $('#Table').html(response);
            printTable();
        });
    
        // Callback handler that will be called on failure
        request.fail(function (jqXHR, textStatus, errorThrown){
            // Log the error to the console
            console.error(
                "The following error occurred: "+
                textStatus, errorThrown
            );
        });
    
        // Callback handler that will be called regardless
        // if the request failed or succeeded
        request.always(function () {
            // Reenable the inputs
            $inputs.prop("disabled", false);
        });
    
    });

    $("#modif").submit(function(event){
        var request;

        event.preventDefault();
    
        if (request) {
            request.abort();
        }

        var $form = $(this);
    
        var $inputs = $form.find("input, select, button, textarea");
    
        var serializedData = $form.serialize();
    
        $inputs.prop("disabled", true);
    
        request = $.ajax({
            url: "BackEnd/upDate.php",
            type: "post",
            data: serializedData
        });
    
        request.done(function (response, textStatus, jqXHR){
            // Log a message to the console
            console.log(response);
            $('#modif').each(function(){
                this.reset();
            });
            $('#Table').html(response);
            printTable();
        });
    
        // Callback handler that will be called on failure
        request.fail(function (jqXHR, textStatus, errorThrown){
            // Log the error to the console
            console.error(
                "The following error occurred: "+
                textStatus, errorThrown
            );
        });
    
        // Callback handler that will be called regardless
        // if the request failed or succeeded
        request.always(function () {
            // Reenable the inputs
            $inputs.prop("disabled", false);
        });
    
    });

    $("#deleteFruitForm").submit(function(event){
        var request;
        
        event.preventDefault();
    
        if (request) {
            request.abort();
        }

        var $form = $(this);
    
        var $inputs = $form.find("input, select, button, textarea");
    
        var serializedData = $form.serialize();
    
        $inputs.prop("disabled", true);
    
        request = $.ajax({
            url: "BackEnd/deleteFruit.php",
            type: "post",
            data: serializedData
        });
    
        request.done(function (response, textStatus, jqXHR){
            // Log a message to the console
            console.log(response);
            $('#deleteFruitForm').each(function(){
                this.reset();
            });
            $('#Table').html(response);
            printTable();
        });
    
        // Callback handler that will be called on failure
        request.fail(function (jqXHR, textStatus, errorThrown){
            // Log the error to the console
            console.error(
                "The following error occurred: "+
                textStatus, errorThrown
            );
        });
    
        // Callback handler that will be called regardless
        // if the request failed or succeeded
        request.always(function () {
            // Reenable the inputs
            $inputs.prop("disabled", false);
        });
    
    });
});