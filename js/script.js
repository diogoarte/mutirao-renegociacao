var slidersSelectedIndex = [
  {lastSelected: 0},
  {lastSelected: 0},
  {lastSelected: 0},
  {lastSelected: 0}
]

var fbUrl = "http://sebrae.com.br/renegociacao";
var twUrl = "http://sebrae.com.br/renegociacao";
var zapUrl = "whatsapp://send?text="+encodeURI("O Mutirão da renegociação separou umas dicas para quem está com a empresa endividada http://sebrae.com.br/renegociacao");

$(document).ready(function () {

  $("#abrirModal").click(function(){
    $(".modalDialog").show( "slow" );
  });

  $("#close").click(function(){
    $(".modalDialog").hide( "slow" );
  });

  openCity("dicas1", 0, $('.menuSecundario li a').first());

  $('.slider').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 3,
    adaptiveHeight: true,
    arrows:false,
  });

  $('.thumb').on('click', function(e){
    e.preventDefault();
    var videoUrl = $(this).data('video');
    var videoTitle = $(this).data('title');
    if(videoUrl != undefined){
      $("#modalIframe").iziModal({
        zindex: 99999999,
        title: videoTitle,
        history: false,
        // subtitle: 'A gorgeous nature time lapse.', //Modal subtitle
        fullscreen: false, //Icon to expand modal to fullscreen
        headerColor: 'rgb(51, 76, 123)', //Color of modal header. Hexa colors allowed.
        overlayColor: 'rgba(0, 0, 0, 0.4)', //Color of overlay behind the modal
        iconColor: '',
        iconClass: 'icon-chat',
        iframe: true, //In this example, this flag is mandatory. Izimodal needs to understand you will call an iFrame from here
        iframeURL: videoUrl
      });
      $('#modalIframe').iziModal('open', this); // Do not forget the "this"
    }
  })

  $("#btnFacebook").on("click", function(e){
    window.open(fbUrl, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=200,left=200,width=800,height=600");
  });
  $("#btnTwitter").on("click", function(e){
    window.open(twUrl, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=200,left=200,width=800,height=600");;
  });
  $("#btnWhatsapp").on("click", function(e){
    window.open(zapUrl, "_blank");
  })

  $(document).on('changeUrl', function(event, url){
    fbUrl = "http://www.facebook.com/sharer/sharer.php?u="+url;
    twUrl = "https://twitter.com/share?url="+url;
  });

  getShareUrl(0,0);

});

function openCity(cityName, index, elem) {
    $('.city').hide();
    document.getElementById(cityName).style.display = "block";
    $('.menuSecundario li a').removeClass('active');
    $(elem).addClass('active');
    getShareUrl(index, slidersSelectedIndex[index].lastSelected);
}

function isInt(n){
    return Number(n) === n && n % 1 === 0;
}

function getShareUrl(slider, sliderIndex){
  slidersSelectedIndex[slider].lastSelected = sliderIndex;
  if(isInt(sliderIndex)){
    // var ids = [
    //   [1, 2],
    //   [3,4,5,6,7,8],
    //   [9,10,11,12],
    //   [13,14,15]
    // ];

    var ids = [
      [2],
      [3,4,5,6,7,8],
      [9,10,11,12],
      [13,14,15]
    ];

    var url = 'http://sebrae.com.br/renegociacao/index.php?id='+ids[slider][sliderIndex];
    $(document).trigger( "changeUrl", [url] );
  }
}


jQuery(document).ready(function ($) {

            var jssor_options = {
              $AutoPlay: false,
              $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Cols: 7,
                $Align: 0,
                $NoDrag: true
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_options);
            var jssor_2_slider = new $JssorSlider$("jssor_2", jssor_options);
            var jssor_3_slider = new $JssorSlider$("jssor_3", jssor_options);
            var jssor_4_slider = new $JssorSlider$("jssor_4", jssor_options);
            jssor_2_slider.$On($JssorSlider$.$EVT_POSITION_CHANGE,function(position,fromPosition){ getShareUrl(1,position); });
            jssor_3_slider.$On($JssorSlider$.$EVT_POSITION_CHANGE,function(position,fromPosition){ getShareUrl(2,position); });
            jssor_4_slider.$On($JssorSlider$.$EVT_POSITION_CHANGE,function(position,fromPosition){ getShareUrl(3,position); });
            jssor_1_slider.$On($JssorSlider$.$EVT_POSITION_CHANGE,function(position,fromPosition){ getShareUrl(0,position); });



            /*responsive code begin*/
            /*you can remove responsive code if you don't want the slider scales while window resizing*/
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 600);
                    jssor_1_slider.$ScaleWidth(refSize);
                    jssor_2_slider.$ScaleWidth(refSize);
                    jssor_3_slider.$ScaleWidth(refSize);
                    jssor_4_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            /*responsive code end*/
        });


// SMOOTH SCROLL
 $(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});


// TEXTO RENEGOCIAÇÃO
$(document).ready(function() {
  var showChar = 538;
  var ellipsestext = "";
  var moretext = "Ler mais";
  var lesstext = "Fechar";
  $('.more').each(function() {
    var content = $(this).html();

    if(content.length > showChar) {

      var c = content.substr(0, showChar);
      var h = content.substr(showChar-1, content.length - showChar);

      var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

      $(this).html(html);
    }

  });

  $(".morelink").click(function(){
    if($(this).hasClass("less")) {
      $(this).removeClass("less");
      $(this).html(moretext);
    } else {
      $(this).addClass("less");
      $(this).html(lesstext);
    }
    $(this).parent().prev().toggle();
    $(this).prev().toggle();
    $(window).trigger('resize.px.parallax');
    return false;
  });
});
