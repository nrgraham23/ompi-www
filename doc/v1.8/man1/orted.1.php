<?php
$topdir = "../../..";
$title = "orted(1) man page (version 1.8)";
$meta_desc = "Open MPI v1.8 man page: orted(1)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
   <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
orted - Start an Open RTE User-Level Daemon
<h2><a name='sect1' href='#toc1'>Synopsis</a></h2>
<b>orted [options]</b>

<h2><a name='sect2' href='#toc2'>Description</a></h2>
<p>
<b>orted</b> starts an Open RTE daemon for the Open MPI system.
<h2><a name='sect3' href='#toc3'>Note</a></h2>
The
<b>orted</b> command is  <i>not</i> intended to be manually invoked by end users.    It
is part of the Open MPI architecture and is invoked automatically as necessary.
 This man page is mainly intended for those adventerous end users and system
administrators who have noticed an "orted" process and wondered what it
is. <p>
As such, the command line options accepted by the  <b>orted</b> are not listed
below because they are considered internal and are therefore subject to
change between versions without warning. Running <b>orted</b> with the  <i>--help</i> command
line option will show all available options.
<h2><a name='sect4' href='#toc4'>Authors</a></h2>
The Open MPI maintainers
-- see  <i><i>http://www.openmpi.org/</i></i> or the file <i>AUTHORS</i>. <p>
This manual page was originally
contributed by Dirk Eddelbuettel &lt;email-address-removed&gt;, one of the Debian GNU/Linux
maintainers for Open MPI, and may be used by others. <p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Synopsis</a></li>
<li><a name='toc2' href='#sect2'>Description</a></li>
<li><a name='toc3' href='#sect3'>Note</a></li>
<li><a name='toc4' href='#sect4'>Authors</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
