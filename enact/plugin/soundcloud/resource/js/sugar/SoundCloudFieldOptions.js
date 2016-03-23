Enact.react_class.FieldOptions.SoundCloud = React.createClass({

    write : function(){
        return this.state.options;
    },//store

    getInitialState: function(){
        return {
                options : this.props.options
            };
    },//getInitialState

    onChange: function(event){

        var e = event,
            target = e.target,
            name = target.getAttribute('name'),
            type = target.getAttribute('type'),
            v;

        if(type == 'checkbox'){
            v = target.checked;
        } else {
            v = target.value;
        }//el

        this.setState(function(state){
            state.options[name] = v; 
            return state;
        });

    },//onChange

    toggleAllow: function(name){

        var opt = this.state.options[name],
            options = this.state.options;

        if(!opt){
            options[name] = null;
        } else {
            delete options[name];
        }//el

        this.setState({ options : options });

    },//toggleAllow

    toggleDefault: function(name,checked){

        this.setState(function(state){
            state.options[name] = (!checked) ? null : '';
            return state;
        });

    },//toggleDefault

    render : function(){

        var that = this,
            options = [];

        SoundCloudPlayerOptions.map(function(d,i){
            options.push(<Enact.react_class.FieldOptions.SoundCloudOption d={d} key={i} owner={that}/>);
        });

        console.log(this.state.options);

        return (
                <div>
                    {options} 
                </div>
            );

    }//render

});

Enact.react_class.FieldOptions.SoundCloudOption = React.createClass({

    onChangeAllow: function(){
        this.props.owner.toggleAllow(this.props.d.name);
    },//onChangeAllow

    onToggleDefault: function(event){
        this.props.owner.toggleDefault(this.props.d.name,event.target.checked);
    },//onToggleDefault

    render: function(){

        var opt = this.props.owner.state.options[this.props.d.name],
            allowed = false,
            default_cx = false,
            default_value = null,
            input;

        if(opt !== undefined){
            allowed = true;
            if(opt !== null){
                default_cx = true;
                default_value = opt;
            }//if
        }//if

        if(this.props.d.type == 'checkbox'){

            input = (
                    <div className='checkbox-con clearfix' style={{margin:'0 auto',width:'25%'}}>
                        <input name={this.props.d.name} type={this.props.d.type} defaultChecked={default_value} onChange={this.props.owner.onChange} defaultValue={default_value}/>
                        <label>On/Off</label>
                    </div>
                );

        } else {
            input = <input name={this.props.d.name} type={this.props.d.type} defaultValue={default_value} onChange={this.props.owner.onChange} defaultValue={default_value}/>;
        }//el

        return (
                <div className='row collapse' style={{borderBottom:'1px solid #7b7b7b'}}>
                    <div className='small-2 columns text-center'>
                        <label>Allowed?</label>
                        <input type='checkbox' onChange={this.onChangeAllow} defaultChecked={allowed}/>
                    </div>

                    <div className='small-6 columns'>
                        <label>{this.props.d.name}</label>
                        <small>{this.props.d.tip}</small>
                    </div>
                    <div className='small-4 columns text-center'>
                        <div className={(!allowed) ? 'hide' : ''}>
                            <label>Has Default Value?</label>
                            <input type='checkbox' name='default' onChange={this.onToggleDefault} defaultChecked={default_cx}/>
                            <div className={(!default_cx) ? 'hide' : ''}>
                                {input}
                            </div>
                        </div>
                    </div>
                </div>
            );

    }//render

});
