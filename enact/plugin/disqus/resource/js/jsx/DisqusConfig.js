Enact.react_class.DisqusConfig = React.createClass({displayName: "DisqusConfig",

    onUpdate: function(){

        if(!this.props.shortcode){
            Enact.notify.alert('You must enter a shortcode!',1);
            return;
        }//if

        Enact.ajax({
            url: '/admin/plugin/disqus',
            type: 'POST',
            data : this.props,
            success: function(r){
                if(!r.e){
                    Enact.notify.alert('Updated!');
                } else {
                    Enact.notify.alert(r.d,1);
                }//el
            }//success
        });

    },//onUpdate

    onChangeShortCode: function(event){
        this.props.shortcode = event.target.value;
    },//onChangeShortCode

    render: function(){
        return (
            React.createElement("div", null, 
                React.createElement("h1", null, "Configure Disqus"), 

                React.createElement("label", null, "Site Short-Code"), 
                React.createElement("input", {type: "text", defaultValue: this.props.shortcode, onChange: this.onChangeShortCode}), 

                React.createElement("div", {className: "button", onClick: this.onUpdate}, "Update")

            )
        );
    }//render

});
