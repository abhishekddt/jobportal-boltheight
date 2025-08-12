import { route } from 'ziggy-js';

 $(document).ready(function(){  
     const csrf_token = $("meta[name='csrf-token']").attr('content');
     
    $('#register_user').on('submit', function (event) { 
      event.preventDefault(); 
        let phone_number = $('#phone_number').val(); 
        let password = $('#password').val().trim();
        let confirm_password = $('#confirm_password').val().trim(); 

        let error = true;
         if(phone_number.length  < 10){
            $('#mobile_number_error').text("Required 10 digit mobile number").show();
            return;
         }
          $('#mobile_number_error').hide();
         if(password.length < 8){
            $('#password_limit').text("Min 8 characters required").show();   
            $('#password_error').hide(); 
            return;

         }else{
             $('#password_limit').hide();  
         }
         
        if(password !== confirm_password){
            $('#password_error').text("Passwords don't match.").show();
            error = false;
            return true;
        }
         $('#password_error').hide(); 

         $(this).off('submit').submit();
     });

     // password show functions
     $('#show_password').on('click', function(){

         if($('#password').val().length > 0 ){
               if($('#password').attr('type') === 'password'){
                  $('#password').attr('type', 'text');
                  $('#show_password').removeClass('ri-eye-line').addClass('ri-eye-off-line');
               }else{
                  $('#password').attr('type', 'password');
                  $('#show_password').removeClass('ri-eye-off-line').addClass('ri-eye-line');
               } 
         } 

     })
     $('#show_confirm_password').on('click', function () { 
          if($('#confirm_password').val().length > 0){
               if($('#confirm_password').attr('type') === 'password'){
                  $('#confirm_password').attr('type', 'text');
                  $('#show_confirm_password').removeClass('ri-eye-line').addClass('ri-eye-off-line');
               }else{
                  $('#confirm_password').attr('type', 'password');
                  $('#show_confirm_password').removeClass('ri-eye-off-line').addClass('ri-eye-line');
               }
          } 
     });

     //login show
      $('#login_show_password').on('click', function () { 
          if($('#login_password').val().length > 0){
               if($('#login_password').attr('type') === 'password'){
                  $('#login_password').attr('type', 'text');
                  $('#login_show_password').removeClass('ri-eye-line').addClass('ri-eye-off-line');
               }else{
                  $('#login_password').attr('type', 'password');
                  $('#login_show_password').removeClass('ri-eye-off-line').addClass('ri-eye-line');
               }
          } 
     });
      

     // state api fetch 
      $('#country').on('change', function () { 
            let countryId  = $('#country option:selected').data('id');
             fetch(route('api.get_states'), {
               method:"POST",
               headers:{ 
                "X-CSRF-TOKEN":csrf_token,
               "Content-Type": "application/json" 
            },
            body:JSON.stringify({ country_id: countryId })
        }).then(response => response.json())
        .then(responseData =>{
         console.log(responseData);

         if(Array.isArray(responseData.cities)){
            $('#state').empty(); 
            $('#state').append('<option value="" selected >Select State</option>');  
            responseData.cities.forEach(state => {  
                $('#state').append(`<option value="${state.id}">${state.name}</option>`);
            }); 
         } 
        }).catch(error => console.error(error)); 
       }); 

       // city fetch
      $('#state').on('change', function () { 
            let stateId = $('#state').val();

             if (!stateId) { 
               return;   
            }

            fetch(route('api.get_cities'), {
               method:"POST",
               headers:{
                   "X-CSRF-TOKEN":csrf_token,
                   "Content-Type": "application/json" 
               },
               body:JSON.stringify({state_id: stateId})
            })
            .then(response => response.json())
            .then(responseData =>{
               console.log(responseData, "responseData");
                  $('#city').empty();  
                     responseData.cities.forEach(cities => {  
                        $('#city').append(`<option value="${cities.id}">${cities.name}</option>`);
                     }); 


               

            });
            
       });

 });