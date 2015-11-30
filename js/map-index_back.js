var icon = 'images/marker/mr0p.png';
var tambonArr = [];
var tambonArrName = [];
var my_Marker = [];
var delay = 100;
var nextAddress = 0;
var place = [];
var max = 0;
// Specify features and elements to define styles.
var styleArray = [
  {
    featureType: "all",
    stylers: [
     { saturation: -80 }
    ]
  },{
    featureType: "road.arterial",
    elementType: "geometry",
    stylers: [
      { hue: "#00ffee" },
      { saturation: 50 }
    ]
  },{
    featureType: "poi.business",
    elementType: "labels",
    stylers: [
      { visibility: "off" }
    ]
  }
];

$(document).ready(function(){

  $(".datepicker").datepicker({language:'th-th',format:'dd/mm/yyyy'});
  // $('#txtStartdate').datepicker('setDate', new Date(2011, 00, 01));
  // $('#txtEnddate').datepicker('setDate', new Date(2011, 0, 12));
  // $('#txtStartdate').datepicker({language:'th-th',format:'dd/mm/yyyy'});
  // $('#txtStartdate').datepicker("setDate",'12/31/2011');
  // $('#txtEnddate').datepicker("setDate",'12/31/2011');
});
// Initialize map
function initMap() {

    //google.maps = new Object(google.maps);
    // geocoder = new google.maps.Geocoder();
    geocoder = new google.maps.Geocoder();
    // Create a map object and specify the DOM element for display.
    map = new google.maps.Map(document.getElementById('map-canvas'), {
      // Setting Khon Kaen for first testing : 16.441967, 102.829717
      center: {lat: 16.441967, lng: 102.829717},
      scrollwheel: true,
      mapTypeControl: true,
      mapTypeControlOptions: {
        style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
        mapTypeIds: [
          google.maps.MapTypeId.ROADMAP,
          google.maps.MapTypeId.TERRAIN
        ],
        position: google.maps.ControlPosition.TOP_RIGHT
      },
      streetViewControl: false,
      zoom: 10
    });

    my_Marker = new google.maps.Marker({ // สร้างตัว marker ไว้ในตัวแปร my_Marker
  		// position: my_Latlng,  // กำหนดไว้ที่เดียวกับจุดกึ่งกลาง
  		map: map, // กำหนดว่า marker นี้ใช้กับแผนที่ชื่อ instance ว่า map
  		draggable:true, // กำหนดให้สามารถลากตัว marker นี้ได้
  		title:"คลิกลากเพื่อหาตำแหน่งจุดที่ต้องการ!" // แสดง title เมื่อเอาเมาส์มาอยู่เหนือ
  	});

    initMaxData();
    initData();

    // Try W3C Geolocation (Preferred)
    // if(navigator.geolocation) {
    //       browserSupportFlag = true;
    //       navigator.geolocation.getCurrentPosition(function(position) {
    //         initialLocation = new google.maps.LatLng(position.coords.latitude,position.coords.longitude);
    //         cLocation = initialLocation;
    //         map.setCenter(initialLocation);
    //         map.panTo(initialLocation);
    //
    //         cMarker = new google.maps.Marker({
    //             position: initialLocation,
    //             map: map,
    //             icon: cMartkerIcon,
    //             title:"ตำแหน่งปัจจุบันของคุณ!",
    //             zoom: 14,
    //         });
    //
    //         // กำหนด event ให้กับตัว marker เมื่อสิ้นสุดการลากตัว marker ให้ทำงานอะไร
    //         google.maps.event.addListener(cMarker, 'dragend', function() {
    //             var my_Point = cMarker.getPosition();  // หาตำแหน่งของตัว marker เมื่อกดลากแล้วปล่อย
    //             map.panTo(my_Point); // ให้แผนที่แสดงไปที่ตัว marker
    //
    //             // เรียกขอข้อมูลสถานที่จาก Google Map
    //             geocoder.geocode({'latLng': my_Point}, function(results, status) {
    //               if (status == google.maps.GeocoderStatus.OK) {
    //                 if (results[0]) {
    //                   // $("#txtPlace").val(results[0].formatted_address); //
    //                 }else if(results[1]){
    //                   // $("#txtPlace").val(results[1].formatted_address); //
    //                 }
    //               } else {
    //                   // กรณีไม่มีข้อมูล
    //                 alert("Geocoder failed due to: " + status);
    //               }
    //             });
    //         });
    //
    //       }, function() {
    //         handleNoGeolocation(browserSupportFlag);
    //       });
    // } else { // Browser doesn't support Geolocation
    //       browserSupportFlag = false;
    //       handleNoGeolocation(browserSupportFlag);
    // }
    //
    // function handleNoGeolocation(errorFlag) {
    //       if (errorFlag == true) {
    //         alert("Geolocation service failed.");
    //         initialLocation = psu;
    //       } else {
    //         alert("Your browser doesn't support geolocation. We've placed you in Siberia.");
    //         initialLocation = psu;
    //       }
    //
    //       cMarker = new google.maps.Marker({
    //           position: cLocation,
    //           map: map,
    //           title:"Hello World!"
    //       });
    //
    //       map.setCenter(initialLocation);
    // }
    // End function
}

