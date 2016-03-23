var menu_juice = {};
menu_juice.support = {};
menu_juice.options = {
    breakPoint:{type:'em',width:40.063},
    setBreakPoint:function(type,width){
        menu_juice.options.breakPoint.type=type;
        menu_juice.options.breakPoint.width=parseFloat(width);
    },
    //two types: 
    //  - panel
    //  - dropdown
    'type':'panel'
};

console.log(menu_juice.options);
menu_juice.support.pxToEms = function(px){
    return px / parseFloat($("body").css("font-size"));
}//pxToEms

menu_juice.support.windowWidthEms = function(){
    return menu_juice.support.pxToEms($(window).width());
}

menu_juice.support.isMobile = function(){
    if(menu_juice.options.breakPoint.type == 'px'){
        if(parseFloat($(window).width()) <= menu_juice.options.breakPoint.width){
            return true;
        }//if
    }
    else if(menu_juice.options.breakPoint.type <= 'em'){
        if(menu_juice.support.windowWidthEms() <= menu_juice.options.breakPoint.width){
            return true;
        }//if
    }//elif
    else {
        console.log('Menu Juice | You have an invalid break-point type set: must be "px" or "em"');
    }//el
    return false;
}//isMobile

menu_juice.navBack = '<div class="mobile-toggle-nav-back" title="Go Back">{0}<br>&#8592;</div>';
menu_juice.navParent = '<a class="parent-item" href="{0}"><b>{1}</b></a>';

menu_juice.multiLevelStack = [];
menu_juice.multiLevel = '<div class="mj-multi-level-dropdown hide"></div>';
menu_juice.hoverEvents = function(){

    menu_juice.$main.on('mouseenter','.item',function(event){
        var that = this;
        setTimeout(function(){
            if($(that).length && $(that).is(':hover')){
                menu_juice.show(that,event);
            }//if
        },125);
        event.stopPropagation();
    });

    menu_juice.$mainFly.on('mouseleave',function(event){
        menu_juice.isMenuJuiceHovered(event);
    });

    menu_juice.$main.on('mouseleave',function(event){
        menu_juice.isMenuJuiceHovered(event);
    });

    menu_juice.$mainFly.on('mouseenter','.mj-dropdown .has-sub-menu',function(event){

        //if(!$(this).hasClass('mj-flying')) return;

        //$(this).addClass('mj-flying');
        if(!$(this).next().hasClass('mj-multi-level-dropdown')){
            $(this).next().wrap('<div class="mj-multi-level-dropdown">');
        }//if
        var $e = $(this).next().children('.sub-menu').eq(0).removeClass('hide'),
            that = this;
        $e.css('left',menu_juice.$fly.width());
        $e.css('top',-$(this).height());
        $e.css('width',menu_juice.$fly.width());

        $e.on('mouseleave',function(){
            //$(that).removeClass('mj-flying');
            $e.addClass('hide');
            $e.off('mouseleave');
        });

    });


}//hoverEvents

menu_juice.isMenuJuiceHovered = function(event){
    event.stopPropagation();
    setTimeout(function(){
        if((menu_juice.$main.length && menu_juice.$main.is(':hover')) || (menu_juice.$mainFly.length && menu_juice.$mainFly.is(':hover'))){
            return;
        }//if
        menu_juice.hideActive();
    },400);
}//isMenuJuiceHovered

menu_juice.hoverEventsOff = function(){
    menu_juice.$main.off('mouseenter','.item');
    menu_juice.$main.off('mouseleave');
    menu_juice.$mainFly.off('mouseleave');
}//hoverEventsOff

menu_juice.clickEvents = function(){

    menu_juice.$main.on('click','.item',function(event){
        menu_juice.show(this,event);
        event.stopPropagation();
    });

    menu_juice.$toggle.on('click',function(event){

        if(menu_juice.$subMenu.hasClass('active') || !menu_juice.$main.hasClass('hide')){
            menu_juice.$subMenu.empty().removeClass('active').addClass('hide');
            menu_juice.$main.addClass('hide');
            menu_juice.$mainFly.removeClass('active');
        }//if
        else {
            menu_juice.$main.removeClass('hide');
        }//el

        event.stopPropagation();

    });

}//clickEvents

