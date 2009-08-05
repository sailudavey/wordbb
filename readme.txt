=== WordBB ===
Contributors: Hangman
Donate link: http://valadilene.org/wordbb
Tags: mybb, integration, bridge
Requires at least: 2.0.2
Tested up to: 2.8.2
Stable tag: trunk

This is a bridge between WordPress blogging platform and MyBB message board.

== Description ==

WordBB's main feature is creating a thread for each blog post in a particular section, so that the forum can be used as a replacement to the blog comment system. The WordPress side handles situations such as post editing and deletion. Similarly, the MyBB side takes account of the thread actions which are reflected on the corresponding WordPress post.
WordBB also allows linking between WordPress authors and MyBB users. In this way, when a blog post gets published, a thread is automatically created by the correct user.
WordBB does everything behind the scene and doesn't require any code modification or hack: just install the plugin and in a few seconds it will be up and running. Moreover it is fully customisable and fits nicely in WordPress's admin panel controls and style. WordPress and MyBB can run on different databases.

== Installation ==

In order to install WordBB just extract the "wordbb" directory in your WordPress plugins folder.
Then activate the plugin from your WP admin section, go to Plugins -> WordBB Configuration and set the required fields such as MyBB's root directory and URL.

Once installed, new sections in your admin panel will appear, such as WordBB Posts and WordBB Categories.
Also, in the Users section you'll be able to link WP users to existing MyBB users.

= Custom theme functions =

WordBB adds some functions which you can use in your WordPress theme:

- wordbb_thread_link() : echoes the URL of the thread corresponding to the current post in the WordPress Loop. 

- wordbb_get_thread_id() : returns the ID for the thread corresponding to the current post in the WordPress Loop. You can also use this function to check if your WP post must use the WP comment system (i.e. show the "Leave a reply box" at the bottom) or just show a link to the thread (something like "Discuss this post on the forums").

- wordbb_comments_popup_link([same parameters as wp_comments_popup_link]) : this one is the same as WordPress' comments_popup_link, except that it will show a link to the corresponding thread instead of the WP comments link if "Use MyBB as comment system" is checked and "Show MyBB posts as comments on WordPress" is unchecked in WordBB Configuration. Just replace wp_comments_popup_link with wordbb_comments_popup_link in your theme, and you're done.

- wordbb_last_comment_by($line) : echoes a "Last comment by user" line. You can customize it using the $line parameter, in which "$user" will be replaced with the username.

- wordbb_get_username() : returns the username for the MyBB user currently logged in.
- wordbb_get_avatar() : returns the avatar link for the MyBB user currently logged in.
- wordbb_get_pms() : returns an array with the personal messages of the MyBB user currently logged in.
- wordbb_get_lastvisit() : returns the last visit time for the MyBB user currently logged in, as a timestamp.
- wordbb_get_friendly_lastvisit() : returns the last visit time for the MyBB user currently logged in, as a "friendly" string.
- wordbb_get_userinfo() : returns an object containing information about the MyBB user currently logged in.

== Frequently Asked Questions ==

= Why you need this =
Just think of a "News" section in your message board with all the threads displayed as post entries on your WordPress site. Your users will be able to post comments using your MyBB forums instead of the integrated WordPress comment system.

= Known problems =
No known problems so far! :)

= I need X function, when will you add it? =
Other functions will be added in the future; anyway, if you want to request a particular feature you'd like to see in WordBB, you can contact me at hangman@ordinaryvanity.com.
