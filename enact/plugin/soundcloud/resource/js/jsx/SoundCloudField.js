Enact.react_class.Fields.SoundCloud = React.createClass({displayName: "SoundCloud",

    mixins : [Enact.react_class.Fields.BaseField],

    widget_url : 'https://w.soundcloud.com/player/?url={0}', 

    store: function(){
        this.props.field.value = this.state.field; 
    },//store

    getInitialState: function(){

        console.log('SC field',this.props.field);

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
        var v = event.target.value;
        this.setState(function(state){
            state.field.value = v;
            return state;
        });
    },//onChange

    getIframe: function(){

        if(!this.state.field.value){
            return null;
        }//if

        var src = this.widget_url.format(encodeURIComponent(this.state.field.value));

        src += '?' + $.param(this.state.field.options);

        var props = {
                scrolling : 'no',
                frameBorder : 'no',
                width : '100%',
                src : src
            };

        return React.createElement(
                'iframe',
                props
            );

    },//updateIframe

    showOptions: function(){
        Enact.editModal.open(React.createElement(Enact.react_class.Fields.SoundCloudOptions, {owner: this, field: this.props.field, options: this.state.field.options}));
    },//showOptions

    updateOptions: function(options){
        this.setState(function(state){
            state.options = options;
            return state;
        });
    },//changeOptions

    render: function(){

        console.log(this.props.field);

        return (
                React.createElement("div", null, 
                    React.createElement("div", {className: "fi-cog", onClick: this.showOptions, style: { display: 'inline-block',width:'3%'}}), 
                    React.createElement("input", {type: "text", style: { display: 'inline-block',width:'96%'}, defaultValue: this.state.field.value, onChange: this.onChange, placeholder: "Paste SoundCloud URL..."}), 
                    this.getIframe()
                )
            );

    }//render

});


Enact.react_class.Fields.SoundCloudOptions = React.createClass({displayName: "SoundCloudOptions",

    onUpdate: function(){
        this.props.owner.updateOptions(this.props.options);
        Enact.editModal.close();
    },//onUpdate

    changeOption: function(event){
        this.props.options[event.target.getAttribute('name')] = (event.target.getAttribute('type') == 'checkbox') ? event.target.checked : event.target.value;
    },//changeOption

    render : function(){

        var that = this,
            options = [],
            keys = _.keys(this.props.options).reverse();

        _.each(keys,function(name,i){

            var meta = _.findWhere(SoundCloudPlayerOptions,{ name : name }),
                value = that.props.options[name],
                input;

            if(meta.type == 'checkbox'){
                input = (
                        React.createElement("div", {className: "checkbox-con clearfix"}, 
                            React.createElement("input", {type: meta.type, name: meta.name, defaultChecked: value, onChange: that.changeOption}), 
                            React.createElement("label", null, "On/Off")
                        )
                    );
            } else {
                input = React.createElement("input", {type: meta.type, name: meta.name, defaultValue: value, onChange: that.changeOption});
            }//el

            options.push((
                    React.createElement("div", {className: "row collapse", style: { borderBottom : '1px solid #7b7b7b', padding : '8px 0px'}, key: i}, 
                        React.createElement("div", {className: "small-12 medium-6 columns"}, 
                            React.createElement("div", {style: { paddingRight : '12px'}}, 
                                React.createElement("label", {style: { paddingTop : '0px'}}, meta.name), 
                                React.createElement("small", null, meta.tip)
                            )
                        ), 
                        React.createElement("div", {className: "small-12 medium-6 columns"}, 
                            input
                        )
                    )
                ));
        });

        return (
                React.createElement("div", null, 
                    React.createElement("div", {className: "text-center"}, 
                        React.createElement("h5", null, "SoundCloud Player Options for \"", this.props.field.name, "\""), 
                        React.createElement("div", {className: "button", onClick: this.onUpdate}, "Update")
                    ), 
                    options
                )
            );

    }//render

});
