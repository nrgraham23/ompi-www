<?php
$topdir = "../../..";
$title = "ompi-clean(1) man page (version 1.4.5)";
$meta_desc = "Open MPI v1.4.5 man page: ompi-clean(1)";

include_once("$topdir/doc/nav.inc");
include_once("$topdir/includes/header.inc");
?>
<p> <a href="../">&laquo; Return to documentation listing</a></p>
      <!-- manual page source format generated by PolyglotMan v3.2, -->
<!-- available at http://polyglotman.sourceforge.net/ -->

<body bgcolor='white'>
<a href='#toc'>Table of Contents</a><p>

<h2><a name='sect0' href='#toc0'>Name</a></h2>
<b>orte-clean</b> - Cleans up any stale processes and files leftover from
Open MPI jobs.
<p> <p>

<p>
<h2><a name='sect1' href='#toc1'>Synopsis</a></h2>
<br>
<pre>orte-clean [--verbose]

mpirun --pernode [--host | --hostfile file] orte-clean [--verbose]
</pre><p>

<p>
<p>
<h2><a name='sect2' href='#toc2'>Options</a></h2>
[-v | --verbose] This argument will run the command in verbose
mode and print out the universes that are getting cleaned up  as well as
processes that are being killed. <p>

<p>
<h2><a name='sect3' href='#toc3'>Description</a></h2>
<i>orte-clean</i> attempts to clean
up any processes and files left over from Open MPI jobs that were run in
the past as well as any currently running jobs.  This includes OMPI infrastructure
and helper commands, any processes that were spawned as part of the job,
and any temporary files.  orte-clean will only act upon processes and files
that belong to the user running the orte-clean command.  If run as root,
it will kill off processes belonging to any users. <p>
When run from the command
line, orte-clean will attempt to clean up the local node it is run from.
 When launched via mpirun, it will clean up the nodes selected by mpirun.
<p>

<p>
<h2><a name='sect4' href='#toc4'>Examples</a></h2>
Example 1: Clean up local node only. <p>
<br>
<pre>example% orte-clean
</pre><p>

<p> Example 2: To clean up on a specific set of nodes specified on command
line, it is recommended to use the pernode option.  This will run one orte-clean
for each node.   <p>
<br>
<pre>example% mpirun --pernode --host node1,node2,node3 orte-clean
</pre><p>
To clean up on a specific set of nodes from a file. <p>
<br>
<pre>example% mpirun --pernode --hostfile nodes_file orte-clean
</pre><p>
Example 3: Within a resource managed environment like N1GE, SLURM, or Torque.
 The following example is from N1GE. <p>
First, we see that we have two nodes
with two CPUs each. <p>
<br>
<pre>example% qsh -pe orte 4

example% mpirun -np 4 hostname

node1

node1

node2

node2
</pre><p>
Clean up all the nodes in the cluster. <p>
<br>
<pre>example% mpirun --pernode orte-clean
</pre><p>
Clean up a subset of the nodes in the cluster. <p>
<br>
<pre>example% mpirun --pernode --host node1 orte-clean
</pre><p>

<p>
<h2><a name='sect5' href='#toc5'>See Also</a></h2>
<i>orterun(1)</i>, <i>orte-ps(1)</i> <p>
<p>

<hr><p>
<a name='toc'><b>Table of Contents</b></a><p>
<ul>
<li><a name='toc0' href='#sect0'>Name</a></li>
<li><a name='toc1' href='#sect1'>Synopsis</a></li>
<li><a name='toc2' href='#sect2'>Options</a></li>
<li><a name='toc3' href='#sect3'>Description</a></li>
<li><a name='toc4' href='#sect4'>Examples</a></li>
<li><a name='toc5' href='#sect5'>See Also</a></li>
</ul>


<p> <a href="../">&laquo; Return to documentation listing</a></p>
<?php
include_once("$topdir/includes/footer.inc");
