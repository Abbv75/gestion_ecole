
    $('.fa-search').mouseenter(function (){
        $('.search-txt').css('width','240px');
        $('.search-txt').css('padding','0 6px');
        $('.search-btn').css('background','white');
    });
    $('.fa-search').click(function(){
        $('.search-txt').change();
        let result=$('.search-txt').val();
        document.location.href = "inscription.php?search="+result;
    });