menu_juice.clickEventsOff = function(){
    $('body').off('click','.item');
    menu_juice.$toggle.off('click');
    $(document).off('click','.mobile-toggle-nav-back');
}//clickEventsOff

menu_juice.subMenuStack = [];
menu_juice.mobileEvents = function(){


    $('.menu-juice-flyout .has-sub-menu,.sub-menu-con .has-sub-menu').live('click',menu_juice.showMobileMenuItem);

    menu_juice.$subMenu.on('click','.mobile-toggle-nav-back',function(event){
        var pop = menu_juice.subMenuStack.pop();
        if(pop){
            $(this).parent().html(pop);
        }//if
        else {
            $(this).parent().empty().removeClass('active').addClass('hide');
            menu_juice.hideActive();
            menu_juice.$main.removeClass('hide');
        }//el
        event.stopPropagation();
    });

}//mobileEvents

menu_juice.showMobileMenuItem = function(event,index,that){
    var html = '',
        heading = '';
    if(index){
        html = menu_juice.$fly.html();
        heading = $(that).text(); 
    }//if
    else {
        menu_juice.subMenuStack.push($(this).parent().html());
        html = $(this).next().html();
        heading = $(this).text();
    }//if
    menu_juice.$subMenu.html(html).removeClass('hide').addClass('active');
    if($(that).attr('href')){
        menu_juice.$subMenu.prepend(menu_juice.navParent.replace('{0}',$(that).attr('href')).replace('{1}',heading));
    }//if
    menu_juice.$subMenu.prepend(menu_juice.navBack.replace('{0}',heading));
    menu_juice.$main.addClass('hide');
    event.stopPropagation();
    event.preventDefault();
}//showMobileMenuItem

menu_juice.mobileEventsOff = function(){
    $(document).off('click','.menu-juice-flyout .has-sub-menu,.sub-menu-con .has-sub-menu');
    $(document).off('click','.mobile-toggle-nav-back');
}//mobileEventsOff


menu_juice.show = function(that,event){

    menu_juice.hideActive();

    var index = $(that).index();
    $(that).addClass('active');
    this.$fly = menu_juice.$mainFly.find('.flyout-menu[data-mj-index="'+index+'"]');
    if(this.$fly.length){

        this.$mainFly.addClass('active');

        if(menu_juice.state=='small'){
            this.$main.addClass('hide');
            menu_juice.showMobileMenuItem(event,index,that);
            return;
        }//if

        if(menu_juice.options.type == 'dropdown'){
            //this.$fly.addClass('mj-dropdown').css({'left':$(event.target).offset().left,'width':$(event.target).width() * 1.5 }); 
            this.$fly.addClass('mj-dropdown').css({'left':$(event.target).offset().left}); 
            this.$fly.css('display','block');
        }//if
        else {
            this.$fly.css('display','block');
        }//el

        this.$fly.children('.mobile-toggle-nav-back').remove();

    }//if

    event.stopPropagation();

}//show

menu_juice.hideActive = function(){

    menu_juice.$main.find('.item').removeClass('active');

    if(this.$fly && this.$fly.length){
        this.$fly.css('display','none');
    }//if

    this.$mainFly.removeClass('active');

}//hideActive


