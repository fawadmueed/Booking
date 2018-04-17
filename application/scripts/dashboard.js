
var booked_data;
var main_data;



function bookHotel(x){
    
    // alert('Booking Hotel');
    // console.log($(x).siblings('.hotelId').text());
    var hotelname = $(x).siblings('.card-title').text();
    var hotelId = $(x).siblings('.hotelId').text();
     dataBook={
        username : username,
        hotel_id : hotelId,
        bookflag : '1'
        
    }
    $('#hotelName_modal').text(hotelname);

    console.log(hotelname);
    $('.bookHotel').modal('show');
    
}

function bookThis(){
    
    $.ajax({
        type: 'POST',
        data: dataBook,
        url: 'http://localhost/Booking/index.php/users/book_hotel' ,
        success: function(data){
            alert('Hotel Booked Successfully!');
            $('.bookHotel').modal('hide');
            load_data();
        }
    });
}

$(document).ready(function(){

$('.bookHotel').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus');
  })

  load_data();



})

function load_data()
{
  //Loading Booked Hotels
    $.ajax({
        type: 'POST',
        async: false,
        url: 'http://localhost/Booking/index.php/users/load_booked_hotel' ,
        success: function(hot_book_data){
            hot_book_data=JSON.parse(hot_book_data);
            booked_data=hot_book_data;
            // console.log(booked_data);
        }
    });
  //Main Request for DASHBOARD Hotel Load
  $.ajax({
    type: 'POST',
    async: false,
    url: 'http://localhost/Booking/index.php/users/load_dashboard_hotels' ,
    success: function(main_data){
        main_data=JSON.parse(main_data);
        draw_hotels_dashboard(main_data);
    }
});

}
function draw_hotels_dashboard(main_data)
{
 var badge_html;
 var bookflag;
 $('.main_dash_view').html('');
$.each(main_data,function(id,val){
    
    // console.log(username);
    // console.log(val.id);
    // console.log(booked_data);
    console.log(booked_data);
    var found_match = $.grep(booked_data, function(v) 
    {
        
        if(v.username === username && v.hid === val.id) 
        {
            bookflag=v.bookflag;
            return v.bookflag;
        }
        // bookflag = v.bookflag;
        // 
    });

    if(found_match!='')
    {
        if(bookflag == 1)
        {
            badge_html = "<button class='badge badge-danger' onclick=bookHotel(this)>Waiting Approval</button>";
        }
        else
        {
            badge_html = "<button class='badge badge-warning' onclick=bookHotel(this)>Approved</button>";
        }
        
    }
    else
    {
        badge_html = "<button class='badge badge-primary' onclick=bookHotel(this)>Book Hotel</button>";
    }

    

    $('.main_dash_view').append("\
    <div class='col col-lg-4'>\
    <div class='card buffer'>\
    <img class='card-img-top' src=http://localhost/Booking/images/h"+val.h_image+".jpg alt='Card image cap'>\
    <div class='card-body'>\
    <h5 class='card-title'>"+ val.h_name +"</h5>\
    <p class='card-text'>"+ val.h_desc +"</p>\
    <p class='hotelId' style='display:none'>"+ val.id +" </p>\
    "+badge_html+"\
    </div>\
    </div>\
    </div>\ ")
 })
 
}
