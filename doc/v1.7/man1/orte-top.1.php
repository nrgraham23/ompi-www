<?php
$topdir = "../../..";
$title = "orte-top(1) man page (version 1.7.4)";
$meta_desc = "Open MPI v1.7.4 man page: orte-top(1)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
        <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
 ompi-top, orte-top - Diagnostic to provide process info similar
to the popular "top" program.  <p>
 <b>NOTE:</b> <i>ompi-top</i>, and <i>orte-top</i> are exact synonyms
for each other. Using any of the names will result in exactly identical
behavior.
<p>
<h2><a name='sect1' href='#toc1'>Synopsis</a></h2>
 <b>ompi-top</b> [ options ]
<h2><a name='sect2' href='#toc2'>Options</a></h2>
 <i>ompi-top</i> collects
and displays process information in a manner similar to that of the popular
"top" program.
<dl>

<dt><b>-h | --help</b> </dt>
<dd>Display help for this command   </dd>

<dt><b>-pid | --pid &lt;value&gt;</b> </dt>
<dd>The
pid of the mpirun whose processes you want information about, or the name
of the file (specified as file:filename) that contains that info. Note that
the ompi-top command must be executed on the same node as mpirun to use
this option.   </dd>

<dt><b>-uri | --uri &lt;value&gt;</b> </dt>
<dd>Specify the URI of the mpirun whose processes
you want information about, or the name of the file (specified as file:filename)
that contains that info. Note that the ompi-top command does not have to
be executed on the same node as mpirun to use this option.   </dd>

<dt><b>-rank | --rank
&lt;value&gt;</b> </dt>
<dd>The rank of the processes to be monitored. This can consist of a single
rank, or a comma-separated list of ranks. These can include rank ranges separated
by a &rsquo;-&rsquo;. If this option is not provided, or a value of -1 is given, ompi-top
will default to displaying information on all ranks.   </dd>

<dt><b>-bynode | --bynode</b> </dt>
<dd>Display
the results grouped by node, with each node&rsquo;s processes reported in rank
order. If this option is not provided, ompi-top will default to displaying
all results in rank order.   </dd>

<dt><b>-update-rate | --update-rate &lt;value&gt;</b> </dt>
<dd>The time (in seconds)
between updates of the displayed information. If this option is not provided,
ompi-top will default to executing only once.   </dd>

<dt><b>-timestamp | --timestamp</b> </dt>
<dd>Provide
an approximate time when each sample was taken. This time is approximate
as it only shows the time when the sample command was issued.   </dd>

<dt><b>-log-file
| --log-file &lt;value&gt;</b> </dt>
<dd>Log the results to the specified file instead of displaying
them to stdout.      </dd>
</dl>

<h2><a name='sect3' href='#toc3'>Description</a></h2>
 <p>
<i>ompi-top</i> collects and displays process information
in a manner similar to that of the popular "top" program. It doesn&rsquo;t do the
fancy screen display, but does allow you to monitor available process information
(to the limits of the underlying operating system) of processes irrespective
of their location.
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
