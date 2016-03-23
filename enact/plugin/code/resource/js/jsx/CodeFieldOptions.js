Enact.react_class.FieldOptions.Code = React.createClass({displayName: "Code",

    getDefaultProps: function(){
        return { 
            options : {
                linenums : '0'
            } 
        };
    },//getDefaultProps

    onChange: function(event){
        this.props.options.linenums = event.target.value;
    },//onChange

    render : function(){
        return (
            React.createElement("div", null, 
                React.createElement("label", null, "Show Line Numbers?"), 
                React.createElement("select", {name: "linenums", defaultValue: this.props.options.linenums, onChange: this.onChange}, 
                    React.createElement("option", {value: "0"}, "No"), 
                    React.createElement("option", {value: "1"}, "Yes")
                )
            )
        );
    }//render

});
