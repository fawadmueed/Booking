$(document).ready(function(){

    load_admin_dashboard_data(); 

})

function load_admin_dashboard_data() 
    {
        $.ajax({
            type: 'POST',
            async: false,
            url: 'http://localhost/Booking/index.php/users/load_booked_hotel' ,
            success: function(admin_hotels)
            {
                admin_hotels=JSON.parse(admin_hotels);
                draw_admin_dashboard(admin_hotels);
            }
        });
    }

function draw_admin_dashboard(admin_hotels)
    {
        var badge_admin_html;
        $('.main_admin_view.row').html(' ');

        $.each(admin_hotels,function(id,val)
        {
         if(val.bookflag == 1)
         {
            badge_admin_html = "<button class='badge badge-primary' onclick=approveHotel(this)>To Approve</button>";
         }
         else
         {
            badge_admin_html = "<button class='badge badge-success' onclick=approveHotel(this)>Approved !</button>";
         }

            $('.main_admin_view.row').append("\
            <div class='col col-lg-4'>\
            <div class='card buffer'>\
            <img class='card-img-top' src=http://localhost/Booking/images/h"+val.h_image+".jpg alt='Card image cap'>\
            <div class='card-body'>\
            <h5 class='card-title'>"+ val.h_name +"</h5>\
            <p class='card-text'>Booked By <b>"+ val.username +"</b></p>\
            <p class='hotelId' style='display:none'>"+val.hid+" </p>\
            "+badge_admin_html+"\
            </div>\
            </div>\
            </div>\ ")   
        });

    }
 
function approveHotel(x)
{
    var username_appr = $(x).siblings('.card-text').children('b').text();
    var hotelname = $(x).parent().find('.card-title').text();
    var hotelId = $(x).siblings('.hotelId').text();
    dataApprove={
        username : username_appr,
        hotel_id : hotelId,
        bookflag : '2'
    }

    $.ajax({
        type: 'POST',
        data: dataApprove,
        url: 'http://localhost/Booking/index.php/users/approve_hotel' ,
        success: function(data){
            alert('Hotel Booking Approved!')
            load_admin_dashboard_data();
        }
    });

    

    
}
   