// Function สำหรับตรวจสอบตำแหน่งที่มีจำนวนการเกิดเหตุการณ์มากที่สุด
function initMaxData(){
  if($('#txtLevel').val()==3){
    $.getJSON( "dist/call-maxeven-ampurlevel.php", function(data) {
      var objBuff = data;

      for(var i=0; i < data.length ; i++){
        max = objBuff[i].counts;
      }
    });
  }else{
    $.getJSON( "dist/call-maxeven.php", function(data) {
      var objBuff = data;

      for(var i=0; i < data.length ; i++){
        max = objBuff[i].counts;
      }
    });
  }

}


function initData(){

  if(my_Marker.length!=0){
    for (var i = 0; i < my_Marker.length; i++) {
      my_Marker[i].setMap(null);
    }
    my_Marker = [];
  }

  $ampur = $('#txtDistrict').val();

  // alert($ampur);

  $.getJSON( "dist/call-marker.php?level=3&province=40&ampur=" + $ampur, function(data) {

      var obj_tambon = data;
      var placename = '';
      var district = '';
      var tumbon = '';
      var zoomlevel = map.getZoom();

      // alert(zoomlevel);

      for(var i=0; i < data.length ; i++){
        placename = '';
        if($('#txtLevel').val()==3){
          if(obj_tambon[i].TUMBON==""){
            var res = obj_tambon[i].Aampur.substr(0, 4);
            if(res=='กิ่ง'){
              placename = obj_tambon[i].Aampur + " จังหวัดขอนแก่น";
            }else{
              placename = "อำเภอ" + obj_tambon[i].Aampur + " จังหวัดขอนแก่น";
            }

            if(obj_tambon[i].LAT==""){
              doMarker2(placename, obj_tambon[i].Aampur_num, i, obj_tambon[i].numrow);
            }else{
              theMarker(placename, obj_tambon[i].LAT, obj_tambon[i].LNG, i, obj_tambon[i].numrow, max, zoomlevel);
            }
          }
        }else{
          if(obj_tambon[i].TUMBON==""){
            var res = obj_tambon[i].Aampur.substr(0, 4);
            if(res=='กิ่ง'){
              placename = obj_tambon[i].Aampur + " จังหวัดขอนแก่น";
            }else{
              placename = "อำเภอ" + obj_tambon[i].Aampur + " จังหวัดขอนแก่น";
            }

            if(obj_tambon[i].LAT==""){
              doMarker2(placename, obj_tambon[i].Aampur_num, i, obj_tambon[i].numrow);
            }else{
              theMarker(placename, obj_tambon[i].LAT, obj_tambon[i].LNG, i, obj_tambon[i].numrow, max, zoomlevel);
            }
          }else{
            var res = obj_tambon[i].Aampur.substr(0, 4);
            if(res=='กิ่ง'){
              placename = "ตำบล" + obj_tambon[i].TUMBON + " " + obj_tambon[i].Aampur + " จังหวัดขอนแก่น";
            }else{
              placename = "ตำบล" + obj_tambon[i].TUMBON + " อำเภอ" + obj_tambon[i].Aampur + " จังหวัดขอนแก่น";
            }

            if(obj_tambon[i].LAT==""){
              doMarker1(placename, obj_tambon[i].TUMBON_num, obj_tambon[i].Aampur_num, i, obj_tambon[i].Aampur, obj_tambon[i].numrow);
            }else{
              theMarker(placename, obj_tambon[i].LAT, obj_tambon[i].LNG, i, obj_tambon[i].numrow, max, zoomlevel);
            }
          }
        }

      } //End for
  });
}

