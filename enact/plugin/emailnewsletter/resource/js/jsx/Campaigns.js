Enact.react_class.Campaigns = React.createClass({displayName: "Campaigns",

    mixins: [Enact.react_class.DataFeedAdapter.Helper],

    does_not_use_groups : true,

    bootstrap_url : 'email-newsletter/campaigns/data',

    component_name : 'Campaigns',

    default_sort : 'created_on',

    searchFunction: function(cache,s) {
        var exp = new RegExp(s.toLowerCase());
        return _.filter(cache,function(d){
            return exp.test(d.subject.toLowerCase());
        });
    },//searchFunction

    render: function(){

        var that = this,
            campaigns = [];

        this.state.types.map(function(campaign,i){
            campaigns.push(React.createElement(Enact.react_class.SingleCampaign, {campaign: campaign, owner: that, key: i}));
        });

        return (
        React.createElement("div", null, 
            React.createElement("div", {className: "row collapse"}, 
                React.createElement("div", {className: "small-12 medium-6 columns"}, 
                    React.createElement("h4", null, 
                        React.createElement("span", {className: "fi-book icon", style: { marginRight : '12px', fontSize : '.85em'}}), 
                        "Campaigns"
                    )
                ), 
                React.createElement("div", {className: "small-12 medium-6 columns text-right mobile-text-center"}, 
                    React.createElement("a", {href: Enact.cpSlug('email-newsletter/campaigns/create'), className: "button"}, "New Campaign")
                )
            ), 
            React.createElement("div", {className: "row collapse primary-viewport"}, 

                React.createElement("div", {className: 'small-12 columns data', style: { height : this.getNavHeight()}}, 

                    React.createElement("div", {className: "fixed-bar"}, 

                        React.createElement("div", {className: "search-bar"}, 
                            React.createElement("input", {ref: "search", type: "text", defaultValue: this.state.search_for, placeholder: "Search...", onChange: this.searchFor})
                        ), 

                        React.createElement("div", {className: "row collapse headings"}, 
                            React.createElement("div", {className: "small-5 columns"}, this.sortHeading('Subject','subject')), 
                            React.createElement("div", {className: "small-2 columns"}, this.sortHeading('template','template')), 
                            React.createElement("div", {className: "small-1 columns"}, this.sortHeading('Total','total_sent')), 
                            React.createElement("div", {className: "small-1 columns"}, this.sortHeading('Viewed','total_viewed')), 
                            React.createElement("div", {className: "small-1 columns"}, this.sortHeading('Clicked','total_click_through')), 
                            React.createElement("div", {className: "small-2 columns"}, this.sortHeading('Created','created_on'))
                        )

                    ), 
            
                    React.createElement("div", {className: this.noDataClass()}, "No campaigns created yet!"), 
                    React.createElement("div", {className: this.noSearchDataClass()}, "No campaigns found!"), 

                    this.jScrollData({ types : campaigns })

                )
            
            )
        )
        );

    }//render

});


Enact.react_class.SingleCampaign = React.createClass({displayName: "SingleCampaign",

    render: function(){
        return (
                React.createElement("div", {className: "row datum-row"}, 
                    React.createElement("div", {className: "small-12 medium-5 columns"}, 
                        React.createElement("a", {href: Enact.cpSlug('email-newsletter/campaigns/' + this.props.campaign.id)}, this.props.campaign.subject)
                    ), 
                    React.createElement("div", {className: "small-12 medium-2 columns"}, 
                        this.props.campaign.template
                    ), 
                    React.createElement("div", {className: "small-12 medium-1 columns"}, 
                        this.props.campaign.total_sent
                    ), 
                    React.createElement("div", {className: "small-12 medium-1 columns"}, 
                        this.props.campaign.total_viewed
                    ), 
                    React.createElement("div", {className: "small-12 medium-1 columns"}, 
                        this.props.campaign.total_click_through
                    ), 
                    React.createElement("div", {className: "small-12 medium-2 columns"}, 
                        Enact.formatDate(this.props.campaign.created_on)
                    )
                )
            );
    }//render

});
