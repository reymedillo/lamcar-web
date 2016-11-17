'use strict';
var HIREAPP = HIREAPP || {
    'cars' : {},
    'drivers' : {}
};
HIREAPP.cars = function(){
    var toDelete_carId = false;
    var car_driver = false;
    // view car register modal
    $('#car-register-modal').on('show.bs.modal', function(e) {
          var $modal = $(this);
          var esseyId = e.relatedTarget.id;
    });    
    // trigger register button from form 
    $('#car-register').submit(function(event){      
       event.preventDefault(); // Stop form from submitting normally
       var form_data = [
            {name: '_token', value: $('#inputToken').val()},
            {name: 'number', value: $('#inputNumber').val()},
            {name: 'car_type_id', value: $('#inputCarType').val()},
            {name: 'note', value: $('#inputNote').val()},
        ];
        $.ajax({
            data: form_data,
            url: '/admin/cars/create',
            type: 'POST',
            beforeSend: function (request) {
                return request.setRequestHeader('X-CSRF-Token', form_data[0].value);
            },
            success: function(response){
                if(response.errors) {
                    $("#errors h3").remove();  
                    $("#errors h5").remove(); 
                    $("#errors p").remove();  
                    $('#car-fail-modal').modal('show');
                    $("#errors").append('<h3>' + response.message + '</h3');

                    for (var property in response.errors) {
                        $("#errors").append('<h5><strong>*' + property + '</strong></h5');
                        for(var i=0; i<response.errors[property].length; i++) {
                            $("#errors").append('<p>-' + response.errors[property][i] + '</p');
                        }
                    } 
                } else {
                    $('#car-success-modal').modal('show');    
                    $('#success-heading').text('Registration completed'); 
                }
            }
        })
    });
    // view car modal view / update
    $('#view-car-modal').on('show.bs.modal', function(e) {
        var $modal = $(this);
        var carId = e.relatedTarget.id;
        toDelete_carId = carId;
        $.ajax({
            url: '/admin/cars/' + carId,
            data: {format: 'json'},
            type: 'GET',
            dataType: 'json',
            success: function(response){
               var car = response.car;
               car_driver = car.driver_id;
               $("#updateNumber").val(car.number);
               $("#updatePassword").val("");
               $('#updateCarType').val(car.car_type_id);
               if(car.driver_id) {
                    
                    $('#updateCarDriver').prepend('<option selected="selected" value="'+car.driver_id+'">'+car.driver_name+'</option>');
                    $('#updateCarDriver').prepend('<option value="NULL">None</option>');
               } else {
                   $('#updateCarDriver').prepend('<option selected="selected" value="NULL">None</option>');
               }
               $("#updateNote").val(car.note);
            }
        });
    });  
    // edit button clicked
    $('#edit_car').click(function(event){
        event.preventDefault();
        var form_data = [
            {name: '_token', value: $('#updateToken').val()},
            {name: 'number', value: $('#updateNumber').val()},
            {name: 'car_type_id', value: $('#updateCarType').val()},
            {name: 'driver_id', value: $('#updateCarDriver').val()},
            {name: 'note', value: $('#updateNote').val()},
        ];
        $.ajax({
            data: form_data,
            url: '/admin/cars/' + toDelete_carId,
            type: 'PUT',
            beforeSend: function (request) {
                return request.setRequestHeader('X-CSRF-Token', $('#updateToken').val());
            },
            success: function(response){
                if(response.errors) {
                    $('#car-fail-modal').modal('show');
                    $("#errors h3").remove();  
                    $("#errors h5").remove(); 
                    $("#errors p").remove();  
                    $('#car-fail-modal').modal('show');
                    $("#errors").append('<h3>' + response.message + '</h3');
                    for (var property in response.errors) {
                        $("#errors").append('<h5><strong>*' + property + '</strong></h5');
                        for(var i=0; i<response.errors[property].length; i++) {
                            $("#errors").append('<p>-' + response.errors[property][i] + '</p');
                        }
                    } 
                } else {
                    $('#car-success-modal').modal('show'); 
                    $('#success-heading').text('Car Update Completed'); 
                }
            }
        })
    });    
    $('#car-success-modal').on('hidden.bs.modal', function(e){
        window.location.reload(true);
    });
    $('#view-car-modal').on('hidden.bs.modal', function(e){
        $("#updateCarDriver option[value='"+car_driver+"']").remove();
        $("#updateCarDriver option[value='NULL']").remove();
    });
    // delete button clicked
    $('#delete_car').click(function(event){
        event.preventDefault();
        $('#car-prompt-delete-modal').modal('show');
    });
    // delete yes confirmation clicked
    $('#confirmedDelete').click(function(event){   	
        $.ajax({
            url: '/admin/cars/' + toDelete_carId + '/delete',
            data: {format: 'json'},
            type: 'GET',
            dataType: 'json',
            success: function(response){
                $('#view-car-modal').modal('hide');
                $('#car-prompt-delete-modal').modal('hide');
                $('#car-prompt-success-delete-modal').modal('show');
            }
        });

    });
    $('#ok-delete').click(function(event){
        window.location.reload(true);
    });
};

