Enact.react_class.Fields.Instagram = React.createClass({displayName: "Instagram",

    mixins : [Enact.react_class.Fields.BaseField],

    statics: {
        included_embed : false
    },//statics

    componentWillMount: function(){
        if(!Enact.react_class.Fields.Instagram.included_embed){
            $('body').append('<script async defer src="//platform.instagram.com/en_US/embeds.js"></script>'); 
        }//if
    },//componentWillMount

    store: function(){
        this.props.field.value = this.state.field; 
    },//store

    getInitialState: function(){

        console.log('Instagram field',this.props.field);

        var field = this.props.field.value,
            value = null,
            options = this.props.field.options;

        if(field){
            field = JSON.parse(field);
            value = field.value;
            options = field.options;
        }//if

        return {
            field : {
                value : value,
                options : options
            }
        };

    },//getInitialState

    onChange: function(event){
        var v = event.target.value,
            that = this;
        this.setState(function(state){
            state.field.value = v;
            return state;
        },function(){
            that.requestData();
        });

    },//onChange

    requestData : function(){
        var that = this;
        $.ajax({
            url : 'https://api.instagram.com/oembed?omitscript=true&url=' + this.state.field.value,
            type : 'GET',
            dataType : 'jsonp',
            success:function(r){
                that.setState(function(state){
                    state.field.options = r;
                    return state;
                },function(){
                    instgrm.Embeds.process()
                });
                console.log(r);
            }//success
        });
    },//requestData

    render: function(){

        console.log(this.props.field);

        var gram = (this.state.field.options && this.state.field.options.html) ? this.state.field.options.html : null;

        if(gram){
            gram = React.createElement("div", {dangerouslySetInnerHTML: { __html : gram}});
        }//if

        return (
                React.createElement("div", null, 
                    React.createElement("input", {type: "text", defaultValue: this.state.field.value, onChange: this.onChange, placeholder: "Paste Instagram URL..."}), 
                    gram
                )
            );

    }//render

});