function theMarker(placename, lat, lng, i, numrow, max, zoomlevel) {

  var pct = (numrow * 100)/max;

  if((pct >= 0 ) && (pct < 10)){
    icon = 'images/marker/mr0p.png';
  }else if((pct >= 11 ) && (pct < 20)){
    icon = 'images/marker/mr10p.png';
  }else if((pct >= 21 ) && (pct < 40)){
    icon = 'images/marker/mr40p.png';
  }else if((pct >= 41 ) && (pct < 60)){
    icon = 'images/marker/mr60p.png';
  }else if((pct >= 61 ) && (pct < 80)){
    icon = 'images/marker/mr80p.png';
  }else if(pct >= 81 ){
    icon = 'images/marker/mr100p.png';
  }

  var markerLatLng = new google.maps.LatLng(lat,lng);
  my_Marker[i] = new google.maps.Marker({ // สร้างตัว marker เป็นแบบ array
      position: markerLatLng,  // กำหนดไว้ที่เดียวกับจุดกึ่งกลาง
      map: map, // กำหนดว่า marker นี้ใช้กับแผนที่ชื่อ instance ว่า map
      icon: icon,
      title: placename + ' : จำนวน ' + numrow // แสดง title เมื่อเอาเมาส์มาอยู่เหนือ
  });
}

function doMarker1(placename, tumbon_id, ampur_id, i, ampur, numrow){

  // alert('doMarker1');
  if(geocoder){ // ตรวจสอบว่าถ้ามี Geocoder Object
    geocoder.geocode({
       address: placename // ให้ส่งชื่อสถานที่ไปค้นหา
    },function(results, status){ // ส่งกลับการค้นหาเป็นผลลัพธ์ และสถานะ
          if(status == google.maps.GeocoderStatus.OK) { // ตรวจสอบสถานะ ถ้าหากเจอ
            var my_Point=results[0].geometry.location; // เอาผลลัพธ์ของพิกัด มาเก็บไว้ที่ตัวแปร
            var markerLatLng = new google.maps.LatLng(my_Point.lat(),my_Point.lng());
            my_Marker[i] = new google.maps.Marker({ // สร้างตัว marker เป็นแบบ array
                position: markerLatLng,  // กำหนดไว้ที่เดียวกับจุดกึ่งกลาง
                map: map, // กำหนดว่า marker นี้ใช้กับแผนที่ชื่อ instance ว่า map
                title: placename + ' : จำนวน ' + numrow // แสดง title เมื่อเอาเมาส์มาอยู่เหนือ
            });

            // Save lat, lng data
            $.post("dist/update_location1.php", {
              ampur: ampur_id,
              tumbon: tumbon_id,
              lat: my_Point.lat(),
              lng: my_Point.lng()
              },
              function(result){
                if(result=='Y'){
                  alert('Update success');
                }else{
                  // alert(result);
                }
              }
            );
            //------------------------------------------
          }else{
            // alert("1 " + placename);
          }
    }); // End if geocode
  }
}

function doMarker2(placename, ampur_id, i, numrow){
  // alert('doMarker2');
  if(geocoder){ // ตรวจสอบว่าถ้ามี Geocoder Object
    geocoder.geocode({
       address: placename // ให้ส่งชื่อสถานที่ไปค้นหา
    },function(results, status){ // ส่งกลับการค้นหาเป็นผลลัพธ์ และสถานะ
          if(status == google.maps.GeocoderStatus.OK) { // ตรวจสอบสถานะ ถ้าหากเจอ
            var my_Point=results[0].geometry.location; // เอาผลลัพธ์ของพิกัด มาเก็บไว้ที่ตัวแปร
            var markerLatLng = new google.maps.LatLng(my_Point.lat(),my_Point.lng());
            `my_Marker`[i] = new google.maps.Marker({ // สร้างตัว marker เป็นแบบ array
                position: markerLatLng,  // กำหนดไว้ที่เดียวกับจุดกึ่งกลาง
                map: map, // กำหนดว่า marker นี้ใช้กับแผนที่ชื่อ instance ว่า map
                title: placename + ' : จำนวน ' + numrow // แสดง title เมื่อเอาเมาส์มาอยู่เหนือ
            });

            // Save lat, lng data
            $.post("dist/update_location2.php", {
              ampur: ampur_id,
              lat: my_Point.lat(),
              lng: my_Point.lng()
              },
              function(result){
                if(result=='Y'){
                  alert('Update success');
                }else{
                  // alert(result);
                }
              }
            );
            //------------------------------------------
          }else{
            alert("2 " + placename);
            // alert("Geocode was not successful for the following reason: " + status);
          }
    }); // End if geocode
  }
}

