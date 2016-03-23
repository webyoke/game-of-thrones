$(document).foundation();

var Art = {

    mount: function(){

        this.$artModal = $('#art-modal');
        this.$currentArt = $('#current-art');

        var that = this;

        console.log(this.$artModal);

        $('.art').on('click','img',function(){
            that.$currentArt.attr('src',$(this).attr('src')); 
            that.$artModal.foundation('reveal','open');
        });

    }//mount

};
