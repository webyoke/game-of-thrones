Enact.react_class.FieldOptions.Code = React.createClass({

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
            <div>
                <label>Show Line Numbers?</label>
                <select name='linenums' defaultValue={this.props.options.linenums} onChange={this.onChange}>
                    <option value='0'>No</option>
                    <option value='1'>Yes</option>
                </select>
            </div>
        );
    }//render

});
