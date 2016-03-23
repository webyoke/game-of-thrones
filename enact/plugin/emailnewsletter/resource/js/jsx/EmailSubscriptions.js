Enact.react_class.EmailSubscriptions = React.createClass({displayName: "EmailSubscriptions",

    mixins: [Enact.react_class.DataFeedAdapter.Helper],

    does_not_use_groups : true,

    bootstrap_url : 'email-newsletter/subscriptions/data',

    component_name : 'EmailSubscriptions',

    default_sort : 'created_on',

    searchFunction: function(cache,s) {
        var exp = new RegExp(s.toLowerCase());
        return _.filter(cache,function(d){
            return exp.test(d.email.toLowerCase());
        });
    },//searchFunction

    onExport: function(){

        var that = this;

        this.setState({ export_loading : true });
        window.location.href = Enact.cpSlug('email-newsletter/subscriptions/export');
        this.setState({ export_loading : false });

    },//onExport

    render: function(){

        var that = this,
            subscriptions = [];

        this.state.types.map(function(sub,i){
            subscriptions.push(React.createElement(Enact.react_class.SingleEmailSubscription, {sub: sub, owner: that, key: sub.id}));
        });

        return (
        React.createElement("div", null, 
            React.createElement("div", {className: "row collapse"}, 
                React.createElement("div", {className: "small-12 medium-6 columns"}, 
                    React.createElement("h4", null, 
                        React.createElement("span", {className: "fi-book icon", style: { marginRight : '12px', fontSize : '.85em'}}), 
                        "Email Newsletter Subscriptions"
                    )
                ), 
                React.createElement("div", {className: "small-12 medium-6 columns text-right mobile-text-center"}, 
                    React.createElement(Enact.react_class.ButtonWithLoad, {
                        text: "Export", 
                        onClick: this.onExport, 
                        loading: this.state.loading_export}
                    )
                )
            ), 
            React.createElement("div", {className: "row collapse primary-viewport"}, 

                React.createElement("div", {className: 'small-12 columns data', style: { height : this.getNavHeight()}}, 

                    React.createElement("div", {className: "fixed-bar"}, 

                        React.createElement("div", {className: "search-bar"}, 
                            React.createElement("input", {ref: "search", type: "text", defaultValue: this.state.search_for, placeholder: "Search...", onChange: this.searchFor})
                        ), 

                        React.createElement("div", {className: "row collapse headings"}, 
                            React.createElement("div", {className: "small-6 columns"}, this.sortHeading('Email','email')), 
                            React.createElement("div", {className: "small-2 columns"}, this.sortHeading('IP','ip_address')), 
                            React.createElement("div", {className: "small-2 columns"}, this.sortHeading('Created','created_on')), 
                            React.createElement("div", {className: "small-2 columns"})
                        )

                    ), 
            
                    React.createElement("div", {className: this.noDataClass()}, "No one has subscribed yet!"), 
                    React.createElement("div", {className: this.noSearchDataClass()}, "No subscriptions found!"), 

                    this.jScrollData({ types : subscriptions })

                )
            
            )
        )
        );

    }//render

});


Enact.react_class.SingleEmailSubscription = React.createClass({displayName: "SingleEmailSubscription",

    onRemove: function(){
        var that = this;
        Enact.ajax({
            url: 'email-newsletter/subscriptions/' + this.props.sub.id,
            type: 'DELETE',
            success: function(r){
                if(!r.e){
                    that.props.owner.removeType(that.props.sub);
                    Enact.notify.alert('Removed!');
                } else {
                    Enact.notify.alert('Could not remove subscription!',true);
                }//el
            }//success
        });
    },//onRemove

    render: function(){
        return (
                React.createElement("div", {className: "row datum-row"}, 
                    React.createElement("div", {className: "small-12 medium-6 columns"}, 
                        this.props.sub.email
                    ), 
                    React.createElement("div", {className: "small-12 medium-2 columns"}, 
                        this.props.sub.ip_address
                    ), 
                    React.createElement("div", {className: "small-12 medium-2 columns"}, 
                        Enact.formatDate(this.props.sub.created_on)
                    ), 
                    React.createElement("div", {className: "small-2 columns text-right"}, 
                        React.createElement("div", {className: "button warning fi-x icon", onClick: this.onRemove, title: "Remove subscriber"})
                    )
                )
            );
    }//render

});
