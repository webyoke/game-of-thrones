#Disqus Plugin for Enact CMS
Plugin for [Enact CMS](https://enactcms.com).

Allows embeding [Disqus](https://disqus.com) comments and comment counts.

##Functionality
Provides a custom field for use in your layouts that allows the embeding and toggeling (on/off) of a disqus comment
widget as well as getting the comment count for a particular page.

###Configuration
Once you install the plugin you will be asked to input your Disqus site short-code which is required so Disqus
knows who owns the comments.

####Use
Create a Disqus field for use and assign it to a layout your entries use, the author will have the ability to
toggle the comments on and off.

If for example you named the field `comments` you can output the disqus widget by calling:
```
{{ entry.comments }}
{# or you can call }}
{{ entry.comments.commentsHtml }}
```

To get the comment count call:
```
{{ entry.comments.commentsCount }}
```

If you want to embed the Disqus comments widget on a page not using a disqus field, you can do so by accessing the
plugin:
```
{{ enact.plugin.Disqus }}
{# or #}
{{ enact.plugin.Disqus.commentsHtml }}

{# get the comment count #}
{{ enact.plugin.Disqus.commentsCount }}
```
