<?php
$topdir = "../../..";
$title = "ompi-server(1) man page (version 1.4.5)";
$meta_desc = "Open MPI v1.4.5 man page: ompi-server(1)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
        <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
 ompi-server - Server for supporting name publish/lookup operations.
 <p>

<h2><a name='sect1' href='#toc1'>Synopsis</a></h2>
 <b>ompi-server</b> [ options ]
<h2><a name='sect2' href='#toc2'>Options</a></h2>
 <i>ompi-server</i> acts as a data
server for Open MPI jobs to exchange contact information in support of
MPI-2&rsquo;s Publish_name and Lookup_name functions.
<dl>

<dt><b>-h | --help</b> </dt>
<dd>Display help for
this command   </dd>

<dt><b>-d | --debug</b> </dt>
<dd>Enable verbose output for debugging   </dd>

<dt><b>-r | --report-uri
&lt;value&gt;</b> </dt>
<dd>Report the Open MPI contact information for the server. This information
is required for MPI jobs to use the data server. Three parameter values
are supported: (a) &rsquo;-&rsquo;, indicating that the uri is to be printed to stdout;
(b) &rsquo;+&rsquo;, indicating that the uri is to be printed to stderr; and (c) "file:path-to-file",
indicating that the uri is to be printed to the specified file. The "path-to-file"
can be either absolute or relative, but must be in a location where the
user has write permissions. Please note that the resulting file must be
read-accessible to expected users of the server.      </dd>
</dl>

<h2><a name='sect3' href='#toc3'>Description</a></h2>
 <p>
<i>ompi-server</i>
acts as a data server for Open MPI jobs to exchange contact information
in support of MPI-2&rsquo;s Publish_name and Lookup_name functions.
<h2><a name='sect4' href='#toc4'>See Also</a></h2>

<p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Synopsis</a></li>
<li><a name='toc2' href='#sect2'>Options</a></li>
<li><a name='toc3' href='#sect3'>Description</a></li>
<li><a name='toc4' href='#sect4'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
