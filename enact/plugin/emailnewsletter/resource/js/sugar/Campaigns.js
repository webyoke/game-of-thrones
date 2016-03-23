Enact.react_class.Campaigns = React.createClass({

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
            campaigns.push(<Enact.react_class.SingleCampaign campaign={campaign} owner={that} key={i}/>);
        });

        return (
        <div>
            <div className='row collapse'>
                <div className='small-12 medium-6 columns'>
                    <h4>
                        <span className='fi-book icon' style={{ marginRight : '12px', fontSize : '.85em' }}></span>
                        Campaigns
                    </h4>
                </div>
                <div className='small-12 medium-6 columns text-right mobile-text-center'>
                    <a href={Enact.cpSlug('email-newsletter/campaigns/create')} className='button'>New Campaign</a>
                </div>
            </div>
            <div className='row collapse primary-viewport'>

                <div className={'small-12 columns data'} style={{ height : this.getNavHeight() }}>

                    <div className='fixed-bar'>

                        <div className='search-bar'>
                            <input ref='search' type='text' defaultValue={this.state.search_for} placeholder='Search...' onChange={this.searchFor} />
                        </div>

                        <div className='row collapse headings'>
                            <div className='small-5 columns'>{this.sortHeading('Subject','subject')}</div>
                            <div className='small-2 columns'>{this.sortHeading('template','template')}</div>
                            <div className='small-1 columns'>{this.sortHeading('Total','total_sent')}</div>
                            <div className='small-1 columns'>{this.sortHeading('Viewed','total_viewed')}</div>
                            <div className='small-1 columns'>{this.sortHeading('Clicked','total_click_through')}</div>
                            <div className='small-2 columns'>{this.sortHeading('Created','created_on')}</div>
                        </div>

                    </div>
            
                    <div className={this.noDataClass()}>No campaigns created yet!</div>
                    <div className={this.noSearchDataClass()}>No campaigns found!</div>

                    {this.jScrollData({ types : campaigns })}

                </div>
            
            </div>
        </div>
        );

    }//render

});


Enact.react_class.SingleCampaign = React.createClass({

    render: function(){
        return (
                <div className='row datum-row'>
                    <div className='small-12 medium-5 columns'>
                        <a href={Enact.cpSlug('email-newsletter/campaigns/' + this.props.campaign.id)}>{this.props.campaign.subject}</a>
                    </div>
                    <div className='small-12 medium-2 columns'>
                        {this.props.campaign.template}
                    </div>
                    <div className='small-12 medium-1 columns'>
                        {this.props.campaign.total_sent}
                    </div>
                    <div className='small-12 medium-1 columns'>
                        {this.props.campaign.total_viewed}
                    </div>
                    <div className='small-12 medium-1 columns'>
                        {this.props.campaign.total_click_through}
                    </div>
                    <div className='small-12 medium-2 columns'>
                        {Enact.formatDate(this.props.campaign.created_on)}
                    </div>
                </div>
            );
    }//render

});
