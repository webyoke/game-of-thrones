Enact.react_class.EmailSubscriptions = React.createClass({

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
            subscriptions.push(<Enact.react_class.SingleEmailSubscription sub={sub} owner={that} key={sub.id}/>);
        });

        return (
        <div>
            <div className='row collapse'>
                <div className='small-12 medium-6 columns'>
                    <h4>
                        <span className='fi-book icon' style={{ marginRight : '12px', fontSize : '.85em' }}></span>
                        Email Newsletter Subscriptions
                    </h4>
                </div>
                <div className='small-12 medium-6 columns text-right mobile-text-center'>
                    <Enact.react_class.ButtonWithLoad
                        text='Export'
                        onClick={this.onExport}
                        loading={this.state.loading_export}
                    />
                </div>
            </div>
            <div className='row collapse primary-viewport'>

                <div className={'small-12 columns data'} style={{ height : this.getNavHeight() }}>

                    <div className='fixed-bar'>

                        <div className='search-bar'>
                            <input ref='search' type='text' defaultValue={this.state.search_for} placeholder='Search...' onChange={this.searchFor} />
                        </div>

                        <div className='row collapse headings'>
                            <div className='small-6 columns'>{this.sortHeading('Email','email')}</div>
                            <div className='small-2 columns'>{this.sortHeading('IP','ip_address')}</div>
                            <div className='small-2 columns'>{this.sortHeading('Created','created_on')}</div>
                            <div className='small-2 columns'></div>
                        </div>

                    </div>
            
                    <div className={this.noDataClass()}>No one has subscribed yet!</div>
                    <div className={this.noSearchDataClass()}>No subscriptions found!</div>

                    {this.jScrollData({ types : subscriptions })}

                </div>
            
            </div>
        </div>
        );

    }//render

});


Enact.react_class.SingleEmailSubscription = React.createClass({

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
                <div className='row datum-row'>
                    <div className='small-12 medium-6 columns'>
                        {this.props.sub.email}
                    </div>
                    <div className='small-12 medium-2 columns'>
                        {this.props.sub.ip_address}
                    </div>
                    <div className='small-12 medium-2 columns'>
                        {Enact.formatDate(this.props.sub.created_on)}
                    </div>
                    <div className='small-2 columns text-right'>
                        <div className='button warning fi-x icon' onClick={this.onRemove} title='Remove subscriber'></div>
                    </div>
                </div>
            );
    }//render

});
