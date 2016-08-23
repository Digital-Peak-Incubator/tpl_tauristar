Joomla! CMS™
====================

Build Status
---------------------
Travis-CI: [![Build Status](https://travis-ci.org/Digital-Peak-Incubator/tpl_tauristar.svg?branch=tpl_tauristar)](https://travis-ci.org/Digital-Peak-Incubator/tpl_tauristar)

What is this?
---------------------
This repository shows an approach how to introduce CSS/JS frameworks like bootstrap 3 or font awesome into the current Joomla version without breaking backwards compatibility.

How to get started?
---------------------
Install Joomla as usual by downloading it from this repository. As default template is tauristar set, which loads the bootstrap 3 framework without any template overrides.

You can install the sample blog data on the last installation screen or create some sample articles by yourself.

What is new?
---------------------
Templates define which framework (bs3, bs4) they want to work with and then the layouts are loaded with prefixes like bs3 according to the template (framework parameter)[templates/tauristar/templateDetails.xml#L48]. For example when tauristar is activated, then the file (default.bs3.php)[modules/mod_menu/tmpl/default.bs3.php] is loaded instead of the (default.php)[modules/mod_menu/tmpl/default.php] file. The same works for component views and JLayouts.

If the framework parameter is not set, then the layout is loaded as before. Like that backwards compatibility is guaranteed.

How to contribute?
---------------------
<<<<<<< Upstream, based on origin/tpl_tauristar
Play around with the installation, pick an issue and convert some layout files to bootstrap 3. Don't forget to open a pull request!! 
=======
* Repository of [accredited language packs](https://community.joomla.org/translations.html).
* You can also [add languages](https://docs.joomla.org/J3.x:Setup_a_Multilingual_Site/Installing_New_Language) directly to your website via your Joomla! administration panel.
* Learn how to [setup a Multilingual Joomla! Site](https://docs.joomla.org/J3.x:Setup_a_Multilingual_Site)

Learn Joomla!
---------------------
* Read ['Getting Started with Joomla!'](https://docs.joomla.org/J3.x:Getting_Started_with_Joomla!) to learn the basics.
* Before installing, read the ['Beginners' Guide'](https://docs.joomla.org/Portal:Beginners).

What are the benefits of Joomla?
---------------------
* The functionality of a Joomla website can be extended by installing extensions that you can create (or download) to suit your needs.
* There are many ready-made extensions that you can download and install.
* Check out the [Joomla! Extensions Directory (JED)](http://extensions.joomla.org).

Is it easy to change the layout display?
---------------------
* The layout is controlled by templates that you can edit.
* There are a lot of ready-made professional templates that you can download.
* Template management information is [available here](https://docs.joomla.org/Portal:Template_Management).

Ready to install Joomla?
---------------------
* Check the [minimum requirements](https://www.joomla.org/about-joomla/technical-requirements.html). 
* How do you [install Joomla](https://docs.joomla.org/J3.x:Installing_Joomla)?
* You could start your Joomla! experience by [building your site on a local test server](https://docs.joomla.org/Installing_Joomla_locally).
When ready, it can be moved to an online hosting account of your choice.

Updates are free!
---------------------
* Always use the [latest version](https://www.joomla.org/download.html).

Where can you get support and help?
---------------------
* [The Joomla! Documentation](https://docs.joomla.org/Main_Page);
* [Frequently Asked Questions](https://docs.joomla.org/Category:FAQ) (FAQ);
* Find the [information you need](https://docs.joomla.org/Start_here);
* Find [help and other users](https://www.joomla.org/about-joomla/create-and-share.html);
* Post questions at [our forums](http://forum.joomla.org);
* [Joomla Resources Directory](http://resources.joomla.org/) (JRD).

Do you already have a Joomla! site that isn't built with Joomla! 3.x?
---------------------
* What's [new in Joomla! 3.x](https://www.joomla.org/3)?
* What are the [main differences between 2.5 and 3.x](https://docs.joomla.org/What_are_the_major_differences_between_Joomla!_2.5_and_3.x%3F)?
* How to [migrate from 2.5.x to 3.x](https://docs.joomla.org/Joomla_2.5_to_3.x_Step_by_Step_Migration).
* How to [migrate from 1.5.x to 3.x](https://docs.joomla.org/Joomla_1.5_to_3.x_Step_by_Step_Migration).

Do you want to improve Joomla?
--------------------
* Where to [request a feature](https://issues.joomla.org/)?
* How do you [report a bug](https://docs.joomla.org/Filing_bugs_and_issues) on the [Issue Tracker](https://issues.joomla.org/)?
* Get Involved: Joomla! is community developed software. [Join the community](https://volunteers.joomla.org/).
* Documentation for [Developers](https://docs.joomla.org/Portal:Developers).
* Documentation for [Web designers](https://docs.joomla.org/Web_designers).
>>>>>>> 68e7b44 Spelling errors (#11604)

Copyright
---------------------
* Copyright (C) 2005 - 2016 Open Source Matters. All rights reserved.
* [Special Thanks](https://docs.joomla.org/Joomla!_Credits_and_Thanks)
* Distributed under the GNU General Public License version 2 or later
* See [License details](https://docs.joomla.org/Joomla_Licenses)