// DRIVERS AREA
HIREAPP.drivers = function(){
    var toDelete_driverId = false;
    // view car register modal
    $('#driver-register-modal').on('show.bs.modal', function(e) {
          var $modal = $(this);
          var esseyId = e.relatedTarget.id;
    });  

    // trigger register button from form 
    $('#driver-register').submit(function(event){      
       event.preventDefault(); // Stop form from submitting normally
       var form_data = [
            {name: '_token', value: $('#inputToken').val()},
            {name: 'login_id', value: $('#inputLoginId').val()},
            {name: 'name', value: $('#inputName').val()},
            {name: 'password', value: $('#inputPassword').val()},
            {name: 'password_confirmation', value: $('#confirmInputPassword').val()}
        ];
        $.ajax({
            data: form_data,
            url: '/admin/drivers/create',
            type: 'POST',
            beforeSend: function (request) {
                return request.setRequestHeader('X-CSRF-Token', form_data[0].value);
            },
            success: function(response){
                if(response.errors) {
                    $("#errors h3").remove();  
                    $("#errors h5").remove(); 
                    $("#errors p").remove();  
                    $('#driver-fail-modal').modal('show');
                    $("#errors").append('<h3>' + response.message + '</h3');

                    for (var property in response.errors) {
                        $("#errors").append('<h5><strong>* ' + property + '</strong></h5');
                        for(var i=0; i<response.errors[property].length; i++) {
                            $("#errors").append('<p>- ' + response.errors[property][i] + '</p');
                        }
                    } 
                } else {
                    $('#driver-success-modal').modal('show');    
                    $('#success-heading').text('Registration completed'); 
                }
            }
        })
    });

    // view drivers modal view / update
    $('#view-driver-modal').on('show.bs.modal', function(e) {
        var driverId = e.relatedTarget.id;
        toDelete_driverId = driverId;
        $.ajax({
            url: '/admin/drivers/' + driverId,
            data: {format: 'json'},
            type: 'GET',
            dataType: 'json',
            success: function(response){
               var driver = response.driver;

               $("#updateLoginId").val(driver.login_id);
               $("#updateName").val(driver.name);
            }
        });
    });

    // edit button clicked
    $('#edit_driver').click(function(event){
        event.preventDefault();
        var form_data = [
            {name: '_token', value: $('#updateToken').val()},
            {name: 'login_id', value: $('#updateLoginId').val()},
            {name: 'name', value: $('#updateName').val()},
            {name: 'password', value: $('#updatePassword').val()},
            {name: 'password_confirmation', value: $('#confirmUpdatePassword').val()},
        ];
        $.ajax({
            data: form_data,
            url: '/admin/drivers/' + toDelete_driverId,
            type: 'PUT',
            beforeSend: function (request) {
                return request.setRequestHeader('X-CSRF-Token', $('#updateToken').val());
            },
            success: function(response){
                if(response.errors) {
                    $('#driver-fail-modal').modal('show');
                    $("#errors h3").remove();  
                    $("#errors h5").remove(); 
                    $("#errors p").remove();  
                    $('#driver-fail-modal').modal('show');
                    $("#errors").append('<h3>' + response.message + '</h3');
                    for (var property in response.errors) {
                        $("#errors").append('<h5><strong>* ' + property + '</strong></h5');
                        for(var i=0; i<response.errors[property].length; i++) {
                            $("#errors").append('<p>- ' + response.errors[property][i] + '</p');
                        }
                    } 
                } else {
                    $('#driver-success-modal').modal('show'); 
                    $('#success-heading').text('Driver Update Completed'); 
                }
            }
        })
    });

    // delete button clicked
    $('#delete_driver').click(function(event){
        event.preventDefault();
        $('#driver-prompt-delete-modal').modal('show');
    });
    // delete yes confirmation clicked
    $('#confirmedDelete').click(function(event){    
        $.ajax({
            url: '/admin/drivers/' + toDelete_driverId + '/delete',
            data: {format: 'json'},
            type: 'DELETE',
            beforeSend: function (request) {
                return request.setRequestHeader('X-CSRF-Token', $('#updateToken').val());
            },
            dataType: 'json',
            success: function(response){
                $('#view-driver-modal').modal('hide');
                $('#driver-prompt-delete-modal').modal('hide');
                $('#driver-prompt-success-delete-modal').modal('show');
            }
        });

    });

    $('#driver-success-modal').on('hidden.bs.modal', function(e){
        window.location.reload(true);
    });

    $('#ok-delete').click(function(event){
        window.location.reload(true);
    });
};