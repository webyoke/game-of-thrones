Enact.react_class.CreateCampaign = React.createClass({displayName: "CreateCampaign",

    test : 0,

    getInitialState: function(){

        var state = { 
                data    : {
                    variables : {}
                },
                errors  : {},
                test_loading : false,
                campaign_loading : false
            };

        if(this.props.templates.length){
            state.data.template = this.props.templates[0].template;
        }//if

        console.warn(state);

        return state;

    },//getInitialState

    checkForErrors: function(){

        var that        = this,
            errors      = {},
            required    = _.where(this.props.templates, { required : true });

        if(!this.state.data.subject){
            errors.subject = 'You must give the campaign a subject'; 
        }//if

        if(!this.state.data.template){
            errors.subject = 'You must select a template for the campaign'; 
        }//if

        required.map(function(r){
            if(!that.state.data.variables[r.name] == ''){
                errors[r.name] = 'You must enter a value for ' + r.name;
            } else if(r.type == 'number' && !_.isFinite(that.state.data.variables[r.name])){
                errors[r.name] = r.name + ' must be a numeric value';
            }//el
        });

        this.setState({ errors : errors });

        return _.keys(errors).length;

    },//checkForErrors

    getError: function(key){

        if(this.state.errors[key]){
            return React.createElement("div", {className: "enact-error"}, this.state.errors[key])
        }//if

        return null;

    },//getError

    onChange: function(event){
        this.state.data[event.target.getAttribute('name')] = event.target.value;
    },//onChange

    onChangeVariable: function(event){
        this.state.data.variables[event.target.getAttribute('name')] = event.target.value;
    },//onChange

    onTest: function(event){
        this.test = 1;
        this.onCreate(event);
    },//onTest

    onCreate: function(event){

        if(this.checkForErrors()){
            Enact.notify.alert('Please fix the errors listed in red and try again',true);
            return;
        }//if

        if(!this.test && !confirm('Are you sure you want to create this campaign? This will email everyone subscribed to your newsletter and cannot be stopped. Make sure you have tested before hand!')){
            return;
        }//if

        var data = {
                data : this.state.data,
                test : this.test
            };

        if(!this.test){
            this.setState({ campaign_loading : true });
        } else {
            this.setState({ test_loading : true });
        }//el

        this.test = 0;

        var that = this;

        Enact.ajax({
            url : 'email-newsletter/campaigns/create',
            type : 'POST',
            data : data,
            success:function(r){

                if(data.test){
                    that.setState({ test_loading : false });
                }//el

                if(!r.e){
                    Enact.notify.alert(r.d);
                    if(!data.test){
                        window.location.href = Enact.cpSlug('email-newsletter/campaigns/');
                    }//if
                } else {
                    Enact.notify.alert(r.d || "Something went wrong, unable to send campaign. Make sure your email is configured properly.",true);
                }//el

            }//success
        });

    },//onCreate
    
    render: function(){

        var that        = this,
            templates   = [],
            variables   = [];

        this.props.templates.map(function(t,i){
            templates.push(React.createElement("option", {value: t.template, key: i}, t.template));
        });

        if(this.state.data.template){
            var template = _.findWhere(this.props.templates, { template : this.state.data.template });
            if(template.variables.length){
                template.variables.map(function(variable,i){
                    var tip = (variable.tip) ? React.createElement("small", null, variable.tip) : null;
                    variables.push((
                            React.createElement("div", {key: i}, 
                                React.createElement("label", null, variable.name), 
                                tip, 
                                React.createElement("input", {type: variable.type, name: variable.name, onChange: that.onChangeVariable}), 
                                that.getError(variable.name)
                            )
                        ));
                });
            }//if
        }//if

        return (
                React.createElement("div", null, 
                    React.createElement("div", {className: "row collapse"}, 
                        React.createElement("div", {className: "small-12 medium-6 columns"}, 
                            React.createElement("h4", null, "Create Campaign")
                        ), 
                        React.createElement("div", {className: "small-12 medium-6 columns text-right mobile-text-center button-group"}, 
                            React.createElement(Enact.react_class.ButtonWithLoad, {
                                text: "Test", 
                                loading: this.state.test_loading, 
                                onClick: this.onTest}
                            ), 
                            React.createElement(Enact.react_class.ButtonWithLoad, {
                                text: "Create & Send", 
                                loading: this.state.campaign_loading, 
                                onClick: this.onCreate}
                            )
                        )
                    ), 
                    React.createElement("label", null, "Subject"), 
                    React.createElement("small", null, "The subject line of the campaign email"), 
                    React.createElement("input", {type: "text", name: "subject", onChange: this.onChange}), 
                    this.getError('subject'), 
                    React.createElement("label", null, "Template"), 
                    React.createElement("small", null, "The template used for the body of the campaign email, if you have no templates created talk to your developer"), 
                    React.createElement("select", {name: "template", onChange: this.onChange}, 
                        templates
                    ), 
                    this.getError('template'), 

                    variables

                )
            );

    }//render

});
