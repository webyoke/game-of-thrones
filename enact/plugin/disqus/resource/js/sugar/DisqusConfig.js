Enact.react_class.DisqusConfig = React.createClass({

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
            <div>
                <h1>Configure Disqus</h1>

                <label>Site Short-Code</label>
                <input type='text' defaultValue={this.props.shortcode} onChange={this.onChangeShortCode}/>

                <div className='button' onClick={this.onUpdate}>Update</div>

            </div>
        );
    }//render

});