function callTambon(){
  $.getJSON( "dist/call-tambon.php", function(data) {
      var obj_tambon = data;
      $.each(obj_tambon,function(i,k){
        $('#txtTambon').append($('<option>', {
            value: obj_tambon[i].Tambon,
            text: obj_tambon[i].Name
        }));
      });
  });
}

$(function(){

  $('#btnDisplay').click(function(){
    initData();
  });

  $('#txtLevel').change(function(){
      if($('#txtLevel').val()=='4'){
        $('.tambonfilter').show();
        // initData();
      }else{
        $('.tambonfilter').hide();
      }
  });

  $('#txtDistrict').change(function(){

    // initData();

    $('#txtTambon').val("").change();
    $arrDistrict = $('#txtDistrict').val();
    if($arrDistrict!=''){
      $('#txtTambon').empty();
      $('#txtTambon').append($('<option>', {
          value: "",
          text: '-- ทุกตำบล --'
      }));

      $province = $('#txtProvince').val();
      $district = $('#txtDistrict').val();

      $.getJSON( "dist/call-tambon.php?province=" + $province + "&district=" + $district, function(data) {

          var obj_tambon = data;
          $.each(obj_tambon,function(i,k){
            $('#txtTambon').append($('<option>', {
                value: obj_tambon[i].Tambon,
                text: obj_tambon[i].Name
            }));
          });

      });

      //------------ End query ชื่อตำบล ----------
      $('#txtTambon').val("").change();
    }else{
      $('#txtTambon').empty();
      $('#txtTambon').append($('<option>', {
          value: "",
          text: '-- ทุกตำบล --'
      }));
      $('#txtTambon').val("").change();
    }
  });

  $('#menu-icon').mouseover(function(){
    $('#filter-menu').show();
  });

  $('#menu-icon').mouseout(function(){
    $('#filter-menu').hide();
  });

  $('#menu-icon').click(function(){
    // Set the effect type
    var effect = 'slide';

    // Set the options for the effect type chosen
    var options = { direction: "left" };

    // Set the duration (default: 400 milliseconds)
    var duration = 300;
    $('.left-menu').toggle(effect, options, duration);
    $('.cover-blur').show();
  });

  $('.cover-blur').click(function(){
    $('#txtUsername').val('');
    $('#txtPassword').val('');
    // $('.cover-blur').toggle('fade');
    $('.cover-blur').hide();

    if($('#loginDiv').css('display') != 'none'){
      // $('#loginDiv').toggle('fade');
      $('#loginDiv').hide();
    }


    if($('.left-menu').css('display') != 'none'){
      // Set the effect type
      var effect = 'slide';

      // Set the options for the effect type chosen
      var options = { direction: "left" };

      // Set the duration (default: 400 milliseconds)
      var duration = 300;
      $('.left-menu').toggle(effect, options, duration);
    }else{
      $('.left-menu').hide();
    }

  });



  $('#hidemenu').click(function(){
    $('#loginDiv').hide();
    $('.cover-blur').hide();
    // Set the effect type
    var effect = 'slide';

    // Set the options for the effect type chosen
    var options = { direction: "left" };

    // Set the duration (default: 400 milliseconds)
    var duration = 300;
    $('.left-menu').toggle(effect, options, duration);
    // return false;
  });

  //--------------Login-------------------
  $('#login').click(function(){
    $('#loginDiv').toggle('fade',300);

    // Set the effect type
    var effect = 'slide';

    // Set the options for the effect type chosen
    var options = { direction: "left" };

    // Set the duration (default: 400 milliseconds)
    var duration = 300;
    $('.left-menu').toggle(effect, options, duration);

  });

  $('#filter-icon').mouseover(function(){
    $('#filter-filter').show();
  });
  $('#filter-icon').mouseout(function(){
    $('#filter-filter').hide();
  });
  $('#filter-icon').click(function(){
    $('#filter-btn').hide();
    $('#filter').slideDown('fast');
  });

  $('#hide-filter').click(function(){
    $('#filter').slideUp('fast');
    $('#filter-btn').show();
  });
});
