=== WordBB ===
Contributors: Hangman
Donate link: http://valadilene.org/wordbb
Tags: mybb, integration, bridge
Requires at least: 2.0.2
Tested up to: 2.8.2
Stable tag: trunk

This is a bridge between WordPress blogging platform and MyBB message board.

== Description ==

WordBB's main feature is creating a thread for each blog post in a particular section, so that the forum can be used as a replacement to the blog comment system. 
The WordPress side handles situations such as post editing and deletion. Similarly, the MyBB side takes account of the thread actions which are reflected on the corresponding WordPress post.

WordBB also allows linking between WordPress authors and MyBB users. In this way, when a blog post gets published, a thread is automatically created by the correct user.

Another cool feature is a WordPress sidebar widget that displays the latest discussions from your MyBB board. You can set the maximum number of entries, exclude specific forum categories, and choose whether to show posts or threads.

WordBB does everything behind the scene and doesn't require any code modification or hack: just install the plugin and in a few seconds it will be up and running. 
Moreover it is fully customisable and fits nicely in WordPress's admin panel controls and style. WordPress and MyBB can run on different databases.

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

= What's the Sync button for? =
Let's suppose you create a thread, then you switch from full to excerpt mode: you have to resync the thread in order for it to have the excerpt as the message. Also, if you edit the bridged thread, you can use that button to restore it to its original content.

= Known problems =
No known problems so far! :)

= I need X function, when will you add it? =
Other functions will be added in the future; anyway, if you want to request a particular feature you'd like to see in WordBB, you can contact me at hangman@ordinaryvanity.com.

== Changelog ==

<h3>WordBB 0.1.6 Beta</h3>

<b>August 23th 2009</b>
<ul>
<li>Replaced user comboboxes with editboxes (in this way there is no need to load all users at once anymore)</li>
</ul>

<h3>WordBB 0.1.5 Beta</h3>

<b>August 22th 2009</b>
<ul>
<li>Added MyBB user link in comment's author URL</li>
</ul>

<h3>WordBB 0.1.4 Beta</h3>

<b>August 6th 2009</b>
<ul>
<li>Fixed bug in comments loop</li>
<li>"comment_reply_link" WP filter handled, links to reply page for a specific comment</li>
</ul>

<h3>WordBB 0.1.3 Beta</h3>

<b>August 6th 2009</b>
<ul>
<li>Fixed bug on "Delete thread" function</li>
</ul>

<h3>WordBB 0.1.2 Beta</h3>

<b>August 6th 2009</b>
<ul>
<li>Added setting that allows to use the WP post's excerpt as thread message</li>
<li>"Last post by" template tag fixed</li>
<li>Added Sync thread function</li>
<li>Fixed WP comments issue on single post page (now MyBB posts are shown instead of WP comments)</li>
</ul>

<h3>WordBB 0.1 Beta</h3>

<b>August 4th 2009</b>
<ul>
<li>WP "more" tag is now filtered on duplication</li>
<li>Thread update on WP post publish fixed</li>
<li>Meta table gets created automatically if it doesn't exist yet</li>
</ul>

<b>July 26th 2009</b>
<ul>
<li>Implemented thread deletion upon WP post deletion</li>
<li>Added thread deletion upon WP post deletion setting</li>
</ul>

<b>July 26th 2009</b>
<ul>
<li>Added wordbb_get_username template tag</li>
<li>Added wordbb_get_avatar template tag</li>
<li>Added wordbb_get_pms template tag</li>
<li>Added wordbb_get_lastvisit template tag</li>
<li>Added wordbb_get_friendly_lastvisit template tag</li>
<li>Added wordbb_get_userinfo template tag</li>
<li>Implemented bridge caching</li>
<li>Implemented widget displaying latest threads/posts</li>
<li>Added today/yesterday lang setting for friendly last visit tag</li>
<li>Fixed bug in dropdowns in the users panel</li>
<li>Added plugin configuration checking with warning messages</li>
<li>Tested using MyBB on a different database</li>
</ul>

<b>July 19th 2009</b>
<ul>
<li>Forums / categories bridge</li>
<li>Create thread on WP post publish</li>
<li>Added thread's post count on posts admin panel</li>
<li>Added "create thread on WP post publish" setting</li>
<li>MyBB threads posts are now shown as comments on WP posts</li>
<li>Added "Use MyBB as comment system" setting</li>
<li>Added "Default post forum" setting</li>
<li>Added "Default post author" setting</li>
<li>get_comment_link filter which shows a link to the corresponding MyBB post</li>
<li>Added wordbb_comments_popup_link template tag</li>
<li>Added wordbb_get_thread_id template tag</li>
<li>Added wordbb_get_thread_link template tag</li>
</ul>

<b>June 28th 2009</b>
<ul>
<li>Project started from scratch.</li>
</ul>