menu_juice.flex = function(){
    if(!$('.menu-juice').length)
        return;

    if(menu_juice.flexed && menu_juice.support.isMobile() && menu_juice.state=='small'){
        return;
    }//if

    //support click events or hover events?
    if(menu_juice.support.isMobile() || Modernizr.touch){
        menu_juice.state = 'small';
        menu_juice.hoverEventsOff();
        menu_juice.clickEvents();
        menu_juice.mobileEvents();

        menu_juice.$mainFly.find('.sub-menu').addClass('hide');

        menu_juice.$mainFly.css('top',0);

        menu_juice.$main.addClass('hide');
        menu_juice.$toggle.removeClass('hide');
        menu_juice.$toggle.addClass('active');

    }//if
    else {
        menu_juice.state = 'full';
        menu_juice.clickEventsOff();
        menu_juice.mobileEventsOff();
        menu_juice.hoverEvents();

        if(!menu_juice.options.multiLevel){
            menu_juice.$mainFly.find('.sub-menu').removeClass('hide');
        }//if
        else {
            menu_juice.$mainFly.find('.sub-menu').addClass('hide');
        }//el

        menu_juice.$mainFly.css('top',menu_juice.$main.offset().top + menu_juice.$main.height());

        menu_juice.$main.removeClass('hide');
        menu_juice.$toggle.addClass('hide');
        menu_juice.$toggle.removeClass('active');

    }//el

    menu_juice.makeFixed();
    menu_juice.flexed = true;
};


menu_juice.highLightActive = function(){
    var slug = window.location.pathname;
    $('.menu-juice .item').each(function(){
        var index = $(this).index();
        var $topLink = $(this);

        var $fly = $('.menu-flyout-content').eq(index);
        if(!$fly.length){
            return;
        }//if
        $fly.find('a').each(function(){
            if($(this).attr('href')==slug){
                $(this).addClass('current-location');
                $topLink.addClass('current-location');
            }//if
        });

    });
}();

menu_juice.shouldFix = function(){
    if(menu_juice.$fixed){
        if( menu_juice.support.isMobile() && menu_juice.$fixed.hasClass('desktop-only') || 
            !menu_juice.support.isMobile() && menu_juice.$fixed.hasClass('mobile-only')
        ){
            return false;
        }//if
        return true;
    }//if
    return false;
}//shouldFix

menu_juice.makeFixed = function(){
    if(menu_juice.$fixed){
        menu_juice.$fixed.removeClass('fix');
    }//if

    if(menu_juice.shouldFix()) {
        menu_juice.fix();
    }//if
}//makeFixed

menu_juice.fix = function(){
    if(!menu_juice.$fixClearance){
        menu_juice.$fixed.after('<div id="mj-fix-clearance" class="hide"></div>');
        menu_juice.$fixClearance = $('#mj-fix-clearance');
    }//if

    var height = (menu_juice.support.isMobile()) ? menu_juice.$toggle.height() : menu_juice.$main.height();
    menu_juice.$fixClearance.height(height);

    var after = menu_juice.$fixed.attr('data-mj-fix-after');
    if(after){
        menu_juice.fixAfter(after); 
        return;
    }//if

    menu_juice.$fixed.addClass('fix'); 

}//fix

menu_juice.fixAfter = function(ele){
    if(!$('#'+ele).length) return;
    var after = $('#'+ele).offset().top,
        fixed = false,
        fix = function(){
            if(!menu_juice.shouldFix()) return;

            if(window.pageYOffset >= after && !fixed){
                menu_juice.$fixed.addClass('fix').removeClass('hide'); 
                fixed = true;
            }//if
            else if(window.pageYOffset < after && fixed){
                menu_juice.$fixed.removeClass('fix').addClass('hide'); 
                fixed = false;
            }//elif
        };
    fix();
    $(window).on('scroll',fix);
}//fixAfter

menu_juice.listen = function(){

    if(!$('.menu-juice').length) return;


    menu_juice.$main = $('.menu-juice');
    menu_juice.$fixed = $('.mj-fixed');

    menu_juice.options.type = menu_juice.$main.attr('data-mj-type') || 'panel';
    menu_juice.options.multiLevel = (menu_juice.options.type == 'dropdown' 
                                    && menu_juice.$main.attr('data-mj-dropdown') == 'multi-level') 
                                    ? true : false;

    menu_juice.$mainFly = $('.menu-juice-flyout');
    menu_juice.$toggle = $('.menu-juice-mobile-toggle');
    menu_juice.$subMenu = menu_juice.$mainFly.find('.sub-menu-con');

    $(window).bind('resize',menu_juice.flex);
    menu_juice.flex();

};

$(function(){
    menu_juice.listen();
});
